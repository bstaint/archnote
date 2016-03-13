<?php if ( ! defined('BASEPATH')) exit('No Access!');
/**
 * archnote 博客系统
 *
 * 基于Codeigniter的简单高效轻便的博客系统
 *
 * @package		archnote
 * @author		bstaint <bstaint  AT gmail DOT com>
 * @copyright	Copyright (c) 2013
 * @license		GNU General Public License 2.0
 * @link		http://github.com/bstaint/archnote/
 * @version		1.0.0
 */

// ------------------------------------------------------------------------

/**
 * archnote 用户操作模块
 *
 *	主要用于操作用户
 *
 */
class User_m extends CI_Model{

    private $salt = 'archnote';

    private $expire = 864000;

    private function add_user_session($username,$password,$remember){
        $this->session->set_userdata('admin',$username);
        $this->session->set_userdata('logged_in',true);
        if($remember == 'on'){
            $cookie_admin = array(
                'name'   => 'archnote_admin',
                'value'  => $username,
                'expire' => $this->expire,
            );
            $cookie_auth = array(
                'name'   => 'archnote_auth',
                'value'  => md5($username.$password),
                'expire' => $this->expire,
            );
            $this->input->set_cookie($cookie_auth);
            $this->input->set_cookie($cookie_admin);
        }
    }

    public function verify_is_login(){
        $logined = $this->session->userdata('logged_in');
        if($logined){
            return true;
        }else{
            $username = $this->input->cookie('archnote_admin');
            $auth = $this->input->cookie('archnote_auth');
            if(empty($username) && empty($auth))
                return false;
            $q = $this->db_m->get_row('name,password',array('name' => $username),'user');
            $s = md5($q->name.$q->password);
            if($s != $auth)
                return false;
            $this->session->set_userdata('admin',$username);
            return true;
        }
    }

    public function verify_login(){
        $username = $this->input->post('username');
        $password = md5($this->input->post('password').$this->salt);
        $captcha = $this->input->post('captcha');
        $remember = $this->input->post('remember');

        if($captcha <> $this->session->userdata('captcha'))
            return '<p>验证码错误!</p>';

        if(!$this->db_m->is_row('uid',array('name' => $username,'password' => $password),'user')){
            return '<p>用户名密码错误!</p>';
        }else{
            $this->add_user_session($username,$password,$remember);
            redirect(ADMIN_DIR);
        }
    }

    public function get_userinfo($user){
        $q = $this->db_m->get_row('name,mail',array('name' => $user),'user');
        $userinfo = array(
            'name' => $q->name,
            'mail' => $q->mail
        );
        return $userinfo;
    }

    public function update_userinfo(){
        $username = $this->session->userdata('admin');
        $mail = $this->input->post('mail');
        $password = $this->input->post('password');
        $data['mail'] = $mail;
        if(!empty($password))
            $data['password'] = md5($password.$this->salt);
        $q = $this->db_m->get_row('name',$data,'user');
        if($q == false){
            $this->db_m->update_row($data,array('name' => $username),'user');
            return '<p>用户信息修改成功!</p>';
        }else{
            return '<p>用户信息无变化!</p>';
        }
    }
}