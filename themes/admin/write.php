<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<link rel="stylesheet" href="<?php echo base_url();?>static/editor/themes/default/default.css" />
<script charset="utf-8" src="<?php echo base_url();?>static/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="<?php echo base_url();?>static/editor/lang/zh_CN.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>static/js/swfupload.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>static/js/handlers.js"></script>
<script type="text/javascript">
    //编辑器
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="content"]', {
            resizeType : 1,
            allowPreviewEmoticons : false,
            allowImageUpload : false,
            items : [
                'source', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'image', 'flash', 'link', '|', 'clearhtml', 'fullscreen', '|', 'about']
        });
    });
    //上传组件
    //swfupload
    var swfu;
    window.onload = function () {
        swfu = new SWFUpload({
            // Backend Settings
            upload_url: "<?php echo base_url() . 'admin/upload'?>",
            post_params: {"PHPSESSID": "<?php echo session_id(); ?>"},

            // File Upload Settings
            file_size_limit : "2 MB",	// 2MB
            file_types : "*.jpg;*.gif;*.png",
            file_types_description : "JPG Images",
            file_upload_limit : "5",
            file_queue_limit : 0,

            // Event Handler Settings - these functions as defined in Handlers.js
            //  The handlers are not part of SWFUpload but are part of my website and control how
            //  my website reacts to the SWFUpload events.
            file_queue_error_handler : fileQueueError,
            file_dialog_complete_handler : fileDialogComplete,
            upload_progress_handler : uploadProgress,
            upload_error_handler : uploadError,
            upload_success_handler : uploadSuccess,
            upload_complete_handler : uploadComplete,

            // Button Settings
            button_image_url : "<?php echo base_url();?>static/images/swfupload.png",
            button_placeholder_id : "spanButtonPlaceholder",
            button_width: 180,
            button_height: 18,
            button_text : '<span class="button">选择图片<span class="buttonSmall"></span></span>',
            button_text_style : '.button { font-family: Helvetica, Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
            button_text_top_padding: 0,
            button_text_left_padding: 18,
            button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
            button_cursor: SWFUpload.CURSOR.HAND,

            // Flash Settings
            flash_url : "<?php echo base_url();?>static/swf/swfupload.swf",

            // Debug Settings
            debug: false
        });
    };
</script>
<div class="container">
    <div class="hero-unit">
        <div class="row-fluid">
            <form method="post">
                <div class="span9">
                    <label>标题：</label>
                    <input class="input-mini" type="text" name="title" placeholder="请输入标题..." style="width: 96%">
                    <label>内容：</label>
                    <textarea class="" name="content" rows="18" style="width:98%"></textarea>
                    <div class="swfupload">
                        <span id="spanButtonPlaceholder"></span>
                        <div class="uploadfile"></div>
                    </div>
                    <button type="submit" class="btn">发布</button>
                </div>
                <div class="span3">
                    <?php if($current_page == 'write_post'){?>
                    <label>请选择分类：</label>
                    <select>
                        <?php foreach($categorys as $category){?>
                            <option value="<?php echo $category->mid;?>"><?php echo $category->name;?></option>
                        <?php }?>
                    </select>
                    <?php }else{?>
                        <label>别名：</label>
                        <input type="text" name="alias" class="input-block-level" />
                    <?php }?>
                </div>
            </form>
        </div>
    </div>