<?php if ( ! defined('BASEPATH')) exit('No Access');
    //时区设置
    date_default_timezone_set('Asia/Shanghai');
    //表名设置
    global $dbt;
    $dbt = array(
        'contents' => 'archnote_contents',
        'metas' => 'archnote_metas',
        'options' => 'archnote_options',
        'relationships' => 'archnote_relationships'
    );

    define('ADMIN_DIR','admin/');

    //数据库设置
    define('DB_HOST', 'localhost');
    define('DB_USER', '');
    define('DB_PASS', '');
    define('DB_NAME', '');
?>