<?php
    if ( ! defined('BASEPATH')) exit('No Access');

    $config['base_url'] = base_url() . '/page/';
    $config['uri_segment'] = 2;
    $config['use_page_numbers'] = TRUE;
    $config['full_tag_open'] = '<ol class="page-navigator">';
    $config['full_tag_close'] = '</ol>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_link'] = '&raquo;';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo;';
    $config['prev_tag_open'] = '<li>';
    $config['prev_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="current"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['query_string_segment'] = 'page';

    $config['first_link'] = false;
    $config['last_link'] = false;

?>