<?php
require 'autoload.php';

use DataGetter\RSSDataGetter;
use DataGetter\MysqlDataGetter;

$sqlDataGetter = new MysqlDataGetter();
$rssDataGetter = new RSSDataGetter();
$a = new ArticleAgregator($sqlDataGetter, $rssDataGetter);

$a->appendDatabase('localhost', 'root', '', 'alltricks_test');
$a->appendRss('Le Monde', 'http://www.lemonde.fr/rss/une.xml');

foreach ($a as $article) {
    echo sprintf('<h2>%s</h2><em>%s</em><p>%s</p>',
        $article->getName(),
        $article->getSourceName(),
        $article->getContent()
    );
}
