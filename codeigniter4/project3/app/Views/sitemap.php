<?php
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url('/') ?></loc>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= base_url('post') ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?= base_url('about') ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <url>
        <loc><?= base_url('contact') ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>
    <?php foreach ($categories as $category): ?>
        <url>
            <loc><?= base_url('post?category=' . $category['slug']) ?></loc>
            <changefreq>weekly</changefreq>
            <priority>0.7</priority>
        </url>
    <?php endforeach; ?>
    <?php foreach ($posts as $post): ?>
        <url>
            <loc><?= base_url('post/' . $post['slug']) ?></loc>
            <lastmod><?= date('c', strtotime($post['created_at'])) ?></lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
        </url>
    <?php endforeach; ?>
</urlset>
