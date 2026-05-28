<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title><?= esc($feed_title) ?></title>
        <link><?= esc($feed_link) ?></link>
        <description><?= esc($feed_description) ?></description>
        <language><?= esc($feed_language) ?></language>
        <lastBuildDate><?= date('r') ?></lastBuildDate>
        <atom:link href="<?= base_url('rss') ?>" rel="self" type="application/rss+xml"/>
        <?php foreach ($posts as $post): ?>
            <item>
                <title><?= esc($post['title']) ?></title>
                <link><?= base_url('post/' . $post['slug']) ?></link>
                <guid isPermaLink="true"><?= base_url('post/' . $post['slug']) ?></guid>
                <description><?= esc(substr(strip_tags($post['content']), 0, 200)) ?></description>
                <author><?= esc($post['author'] ?? 'Admin') ?></author>
                <category><?= esc($post['category_name'] ?? 'General') ?></category>
                <pubDate><?= date('r', strtotime($post['created_at'])) ?></pubDate>
            </item>
        <?php endforeach; ?>
    </channel>
</rss>
