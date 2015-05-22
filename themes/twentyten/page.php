<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<div id="main">
    <div id="container">
        <div id="content">
            <div class="post-<?php echo $post['cid'] ?> page  hentry" id="post-<?php echo $post['cid'] ?>">
                <h1 class="entry-title"><?php echo $post['title'] ?></h1>
                <div class="entry-content">
                    <?php echo $post['content'] ?>
                </div><!-- .entry-content -->
            </div><!-- #post-## -->