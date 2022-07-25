<?php

namespace DataGetter;

class RSSDataGetter
{
    public function getData(string $feedUrl): array
    {
        $items = [];
        $content = file_get_contents($feedUrl);
        $a = new \SimpleXMLElement($content);

        foreach($a->channel->item as $entry) {
            $items[] = [
                'name' => (string)$entry->title,
                'content' => sprintf('%s Lien : %s',(string)$entry->description, (string)$entry->link),
            ];
        }

        return $items;
    }
}
