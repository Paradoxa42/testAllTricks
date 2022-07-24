<?php

class Article
{
    private string $name;
    private string $sourceName;
    private string $content;

    public function __construct(?string $name = null, ?string $sourceName = null, ?string $content = null)
    {
        $this->name = $name;
        $this->sourceName = $sourceName;
        $this->content = $content;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSourceName(): string
    {
        return $this->sourceName;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setName(string $name): Article
    {
        $this->name = $name;
        return $this;
    }

    public function setSourceName(string $sourceName): Article
    {
        $this->sourceName = $sourceName;
        return $this;
    }

    public function setContent(string $content): Article
    {
        $this->content = $content;
        return $this;
    }
}
