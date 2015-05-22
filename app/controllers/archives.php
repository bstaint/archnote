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
 * archnote 日志内容控制器
 *
 *	主要用于控制日志内容页面的显示
 *
 */
class Archives extends Arch_Controller {

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
        $data['post'] = $this->post_m->get_post($cid);
        $data['page_title'] = $data['post']['title'];
        $data['current_page'] = $data['post']['cid'];
        $data['prev_post'] = $this->widget_m->get_nearby_post($data['post']['cid'],'<');
        $data['next_post'] = $this->widget_m->get_nearby_post($data['post']['cid'],'>');
        $data['latest_posts'] = $this->widget_m->latest_post();
        $this->load_theme($this->site_options['theme'],'/archive',$data,true);
    }
}
?>