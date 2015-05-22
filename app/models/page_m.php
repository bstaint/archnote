<?php if ( ! defined('BASEPATH')) exit('No Access!');
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
 * archnote 设置模块
 *
 *	主要用于获取设置信息
 *
 */
class Page_m extends CI_Model{

    /**
     * 时间格式
     *
     * @access public
     * @var string
     */
    public $time_format = 'D F d Y';

    /**
     * 刷新router缓存文件
     *
     * @access public
     * @return void
     */
    public function flush_routers(){
        $routes = $this->db_m->get_full_post_result(null,null,'cid,alias','',array('type' => 'page'));

        if (!empty($routes)) {
            foreach ($routes as $route) {
                if(!empty($route->alias)){
                    $data[] = '$route["' . $route->alias. '"] = "' . "pages/$route->cid" . '";';
                }
            }
            $output = "<?php  if ( ! defined('BASEPATH')) exit('No Access');\n";
            $output .= implode("\n", $data);
            $this->load->helper('file');
            write_file(APPPATH . "cache/routes.php", $output);
        }
    }

    public function get_menus(){
        $menus = $this->db_m->get_full_post_result(null,null,'cid,title,alias','',array('type' => 'page'),'','cid');
        $menus == false && show_error('获取菜单失败!');
        $data = array();
        foreach($menus as $menu){
            $data[] = array(
                'cid' => $menu->cid,
                'title' => $menu->title,
                'url' => (!empty($menu->alias)) ? (base_url() . $menu->alias . '/') : (base_url() . 'pages/' . $menu->cid . '/')
            );
        }
        return $data;
    }

    public function get_page($cid = ''){
        (!is_numeric($cid)) && show_404();
        $where = array('cid' => $cid,'type' => 'page');
        (!$this->db_m->is_row('cid',$where,'contents')) && show_404();
        $select = 'cid,title,alias,authorId,created,text,allowComment';

        $page = $this->db_m->get_row($select,array('cid' => $cid));
        $data = array(
            'cid' => $cid,
            'title' => $page->title,
            'author' => 'bstaint',
            'link' => base_url() . 'pages' . '/' . $page->cid . '/',
            'created' => timestamp_to_date($this->time_format,$page->created),
            'content' => $page->text,
            'allowComment' => $page->allowComment,
            'link' => (!empty($page->alias)) ? base_url() . $page->alias : base_url() . 'pages/' . $page->cid . '/'
        );
        return $data;
    }
}
?>