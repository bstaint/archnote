<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<!DOCTYPE html>
<html>
<head>
    <title>登录 - <?php echo $site_title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'static/css/bootstrap.min.css'?>" rel="stylesheet" media="screen">
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }
        .form-signin img{
            margin: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <form class="form-signin" method="post">
        <?php if(isset($error)) echo '<span class="label label-important">Important</span>'.$error.'</span>';?>
        <h2 class="form-signin-heading">登录</h2>
        <input type="text" name="username" class="input-block-level" placeholder="Username" value="<?php echo set_value('username'); ?>"/>
        <input type="password" name="password" class="input-block-level" placeholder="Password" value="<?php echo set_value('password'); ?>" />
        <img src="<?php echo base_url() . 'admin/captcha'?>" /><input class="input-block-level" name="captcha" type="text" />
        <label class="checkbox">
            <input type="checkbox" name="remember"> 记住我
        </label>
        <button class="btn btn-small btn-primary" type="submit">登录</button>
    </form>
</div> <!-- /container -->
<script src="<?php echo base_url().'static/js/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'static/js/bootstrap.min.js'?>"></script>
</body>
</html>