<?php
declare(strict_types=1);

namespace Tomaj\Scraper;

use DateTime;

class Meta
{
    private $title;

    private $description;

    private $authors = [];

    private $keywords;

    private $ogType;

    private $ogTitle;

    private $ogDescription;

    private $ogUrl;

    private $ogSiteName;

    private $ogImage;

    private $section;

    private $publishedTime;

    private $modifiedTime;

    public function setTitle(string $title): Meta
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setDescription(string $description): Meta
    {
        $this->description = $description;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function addAuthor($author): Meta
    {
        $this->authors[] = $author;
        return $this;
    }

    public function getAuthor(): ?string
    {
        if (count($this->authors)) {
            return $this->authors[0];
        }
        return null;
    }

    public function getAuthors(): array
    {
        return $this->authors;
    }

    public function setKeywords(string $keywords): Meta
    {
        $this->keywords = $keywords;
        return $this;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setOgType(string $ogType): Meta
    {
        $this->ogType = $ogType;
        return $this;
    }

    public function getOgType(): ?string
    {
        return $this->ogType;
    }

    public function setOgTitle(string $ogTitle): Meta
    {
        $this->ogTitle = $ogTitle;
        return $this;
    }

    public function getOgTitle(): ?string
    {
        return $this->ogTitle;
    }

    public function setOgDescription(string $ogDescription): Meta
    {
        $this->ogDescription = $ogDescription;
        return $this;
    }

    public function getOgDescription(): ?string
    {
        return $this->ogDescription;
    }

    public function setOgUrl(string $ogUrl): Meta
    {
        $this->ogUrl = $ogUrl;
        return $this;
    }

    public function getOgUrl(): ?string
    {
        return $this->ogUrl;
    }

    public function setOgSiteName(string $ogSiteName): Meta
    {
        $this->ogSiteName = $ogSiteName;
        return $this;
    }

    public function getOgSiteName(): ?string
    {
        return $this->ogSiteName;
    }

    public function setOgImage(string $ogImage): Meta
    {
        $this->ogImage = $ogImage;
        return $this;
    }

    public function getOgImage(): ?string
    {
        return $this->ogImage;
    }

    public function setSection(string $section): Meta
    {
        $this->section = $section;
        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setPublishedTime($publishedTime): Meta
    {
        if ($publishedTime instanceof DateTime) {
            $this->publishedTime = $publishedTime;
        } else {
            $time = strtotime($publishedTime);
            if ($time) {
                $this->publishedTime = new DateTime('@' . $time);
            }
        }
        return $this;
    }

    public function getPublishedTime(): ?DateTime
    {
        return $this->publishedTime;
    }

    public function setModifiedTime($modifiedTime)
    {
        if ($modifiedTime instanceof DateTime) {
            $this->modifiedTime = $modifiedTime;
        } else {
            $time = strtotime($modifiedTime);
            if ($time) {
                $this->modifiedTime = new DateTime('@' . $time);
            }
        }
        return $this;
    }

    public function getModifiedTime(): ?DateTime
    {
        return $this->modifiedTime;
    }

    public function merge(Meta $meta): Meta
    {
        if (!$this->getTitle() && $meta->getTitle()) {
            $this->setTitle($meta->getTitle());
        }

        if (!$this->getDescription() && $meta->getDescription()) {
            $this->setDescription($meta->getDescription());
        }

        if (empty($this->getAuthors()) && count($meta->getAuthors())) {
            foreach ($meta->getAuthors() as $author) {
                $this->addAuthor($author);
            }
        }

        if (!$this->getKeywords() && $meta->getKeywords()) {
            $this->setKeywords($meta->getKeywords());
        }

        if (!$this->getOgType() && $meta->getOgType()) {
            $this->setOgType($meta->getOgType());
        }

        if (!$this->getOgTitle() && $meta->getOgTitle()) {
            $this->setOgTitle($meta->getOgTitle());
        }

        if (!$this->getOgDescription() && $meta->getOgDescription()) {
            $this->setOgDescription($meta->getOgDescription());
        }

        if (!$this->getOgUrl() && $meta->getOgUrl()) {
            $this->setOgUrl($meta->getOgUrl());
        }

        if (!$this->getOgSiteName() && $meta->getOgSiteName()) {
            $this->setOgSiteName($meta->getOgSiteName());
        }

        if (!$this->getOgImage() && $meta->getOgImage()) {
            $this->setOgImage($meta->getOgImage());
        }

        if (!$this->getSection() && $meta->getSection()) {
            $this->setSection($meta->getSection());
        }

        if (!$this->getPublishedTime() && $meta->getPublishedTime()) {
            $this->setPublishedTime($meta->getPublishedTime());
        }

        if (!$this->getModifiedTime() && $meta->getModifiedTime()) {
            $this->setModifiedTime($meta->getModifiedTime());
        }

        return $this;
    }
}
