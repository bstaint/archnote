<?php if ( ! defined('BASEPATH')) exit('No Access');

class Manage extends Admin_Controller {

    private $post_list = 10;

    public function index(){
        redirect(ADMIN_DIR);
    }

    public function post($page_param = null){
        $this->_logged();
        $data['site_options'] = $this->site_options;
        $data['current_title'] = '管理日志 - '.$this->site_options['title'];
        $data['current_page'] = 'manage_post';
        $data['username'] = $this->session->userdata('admin');
        $this->post_m->time_format = 'm日d月';
        $this->post_m->limit = 20;
        $this->post_m->offset = $page_param;
        $this->post_m->init_pagination($this->site_options['site_url'] . '/' . ADMIN_DIR . 'manage/post/',4,false);
        $data['posts'] = $this->post_m->admin_post_list();
        $data['page_link'] = $this->pagination->create_links();
        $this->load_theme($data,'post');
    }

    public  function page($page_param = null){
        $this->_logged();
        $data['site_options'] = $this->site_options;
        $data['current_title'] = '管理页面 - '.$this->site_options['title'];
        $data['current_page'] = 'manage_page';
        $data['username'] = $this->session->userdata('admin');
        $this->post_m->time_format = 'm日d月';
        $this->post_m->limit = $this->post_list;
        $this->post_m->offset = $page_param;
        $this->post_m->init_pagination($this->site_options['site_url'] . '/' . ADMIN_DIR . 'manage/page/',4,false,'',array('type' => 'page'));
        $data['posts'] = $this->post_m->admin_post_list('',array('type' => 'page'));
        $data['page_link'] = $this->pagination->create_links();
        $this->load_theme($data,'post');
    }
}
?>