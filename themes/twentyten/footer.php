<?php if ( ! defined('BASEPATH')) exit('No Access');?>
<div id="footer">
    <div id="colophon">
        <div id="site-info">
            <a rel="home" title="<?php echo $site_options['title']?>" href="<?php echo $site_options['site_url']?>"><?php echo $site_options['title']?></a>
        </div><!-- #site-info -->
        <div id="site-generator">
            All Right Reserved, <strong>{elapsed_time}</strong> seconds, <strong>{memory_usage}</strong> memorys, 基于CodeIgniter.
        </div><!-- #site-generator -->
    </div><!-- #colophon -->
</div>
</div>
<script type="text/javascript">
    var duoshuoQuery = {short_name:"archnote"};
    (function() {
        var ds = document.createElement('script');
        ds.type = 'text/javascript';ds.async = true;
        ds.src = 'http://static.duoshuo.com/embed.js';
        ds.charset = 'UTF-8';
        (document.getElementsByTagName('head')[0]
            || document.getElementsByTagName('body')[0]).appendChild(ds);
    })();
</script>
</body>
</html>