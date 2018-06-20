<?php
namespace App\Services\Markdown;

use League\CommonMark\Converter;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;
use Webuni\CommonMark\AttributesExtension\AttributesExtension;

class Service
{
    protected $markdown;

    public function __construct()
    {
        $environment = Environment::createCommonMarkEnvironment();

        $environment->addExtension(new AttributesExtension());

        $this->markdown = new Converter(
            new DocParser($environment),
            new HtmlRenderer($environment)
        );
    }

    public function convert($markdown)
    {
        return $this->markdown->convertToHtml($markdown);
    }
}
