<?php

use DataGetter\RSSDataGetter;
use DataGetter\DatabaseDataGetterInterface;

class ArticleAgregator implements IteratorAggregate
{
    protected array $items = [];
    private DatabaseDataGetterInterface $sqlGetter;
    private RSSDataGetter $rssGetter;

    public function __construct(DatabaseDataGetterInterface $sqlGetter, RSSDataGetter $rssGetter)
    {
        $this->sqlGetter = $sqlGetter;
        $this->rssGetter = $rssGetter;
    }

    public function appendDatabase(string $host, string $user, string $password, string $databaseName): void
    {
        $this->appendArticles($this->sqlGetter->getData($host, $user, $password, $databaseName));
    }

    public function appendRss(string $name, string $feedUrl): void
    {
        $this->appendArticles($this->rssGetter->getData($feedUrl), $name);
    }

    private function appendArticles(array $datum, string $source_name = null)
    {
        foreach($datum as $data) {
            $this->items[] = new Article($data['name'], $data['source_name'] ?? $source_name, $data['content']);
        }
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}
