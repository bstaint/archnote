<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<style>
    label{
        margin-bottom:10px ;
    }
</style>
<div class="container">
    <div class="hero-unit">
        <?php if(isset($error)) echo '<span class="label label-important">Important</span>'.$error.'</span>';?>
        <div class="row-fluid">
            <div class="span9">
                <form id="form1" method="post" action="<?php echo ADMIN_URL;?>options/system">
                    <fieldset>
                        <legend>系统设置</legend>
                        <label>网站标题：</label>
                        <input type="text" name="title" value="<?php echo $site_options['title'];?>">
                        <label>网站地址：</label>
                        <input type="text" name="url" value="<?php echo $site_options['site_url'];?>">
                        <label>关键词(多个关键词请以","分开)</label>
                        <input type="text" name="keyword" value="<?php echo $site_options['keyword'];?>" style="width: 80%">
                        <label>站点描述</label>
                        <textarea rows="5" name="description" style="width: 80%"><?php echo $site_options['description'];?></textarea>
                        <label>缓存：<input type="checkbox" name="cache" <?php echo $site_options['cache'] ? 'checked="ture"' : '';?>></label>
                        <label>主题：<?php echo $site_options['theme'];?></label>
                        <label>列表数：<input class="input-mini" type="text" name="list_num" value="<?php echo $site_options['post_list'];?>"></label>
                        <button type="submit" class="btn">更新</button>
                    </fieldset>
                </form>
            </div>
            <div class="span3">
                <form method="post" action="<?php echo ADMIN_URL;?>options/user">
                    <fieldset>
                        <legend>个人信息</legend>
                        <label>用户名：<?php echo $userinfo['name'];?></label>
                        <label>邮箱</label>
                        <input type="text" name="mail" value="<?php echo $userinfo['mail'];?>">
                        <label>密码</label>
                        <input type="password" name="password" value="">
                        <label>重复密码</label>
                        <input type="password" name="password2" value="">
                        <button type="submit" class="btn">更新</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>