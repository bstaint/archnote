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
 * archnote 页面控制器
 *
 *	主要用于控制自定义页面的显示
 *
 */
class Pages extends Arch_Controller {

    //临时存放这里，以后需要移动到后台添加页面处
    public function flush(){
        $this->page_m->flush_routers();
        echo '路由缓存已经刷新!';
    }

    /**
     * 根据cid显示页面内容
     *
     * @access public
     * @param  string $cid
     * @return void
     */
    public function index($cid = ''){
        $data['site_options'] = $this->site_options;
        $data['menus'] = $this->page_m->get_menus();
        $data['post'] = $this->page_m->get_page($cid);
        $data['current_page'] = $data['post']['cid'];
        $data['page_title'] = $data['post']['title'];
        $data['latest_posts'] = $this->widget_m->latest_post();
        $this->load_theme($this->site_options['theme'],'/page',$data,true);
    }
}
