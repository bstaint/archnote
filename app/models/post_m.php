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
class Post_m extends CI_Model{

    public $limit = false;

    public $offset = null;

    /**
     * 时间格式
     *
     * @access public
     * @var string
     */
    public $time_format = 'D F d Y';

    public function init_pagination($base_url = '',$uri_segment = 2,$page_query_string = false,$likes = '',$require = array(),$join = array()){
        $this->load->library('pagination');
        $count = $this->db_m->get_full_count('contents',$likes,$require,$join);
        $config['total_rows'] = $count;
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = $uri_segment;
        if($config['per_page'] == 1){
            $config['use_page_numbers'] = false;
        }
        $page_query_string && $config['page_query_string'] = $page_query_string;
        if(!empty($base_url)){
            $config['base_url'] = $base_url;
        }
        $this->pagination->initialize($config);
    }

    public function get_post_list($likes = '',$where = array(),$join = array()){
        //加上表名避免join查询时出现错误
        $select = 'cid,title,category,created,authorId,text';
        $post_list = $this->db_m->get_full_post_result($this->limit,$this->offset,$select,$likes,$where,$join);
        $data = array();
        foreach($post_list as $post){
            $data[] = array(
                'cid' => $post->cid,
                'title' => $post->title,
                'author' => 'bstaint',
                'link' => base_url() . 'archives' . '/' . $post->cid . '/',
                'created' => timestamp_to_date($this->time_format,$post->created),
                'tags' => $this->meta_m->cid_get_metas_html($post->cid),
                'category' => $this->meta_m->cid_get_metas_html($post->cid,'category'),
                'content' => breakLog($post->text,$post->cid)
            );
        }
        return $data;
    }

    public function get_post($cid = ''){
        (!is_numeric($cid)) && show_404();
        $where = array('cid' => $cid,'type' => 'post');
        (!$this->db_m->is_row('cid',$where,'contents')) && show_404();
        $select = 'cid,title,alias,category,authorId,created,text,type,allowComment';
        $post = $this->db_m->get_row($select,array('cid' => $cid));
        $data = array(
            'cid' => $post->cid,
            'title' => $post->title,
            'author' => 'bstaint',
            'link' => base_url() . 'archives' . '/' . $post->cid . '/',
            'created' => timestamp_to_date($this->time_format,$post->created),
            'content' => $post->text,
            'type' => $post->type,
            'tags' => $this->meta_m->cid_get_metas_html($post->cid),
            'categorys' => $this->meta_m->cid_get_metas_html($post->cid,'category'),
            'allowComment' => $post->allowComment,
            'link' => base_url() . 'archives/' . $post->cid . '/'
        );
        return $data;
    }

    //============================================================
    public function admin_post_list($likes = '',$where = array(),$join = array()){
        //加上表名避免join查询时出现错误
        $select = 'cid,title,alias,category,type,created,authorId,text';
        $post_list = $this->db_m->get_full_post_result($this->limit,$this->offset,$select,$likes,$where,$join);
        $data = array();
        foreach($post_list as $post){
            $data[] = array(
                'cid' => $post->cid,
                'title' => $post->title,
                'author' => 'bstaint',
                'link' => base_url() . ADMIN_DIR . 'edit?type=' . $post->type.'&cid=' . $post->cid,
                'created' => timestamp_to_date($this->time_format,$post->created),
                'category' => $this->meta_m->cid_get_metas_html($post->cid,'category'),
                'type' => $post->type,
                'alias' => $post->alias,
            );
        }
        return $data;
    }

}
?>