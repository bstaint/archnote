<?php if ( ! defined('BASEPATH')) exit('No Access');

class Admin_Controller extends CI_Controller {

    protected $site_options = array();

    public function __construct(){
        parent::__construct();
        $this->_init_option();
        $this->load->model('user_m');
        $this->load->library('session');
        define('ADMIN_URL',base_url().ADMIN_DIR);
        define('ARCH_VERSION', '1.0.0');
    }

    /**
     * 隐藏MVC index
     *
     */
    public function _remap($method, $params = array()) {
        if (method_exists($this, $method)){
            return call_user_func_array(array($this, $method), $params);
        } else {
            array_unshift($params, $method);
            return call_user_func_array(array($this, 'index'), $params);
        }
    }

     public function _logged(){
         $logined = $this->user_m->verify_is_login();
         !$logined && redirect(ADMIN_DIR.'login');
     }

    protected function _init_option(){
        $site_options = $this->option_m->get_options();
        $this->config->set_item('base_url', $site_options['site_url']);
        $this->site_options = $site_options;
    }

    protected function load_theme($data,$main){
        $this->load->view('admin/header',$data);
        $this->load->view('admin/'.$main);
        $this->load->view('admin/footer');
    }
}

//=========================================================================
class Arch_Controller extends CI_Controller {

    protected $site_options = array();

    public function __construct(){
        parent::__construct();
        $this->_init_option();
    }

    /**
     * 隐藏MVC index
     *
     */
    public function _remap($method, $params = array()) {
        if (method_exists($this, $method)){
            return call_user_func_array(array($this, $method), $params);
        } else {
            array_unshift($params, $method);
            return call_user_func_array(array($this, 'index'), $params);
        }
    }

    protected function _init_option(){
        $site_options = $this->option_m->get_options();
        $this->config->set_item('base_url', $site_options['site_url']);
        $site_options['theme_url'] = base_url() . 'themes/' . $site_options['theme'] . '/';
        $this->site_options = $site_options;
        $site_options['cache'] && $this->output->cache(3600);
        define('ARCH_VERSION', '1.0.0');
    }

    protected function load_theme($theme,$main = '/index',$data,$have_comment = false){
        $this->load->view($theme . '/header',$data);
        $this->load->view($theme . $main);
        if($have_comment):
            $this->load->view($theme. '/comments');
        endif;
        $this->load->view($theme . '/sidebar');
        $this->load->view($theme . '/footer');
    }
}
?>
