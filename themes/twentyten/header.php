<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo isset($page_title) ? $page_title . ' - ' : '';?><?php echo $site_options['title']?></title>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $site_options['theme_url']?>style.css" />
    <script type="text/javascript" src="<?php echo base_url() . 'static/js/jquery.min.js';?>"></script>
    <meta name="description" content="<?php echo $site_options['description']?>" />
    <meta name="keywords" content="<?php echo $site_options['keyword']?>" />
</head>
<body>
<div id="wrapper" class="hfeed">
    <div id="header">
        <div id="masthead">
            <div id="branding">
                <h1 id="site-title"><span><a href="<?php echo $site_options['site_url']?>" title="<?php echo $site_options['title']?>" rel="home"><?php echo $site_options['title']?></a></span></h1>
                <div id="site-description"><?php echo $site_options['description']?></div>
                <img src="<?php echo $site_options['theme_url']?>images/logo.jpg" width="940" height="159" alt="" />
            </div><!-- #branding -->
            <div id="access">
                <div class="menu">
                    <ul>
                        <li <?php if($current_page == 'index'):?>class="current_page_item"<?php endif;?>><a href="<?php echo $site_options['site_url']?>">首页</a></li>
                        <?php if($menus):?>
                        <?php foreach($menus as $menu){?>
                        <li class="page_item<?php if($current_page == $menu['cid']):?> current_page_item<?php endif;?>"><a href="<?php echo $menu['url'];?>" title="<?php echo $menu['title'];?>"><?php echo $menu['title'];?></a></li>
                        <?php } ?>
                        <?php endif;?>
                    </ul>
                </div>
            </div><!-- #access -->
        </div><!-- #masthead -->
    </div><!-- #header -->