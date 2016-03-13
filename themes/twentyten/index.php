<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<div id="main">
<div id="container">
    <div id="content">
        <?php if($posts):?>
        <?php foreach($posts as $post){?>
        <div id="post-<?php echo $post['cid'];?>" class="post-<?php echo $post['cid'];?> hentry post">
            <h2 class="entry-title"><a href="<?php echo $post['link'];?>" title="链向 <?php echo $post['title'];?> 的固定链接" rel="bookmark"><?php echo $post['title'];?></a></h2>
            <div class="entry-meta">
                <span class="meta-prep meta-prep-author">发表于</span> <?php echo $post['created'];?>					<span class="meta-sep">由</span> <span class="author vcard"><?php echo $post['author'];?></span>
            </div><!-- .entry-meta -->
            <div class="entry-content">
                <?php echo $post['content'];?>
            </div><!-- .entry-content -->
            <div class="entry-utility">
                <?php if(!empty($post['category'])):?>
                <span class="cat-links">
                    <span class="entry-utility-prep entry-utility-prep-cat-links">发表在</span> <?php echo $post['category'];?>
                </span>
                <?php endif;?>
                <span class="meta-sep">|</span>
                <?php if(!empty($post['tags'])):?>
                <span class="tag-links">
				    <span class="entry-utility-prep entry-utility-prep-tag-links">标签为</span> <?php echo $post['tags'];?>
                </span>
                <?php endif;?>
            </div><!-- .entry-utility -->
        </div><!-- #post-## -->
        <?php }?>
        <div id="nav-page" class="navigation">
            <?php echo $page_link;?>
        </div><!-- #nav-below -->
        <?php endif;?>
    </div><!-- #content -->
</div><!-- #container -->