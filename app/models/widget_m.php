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
 * archnote 扩展模块
 *
 *	主要用于操作侧边组件
 *
 */
class Widget_m extends CI_Model{

    /**
     * 时间格式
     *
     * @access public
     * @var string
     */
    public $time_format = 'D F d Y';

    public function latest_post($count = 8){
        $query = $this->db_m->get_full_post_result($count,null,'cid,title','',array('type' => 'post'));
        $latest_post = array();
        foreach($query as $q){
            $latest_post[] = array(
                'title' => mb_strimwidth(htmlspecialchars($q->title),0,30,'...'),
                'url' => base_url() . 'archives/' . $q->cid . '/',
            );
        }
        return $latest_post;
    }

    public function get_nearby_post($cid,$nearby = '>'){
        $where = array(
            'cid '.$nearby => $cid,
            'type' => 'post'
        );
        $post = $this->db_m->get_full_post_result(1,null,'cid,title','',$where);

        if(!empty($post)){
            $url = base_url() . 'archives/' . $post[0]->cid . '/';
            $title = $post[0]->title;
            $result = '<a href="'.$url.'" title="'.$title.'">'.$title.'</a>';
        }else{
            $result = '';
        }
        return $result;
    }

    //===============================================================================

    /**
     * 获取最新文章
     *
     * @access public
     * @param int $count
     * @return array
     */
    public function admin_latest_post($count = 8){
        $query = $this->db_m->get_full_post_result($count,null,'cid,title,created','',array('type' => 'post'));
        $latest_post = array();
        foreach($query as $q){
            $latest_post[] = array(
                'title' => mb_strimwidth(htmlspecialchars($q->title),0,30,'...'),
                'url' => base_url() . 'archives/' . $q->cid . '/',
                'category' => $this->meta_m->cid_get_metas_html($q->cid,'category'),
                'created' => timestamp_to_date($this->time_format,$q->created)
            );
        }
        return $latest_post;
    }
}
?>