<?php if ( ! defined('BASEPATH')) exit('No Access');

class Write extends Admin_Controller {

    public function index(){
        redirect(ADMIN_DIR);
    }

    public function post(){
        $this->_logged();
        $data['site_options'] = $this->site_options;
        $data['current_title'] = '发布新日志 - '.$this->site_options['title'];
        $data['current_page'] = 'write_post';
        $data['username'] = $this->session->userdata('admin');
        $data['categorys'] = $this->meta_m->get_all_category();
        $this->load_theme($data,'write');
    }

    public function page(){
        $this->_logged();
        $data['site_options'] = $this->site_options;
        $data['current_title'] = '发布新页面 - '.$this->site_options['title'];
        $data['current_page'] = 'write_page';
        $data['username'] = $this->session->userdata('admin');

        $this->load_theme($data,'write');
    }
}
?>