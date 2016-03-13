<?php if ( ! defined('BASEPATH')) exit('No Access');

class Arch extends Admin_Controller {

    private $message = '';

    //后台主页
    public function index(){
        $this->_logged();
        $this->widget_m->time_format = 'm日d月';
        $data['site_options'] = $this->site_options;
        $data['current_title'] = '管理首页 - ' . $this->site_options['title'];
        $data['current_page'] = 'index';
        $data['username'] = $this->session->userdata('admin');
        $data['latest_posts'] = $this->widget_m->admin_latest_post();
        $this->load_theme($data,'main');
    }

    private function _verify_options_user(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mail', 'Mail' ,'trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'trim');
        if ($this->form_validation->run()){
            return $this->user_m->update_userinfo();
        }else{
            return validation_errors();
        }
    }

    private function _verify_options_system(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Title' ,'trim|min_length[1]|max_length[200]|required');
        $this->form_validation->set_rules('url', 'Url' ,'trim|min_length[1]|max_length[200]|required');
        $this->form_validation->set_rules('keyword', 'keyword' ,'trim|max_length[200]');
        $this->form_validation->set_rules('keyword', 'keyword' ,'trim|max_length[500]');
        $this->form_validation->set_rules('list_num','list_num','integer|greater_than[1]|less_than[20]');
        if ($this->form_validation->run()){
            $data = $this->option_m->update_options();
            $this->_init_option();
        }else{
            $data = validation_errors();
        }
        return $data;
    }

    public function options($action = ''){
        $this->_logged();
        if(!empty($action)){
            $data['error'] = $action == 'user' ? $this->_verify_options_user() : $this->_verify_options_system();
        }
        $data['site_options'] = $this->site_options;
        $data['current_title'] = '管理首页 - ' . $this->site_options['title'];
        $data['current_page'] = 'options';
        $data['username'] = $this->session->userdata('admin');
        $data['userinfo'] = $this->user_m->get_userinfo($data['username']);
        $this->load_theme($data,'options');
    }

    //登录页面
    public function login(){
        $this->user_m->verify_is_login() && redirect(ADMIN_DIR);
        $this->load->library('form_validation');
        if($this->input->post(null,true)){
            $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]|xss_clean');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[12]');
            $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|exact_length[4]');
            if ($this->form_validation->run()){
                $data['error'] = $this->user_m->verify_login();
            }else{
                $data['error'] = validation_errors();
            }
        }
        $data['site_title'] = $this->site_options['title'];
        $this->load->view('admin/login',$data);
    }

    //登录页面
    public function logout(){
        $this->_logged();
        $this->load->helper('cookie');
        $this->load->library('session');
        $this->session->sess_destroy();
        delete_cookie('archnote_auth');
        delete_cookie('archnote_admin');
        redirect(base_url());
    }

    function captcha(){
        $this->load->library('captcha');
        $this->load->helper('string');
        $rand_str = random_string('alnum',4);
        $captcha = new Captcha(110,36,$rand_str);
        $captcha->showImg();
        $this->session->set_userdata('captcha',strtolower($rand_str));
    }
}
?>