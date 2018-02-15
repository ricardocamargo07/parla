<?php

namespace App\Services\Markdown;

use League\CommonMark\CommonMarkConverter;

class Service
{
    protected $markdown;

    public function __construct()
    {
        $this->markdown = new CommonMarkConverter();
    }

    public function convert($markdown)
    {
        return $this->markdown->convertToHtml($markdown);
    }
}
