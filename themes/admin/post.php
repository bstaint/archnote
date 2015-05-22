<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<div class="container">
<style type="text/css">
td{
    font-size: 13px;
}
ol{
    list-style: none;
    margin: 0px;
}
ol li{
    font-size: 14px;
    float: left;
    margin: 0 2px;
}
ol li.current a{
   color: #000;
}
td{
    height: 25px;
}
</style>
    <div class="hero-unit">
        <table class="table table-hover table-condensed">
            <?php if($posts):?>
            <thead>
            <tr>
                <th> </th>
                <th width="60%">标题</th>
                <th>作者</th>
                <?php echo $current_page == 'manage_post' ? '<th>分类</th>' : '<th>别名</th>';?>
                <th>日期</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($posts as $post):?>
            <tr>
                <td><input type="checkbox" value="387" name="cid[]"></td>
                <td><a href="<?php echo $post['link'];?>"><?php echo $post['title'];?></a></td>
                <td><?php echo $post['author'];?></td>
                <td><?php echo $post['type'] == 'post' ? $post['category'] : $post['alias'];?></td>
                <td><?php echo $post['created'];?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
            <?php endif;?>
        </table>
        <?php echo $page_link;?>
    </div>