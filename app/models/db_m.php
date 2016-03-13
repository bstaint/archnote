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
 * archnote 数据库操作模块
 *
 *	主要用于直接操作数据库
 *
 */
class Db_m extends CI_Model{

    /**
     * 数据库表
     *
     * @access private
     * @var string
     */
    protected $dbt;

    public function __construct(){
        parent::__construct();
        global $dbt;
        $this->dbt = $dbt;
    }

    /**
     * 获取简单的数据库查询结果
     *
     * @access private
     * @param string $select
     * @param string $db_ext
     * @return array
     */
    public function get_simple_result($select = '*',$db_ext = '') {
        if (empty($this->dbt[$db_ext])){
            return false;
        }
        $this->db->select($select)
            ->from($this->dbt['options']);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function get_full_post_result($limit = null,$offset = null,$select = '*',$likes = '',$where = array(),$join = array(),$order_by = 'created desc'){
        $this->db->from($this->dbt['contents']);
        $this->db->select($select);
        if(!is_null($offset)){
            $offset > 0 &&  $offset = ($offset-1)*$limit;
            $this->db->offset($offset);
        }
        (!is_null($limit)) && $this->db->limit($limit);
        (!empty($likes)) && $this->db->like('title',$likes);
        (!empty($join)) && $this->db->join($join[0],$join[1]);
        if(empty($where)){
            $where['type'] = 'post';
        }
        $this->db->where($where);
        $this->db->order_by($order_by);
        $query = $this->db->get();
        return $query->result();
    }

    /**
     * 获取count
     *
     * @access public
     * @param string $likes
     * @param int $require
     * @param array $join
     * @return int
     */
    public function get_full_count($db_ext = '',$likes = array(),$where = array(),$join = array()){
        if (empty($this->dbt[$db_ext])){
            return false;
        }
        (!empty($likes)) && $this->db->like('title',$likes);
        (!empty($join)) && $this->db->join($join[0],$join[1]);
        if(empty($where)){
            $where['type'] = 'post';
        }
        $this->db->where($where);
        $this->db->from($this->dbt['contents']);
        $count = $this->db->count_all_results();
        return $count;
    }

    public function get_row($select = '*',$where = array(),$db_ext = 'contents'){
        if (empty($this->dbt[$db_ext])){
            return false;
        }
        $this->db->select($select);
        $this->db->from($this->dbt[$db_ext])
            ->where($where);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->row() : false;
    }

    public function is_row($select = '',$where = '',$db_ext = ''){
        if (empty($this->dbt[$db_ext])){
            return false;
        }
        $this->db->select($select)
            ->from($this->dbt[$db_ext])
            ->where($where);
        $query = $this->db->get();
        $q = $query->num_rows();
        return ($q > 0) ? true : false;
    }

    public function update_row($data = '',$where = '',$db_ext = ''){
        if (empty($this->dbt[$db_ext])){
            return false;
        }
        $this->db->where($where);
        $this->db->update($this->dbt[$db_ext],$data);
    }

}
?>