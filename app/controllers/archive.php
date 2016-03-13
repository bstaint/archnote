<?php if ( ! defined('BASEPATH')) exit('No Access');
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
 * archnote 归档控制器
 *
 *	主要用于控制归档页面的显示
 *
 */
class Archive extends Arch_Controller {

    private function _date_to_where($years,$month){
        $timestamp = date_to_array($years,$month);
        if(!empty($timestamp)){
            $where = array(
                'created >=' => $timestamp['begin'],
                'created <' => $timestamp['end'],
                'type' => 'post'
            );
            return $where;
        }else{
            show_404();
        }
    }

    private function _metas_to_where($metas,$type = 'tag'){
        $metas = htmlspecialchars(urldecode($metas));
        $where = array('alias' => $metas,'type' => $type);
        if(!$this->db_m->is_row('mid',$where,'metas')){
            show_404();
        }
        $mid = $this->meta_m->meta_to_mid($metas,$type);
        $where = array(
            'mid' => $mid,
            'type' => 'post'
        );
        return $where;
    }

    /**
     * 根据日期归档
     *
     * @access public
     * @param  string $years_param
     * @param  string $month_param
     * @return void
     */
    public function index($years_param = '',$month_param = null){
        $page_param = $this->input->get('page');
        $where = $this->_date_to_where($years_param,$month_param);
        $data['site_options'] = $this->site_options;
        $data['menus'] = $this->page_m->get_menus();
        $this->post_m->limit = $this->site_options['post_list'];
        $this->post_m->offset = $page_param;
        $url_fix = (is_null($month_param)) ? $years_param : $years_param . '/' .$month_param;
        $this->post_m->init_pagination(base_url().$url_fix,2,true,'',$where);
        $data['current_page'] = 'index';
        $data['posts'] = $this->post_m->get_post_list('',$where);
        $data['page_link'] = $this->pagination->create_links();
        $data['latest_posts'] = $this->widget_m->latest_post();
        $this->load_theme($this->site_options['theme'],'/index',$data);
    }

    /**
     * 根据标签归档
     *
     * @access public
     * @param  string $tag_param
     * @param  int $page_param
     * @return void
     */
    public function tag($tag = '',$page_param = null){
        global $dbt;
        $where = $this->_metas_to_where($tag);
        $join = array($dbt['relationships'],$dbt['relationships'] . '.rid = ' . $dbt['contents'] . '.cid');
        $data['site_options'] = $this->site_options;
        $data['menus'] = $this->page_m->get_menus();
        $this->post_m->limit = $this->site_options['post_list'];
        $this->post_m->offset = $page_param;
        $this->post_m->init_pagination('',2,true,'',$where,$join);
        $data['current_page'] = 'index';
        $data['posts'] = $this->post_m->get_post_list('',$where,$join);
        $data['page_link'] = $this->pagination->create_links();
        $data['latest_posts'] = $this->widget_m->latest_post();
        $this->load_theme($this->site_options['theme'],'/index',$data);
    }

    /**
     * 根据分类归档
     *
     * @access public
     * @param  string $category_param
     * @param  int $page_param
     * @return void
     */
    public function category($category = '',$page_param = null){
        global $dbt;
        $where = $this->_metas_to_where($category,'category');
        $join = array($dbt['relationships'],$dbt['relationships'] . '.rid = ' . $dbt['contents'] . '.cid');
        $data['site_options'] = $this->site_options;
        $data['menus'] = $this->page_m->get_menus();
        $this->post_m->limit = $this->site_options['post_list'];
        $this->post_m->offset = $page_param;
        $this->post_m->init_pagination('',2,true,'',$where,$join);
        $data['current_page'] = 'index';
        $data['posts'] = $this->post_m->get_post_list('',$where,$join);
        $data['page_link'] = $this->pagination->create_links();
        $data['latest_posts'] = $this->widget_m->latest_post();
        $this->load_theme($this->site_options['theme'],'/index',$data);
    }

    public function test(){
        $this->meta_m->cid_get_html(22,'tag');
    }
}
?>