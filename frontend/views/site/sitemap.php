<?php

/** @var \common\models\Articles[] $articles */
use yii\helpers\Url;
?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
	<?php foreach ($pages as $page): ?>
        <url>
            <loc><?= Url::home(true) ?><?= $page['url']?></loc>
            <lastmod><?= $page['lastmod'] ?></lastmod>
        </url>
    <?php endforeach; ?>
</urlset>