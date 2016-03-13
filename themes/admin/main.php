<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<style type="text/css">
ul{
    list-style: none;
    margin: 0;
}
ul li{
    line-height: 22px;
}
.span6 p{
    text-align: right;
}
</style>
<div class="container">
    <!-- Main hero unit for a primary marketing message or call to action -->
    <div class="hero-unit">
    </div>
    <!-- Example row of columns -->
    <div class="row">
        <div class="span6">
            <h3>常用操作</h3>
            <div class="intro-link">
                <ul>
                    <li><a href="#">更新我的资料</a></li>
                    <li><a href="<?php echo base_url() .'admin/write/post';?>">撰写一篇新文章</a></li>
                    <li><a href="<?php echo base_url() .'admin/write/page';?>">创建一个新页面</a></li>
                    <li><a href="#">更换我的主题</a></li>
                    <li><a href="#">修改系统设置</a></li>
                </ul>
            </div>
        </div>
        <div class="span6">
            <h3>最近日志</h3>
            <ul class="latest_post">
                <?php foreach($latest_posts as $latest_post):?>
                    <li><a href="<?php echo $latest_post['url'];?>" class="title" target="_blank"><?php echo $latest_post['title'];?></a> 发布于                        <?php echo $latest_post['category'];?> - <span class="date"><?php echo $latest_post['created'];?></span></li>
                <?php endforeach;?>
            </ul>
            <p><a class="btn" href="<?php echo base_url() . 'admin/manage/post'?>">查看更多 »</a></p>
        </div>
    </div>