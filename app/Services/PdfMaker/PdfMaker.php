<?php

/**
 * Africa Novatech (https://africanovatech.com).
 *
 * @link https://africanovatech.com source repository
 *
 * @copyright Copyright (c) 2023. Invoice Novatech LLC (https://africanovatech.com)
 *
 * @license https://www.elastic.co/licensing/elastic-license
 */

namespace App\Services\PdfMaker;

use League\CommonMark\CommonMarkConverter;

class PdfMaker
{
    use PdfMakerUtilities;

    protected $data;

    public $design;

    public $html;

    public $document;

    private $xpath;

    private $filters = [
        '<![CDATA[' => '',
        '<![CDATA[<![CDATA[' => '',
        ']]]]><![CDATA[>]]>' => '',
        ']]>' => '',
        '<?xml version="1.0" encoding="utf-8" standalone="yes"??>' => '',
    ];

    private $options;

    /** @var CommonMarkConverter */
    protected $commonmark;

    public function __construct(array $data)
    {
        $this->data = $data;

        if (array_key_exists('options', $data)) {
            $this->options = $data['options'];
        }

        $this->commonmark = new CommonMarkConverter([
            'allow_unsafe_links' => false,
            // 'html_input' => 'allow',
        ]);
    }

    public function design(Design $design)
    {
        $this->design = $design;

        $this->initializeDomDocument();

        return $this;
    }

    public function build()
    {
        if (isset($this->data['template']) && isset($this->data['variables'])) {
            $this->getEmptyElements($this->data['template'], $this->data['variables']);
        }

        if (isset($this->data['template'])) {
            $this->updateElementProperties($this->data['template']);
        }

        if (isset($this->data['variables'])) {
            $this->updateVariables($this->data['variables']);
        }

        return $this;
    }

    /**
     * Final method to get compiled HTML.
     *
     * @param bool $final @deprecated // is it? i still see it being called elsewhere
     * @return mixed
     */
    public function getCompiledHTML($final = false)
    {
        $html = $this->document->saveHTML();

        return str_replace('%24', '$', $html);
    }
}
