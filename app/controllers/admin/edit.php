<?php if ( ! defined('BASEPATH')) exit('No Access');

class Edit extends Admin_Controller {

    public function index(){
        $this->_logged();
        redirect(ADMIN_DIR);
    }
}
?>