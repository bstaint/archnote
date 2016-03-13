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
 * archnote 设置模块
 *
 *	主要用于获取设置信息
 *
 */
class Meta_m extends CI_Model{

    /**
     * 从数据库库中获取metas
     *
     * @access private
     * @param int $cid
     * @param string $type
     * @return array
     */
    private function get_metas_db($cid,$type){
        global $dbt;
        $this->db->select('name,alias')
            ->where('rid',$cid)
            ->where('type',$type)
            ->join($dbt['relationships'], $dbt['relationships'].'.mid = '.$dbt['metas'].'.mid');
        $query = $this->db->get($dbt['metas']);
        return $query->result();
    }

    /**
     * 通过metas返回mid
     *
     * @access public
     * @param string $tag
     * @param string $type
     * @return string
     */
    public function meta_to_mid($meta,$type){
        $where = array('alias' => $meta,'type' => $type);
        $q = $this->db_m->get_row('mid',$where,'metas');
        return $q->mid;
    }


    /**
     * 通过cid获取html
     *
     * @access public
     * @param string $cid
     * @param string $type
     * @return string
     */
    public function cid_get_metas_html($cid,$type = 'tag'){
        $metas = $this->get_metas_db($cid,$type);
        $metas_html = '';
        foreach($metas as $meta){
            if($meta == end($metas)){
                $metas_html .= '<a href="'.base_url().$type.'/'.$meta->alias.'/">'.$meta->name.'</a>';
            }else{
                $metas_html .= '<a href="'.base_url().$type.'/'.$meta->alias.'/">'.$meta->name.'</a>, ';
            }
        }
        return $metas_html;
    }

    public function get_all_category(){
        global $dbt;
        $this->db->select('mid,name');
        $this->db->where('type','category');
        $query = $this->db->get($dbt['metas']);
        return $query->result();
    }
}
?>