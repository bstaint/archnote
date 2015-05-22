<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo $current_title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url().'static/css/bootstrap.min.css'?>" rel="stylesheet" media="screen">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?php echo $site_options['site_url'];?>"><?php echo $site_options['title'];?></a>
            <div class="nav-collapse collapse" style="height: 0px;">
                <ul class="nav">
                    <li<?php echo $current_page == 'index' ? ' class="active"' : '';?>><a href="<?php echo ADMIN_URL?>">摘要</a></li>
                    <li<?php echo $current_page == 'options' ? ' class="active"' : '';?>><a href="<?php echo ADMIN_URL . 'options'?>">设置</a></li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">创建 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li<?php echo $current_page == 'write_post' ? ' class="active"' : '';?>><a href="<?php echo ADMIN_URL . 'write/post'?>">发布日志</a></li>
                            <li<?php echo $current_page == 'write_page' ? ' class="active"' : '';?>><a href="<?php echo ADMIN_URL . 'write/page'?>">创建页面</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">管理 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li<?php echo $current_page == 'manage_post' ? ' class="active"' : '';?>><a href="<?php echo ADMIN_URL . 'manage/post'?>">日志管理</a></li>
                            <li<?php echo $current_page == 'manage_page' ? ' class="active"' : '';?>><a href="<?php echo ADMIN_URL . 'manage/page'?>">页面管理</a></li>
                            <li<?php echo $current_page == 'manage_meta' ? ' class="active"' : '';?>><a href="<?php echo ADMIN_URL . 'meta'?>">标签管理</a></li>
                            <li><a href="#">链接管理</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
            <div class="nav-collapse collapse">
                <p class="navbar-text pull-right">
                    Logged in as <a href="<?php echo base_url() . 'admin/logout'?>" class="navbar-link"><?php echo $username?></a>
                </p>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>