<?php if ( ! defined('BASEPATH')) exit('No Access');

class Meta extends Admin_Controller {

    public function index(){
        $this->_logged();
        $data['site_options'] = $this->site_options;
        $data['current_title'] = '分类管理 - '.$this->site_options['title'];
        $data['current_page'] = 'manage_meta';
        $data['username'] = $this->session->userdata('admin');

        $this->load_theme($data,'metas');
    }
}
?>