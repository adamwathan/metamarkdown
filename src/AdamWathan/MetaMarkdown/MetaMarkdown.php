<?php 

namespace AdamWathan\MetaMarkdown;

use dflydev\markdown\MarkdownParser;

class MetaMarkdown
{
	private $raw;

	public $html;

	public function __construct($path)
	{
		$this->raw = file_get_contents($path);
		$this->extractMetadata();
		$this->compileHTML();
	}

	private function extractMetadata()
	{
		$pattern = '/^(.+:\s+.+\n)+([\s\S]*)/';
		preg_match($pattern, $this->raw, $matches);
		
		$metaData = explode("\n", $matches[0]);
		$this->raw = $matches[2];
		
		$this->parseMetaData($metaData);
	}

	private function parseMetaData($metaData)
	{
		foreach($metaData as $data) {
			$this->parseKeyValue($data);
		}
	}

	private function parseKeyValue($pair)
	{
		$matches = array();
		$pattern = '/^(.+):\s+(.+)$/';
		preg_match($pattern, $pair, $matches);

		if(count($matches)) {
			$this->{strtolower($matches[1])} = $matches[2];
		}
	}

	private function compileHTML()
	{
		$markdown = new MarkdownParser();
		$this->html = $markdown->transformMarkdown($this->raw);
	}
}