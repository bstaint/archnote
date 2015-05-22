<?php if ( ! defined('BASEPATH')) exit('No Access');

/**
 * archnote 博客系统
 *
 * 基于Codeigniter的简单高效轻便的博客系统
 *
 * @package		archnote
 * @author		bstaint <bstaint@gmail.com>
 * @copyright	Copyright (c) 2013, bstaint.net.
 * @license		GNU General Public License 2.0
 * @link		http://github.com/bstaint/archnote/
 * @version		1.0.0
 */

// ------------------------------------------------------------------------

/**
 * archnote 默认主页控制器
 *
 *	主要用于控制首页,首页分页,搜索页的显示
 *
 */
class Arch extends Arch_Controller {

    private function _search_key($post_key,$key = ''){
        (!empty($post_key)) &&  redirect('search/' . $post_key);
        empty($key) && redirect(base_url());
        $key = htmlspecialchars(urldecode($key));  //中文编码转换
        return $key;
    }

    /**
     * 默认首页
     *
     * @access public
     * @return void
     */
    public function index(){
        $data['site_options'] = $this->site_options;
        $data['menus'] = $this->page_m->get_menus();
        $this->post_m->limit = $this->site_options['post_list'];
        $this->post_m->init_pagination('',2,false);
        $data['current_page'] = 'index';
        $data['posts'] = $this->post_m->get_post_list();
        $data['page_link'] = $this->pagination->create_links();
        $data['latest_posts'] = $this->widget_m->latest_post();
        $this->load_theme($this->site_options['theme'],'/index',$data);
    }

    /**
     * 默认首页分页
     *
     * @access public
     * @return void
     */
    public function page($page_param = null){
        $this->post_m->limit = $this->site_options['post_list'];
        $this->post_m->offset = $page_param;
        $data['site_options'] = $this->site_options;
        $data['menus'] = $this->page_m->get_menus();
        $this->post_m->init_pagination('',2,false);
        $data['current_page'] = 'index';
        $data['posts'] = $this->post_m->get_post_list();
        $data['page_link'] = $this->pagination->create_links();
        $data['latest_posts'] = $this->widget_m->latest_post();
        $this->load_theme($this->site_options['theme'],'/index',$data);
    }

    /**
     * 搜索页面
     *
     * @access public
     * @param  string $key
     * @param  string  $page_param
     * @return void
     */
    public function search($key = '',$page_param = null){
        $post_key = $this->input->post('q');
        $likes = $this->_search_key($post_key,$key);
        $this->post_m->limit = $this->site_options['post_list'];
        $this->post_m->offset = $page_param;
        $data['site_options'] = $this->site_options;
        $data['menus'] = $this->page_m->get_menus();
        $this->post_m->init_pagination($this->site_options['site_url'] . '/search/' . $key,3,false,$likes);
        $data['current_page'] = 'index';
        $data['posts'] = $this->post_m->get_post_list($likes);
        $data['page_link'] = $this->pagination->create_links();
        $data['latest_posts'] = $this->widget_m->latest_post();
        $this->load_theme($this->site_options['theme'],'/index',$data);
    }

    /**
     * 显示RSS内容
     *
     * @access public
     * @return void
     */
    public function feed(){
        $this->post_m->time_format = 'l jS \of F Y h:i:s A';
        $this->post_m->limit = $this->site_options['post_list'];
        $posts = $this->post_m->get_post_list();
        $data['site_options'] = $this->site_options;
        $data['current_url'] = $this->site_options['site_url'] . 'feed/';
        $data['last_date'] = $posts[0]['created'];
        $data['posts'] = $posts;
        $this->load->view('common/feed',$data);
    }
}