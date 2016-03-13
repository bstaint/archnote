<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<div id="main">
    <div id="container">
        <div id="content">
            <div id="post-<?php echo $post['cid']; ?>" class="post-<?php echo $post['cid']; ?> post hentry">
                <h1 class="entry-title"><?php echo $post['title']; ?></h1>
                <div class="entry-meta">
                    <span class="meta-prep meta-prep-author">发表于</span> <span class="entry-date"><?php echo $post['created']; ?></span>
                    <span class="meta-sep">由</span> <span class="author vcard"><?php echo $post['author']; ?></span>
                </div><!-- .entry-meta -->
                <div class="entry-content">
                    <?php echo $post['content']; ?>
                    <div class="license">
                        <b>转载请注明: </b>本文<a href="<?php echo $post['link'];?>" title="查看原文" target="_blank">《<?php echo $post['title'];?>》</a>来源于<a href="<?php echo $site_options['site_url'];?>" title="<?php echo $site_options['title'];?>"><?php echo $site_options['title'];?></a>。
                    </div>
                </div><!-- .entry-content -->
                <div class="entry-utility">
                    此条目发表在 <?php echo $post['categorys'];?>，贴了 <?php echo $post['tags'];?> 标签。将<a href="<?php echo $post['link'];?>" title="链向 <?php echo $post['title']; ?> 的固定链接" rel="bookmark">固定链接</a>加入收藏夹。
                </div><!-- .entry-utility -->
            </div><!-- #post-## -->
            <div id="nav-below" class="navigation">
                <div class="nav-previous">
                    <?php echo $prev_post;?>
                </div>
                <div class="nav-next">
                    <?php echo $next_post;?>
                </div>
            </div>
            <div id="related_log">
            </div>