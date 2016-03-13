<?php
if ( ! defined('BASEPATH')) exit('No Access');
header("Content-Type: text/xml");
?>
<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
     xmlns:atom="http://www.w3.org/2005/Atom"
     xmlns:wfw="http://wellformedweb.org/CommentAPI/">
    <channel>
        <title><?php echo $site_options['title'];?></title>
        <link><?php echo $site_options['site_url'];?></link>
        <atom:link href="<?php echo $current_url;?>" rel="self" type="application/rss+xml" />
        <language>zh-CN</language>
        <description><?php echo $site_options['description'];?></description>
        <lastBuildDate><?php echo $last_date;?></lastBuildDate>
        <pubDate><?php echo $last_date;?></pubDate>
        <?php foreach($posts as $post):?>
        <item>
            <title><?php echo $post['title'];?></title>
            <link><?php echo $post['link'];?></link>
            <guid><?php echo $post['link'];?></guid>
            <pubDate><?php echo $post['created'];?></pubDate>
            <dc:creator><?php echo $post['author'];?></dc:creator>
            <content:encoded xml:lang="zh-CN"><![CDATA[<?php echo $post['content'];?>]]></content:encoded>
            <comments><?php echo $post['link'];?>#comments</comments>
        </item>
        <?php endforeach;?>
    </channel>
</rss>