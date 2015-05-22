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
class Option_m extends CI_Model{

    public function get_options(){
        $query = $this->db_m->get_simple_result('name,value','options');
        $query == false && show_error('获取系统设置失败!');
        $options = array();
        foreach($query as $row){
            $options[$row->name] = $row->value;
        }
        return $options;
    }

    public function update_options(){
        $title = $this->input->post('title');
        $url = $this->input->post('url');
        $keyword = $this->input->post('keyword');
        $description = $this->input->post('description');
        $cache = $this->input->post('cache') == 'on' ? true : false;
        $post_list = $this->input->post('list_num');

        $data = array(
            'title' => $title,
            'site_url' => $url,
            'keyword' => $keyword,
            'description' => $description,
            'cache' => $cache,
            'post_list' => $post_list,
        );

        foreach($data as $key => $row){
            $this->db_m->update_row(array('value' => $row),array('name' => $key),'options');
        }

        return '<p>系统信息修改成功!</p>';
    }
}
?>