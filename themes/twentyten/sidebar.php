<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<div id="primary" class="widget-area">
    <ul class="xoxo">
        <li class="widget-container widget_archive" id="search">
            <form method="post" action="<?php echo base_url().'search/';?>">
                <input type="text" name="q" class="text" size="20"> <input type="submit" class="submit" value="搜索">
            </form>
        </li>
        <li class="widget-container widget_recent_entries" id="recent-posts">
            <h3 class="widget-title">文章</h3>
            <ul>
                <?php if($latest_posts):?>
                <?php foreach($latest_posts as $latest_post){?>
                <li><a title="<?php echo $latest_post['title']?>" href="<?php echo $latest_post['url']?>"><?php echo $latest_post['title']?></a></li>
                <?php }?>
                <?php endif;?>
            </ul>
        </li>
        <li class="widget-container widget_recent-comments" id="recent-comments">
            <h3 class="widget-title">留言</h3>
            <ul class="ds-recent-comments" data-num-items="8" data-show-avatars="0" data-show-time="0" data-show-admin="0"></ul>
        </li>
        <li class="widget-container widget_archive" id="other">
            <h3 class="widget-title">其他</h3>
            <ul>
                <li class="last"><a href="<?php echo base_url() . 'admin/login'?>">登录</a></li>
                <li><a href="<?php echo base_url() . 'admin/logout'?>">退出</a></li>
                <li><a href="<?php echo base_url() . 'feed/'?>">RSS 订阅</a></li>
            </ul>
        </li>
    </ul>
</div>