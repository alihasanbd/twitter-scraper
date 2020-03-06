<?php

namespace Kodeio\TwitterScraper;

class Scraper {
	
	private $dom;
	public static $errors = [];
	
	public function __construct($twitterId)
	{
		$this->dom = new \PHPHtmlParser\Dom();
		$this->dom->loadFromUrl("https://twitter.com/{$twitterId}");
	}
	
	
	public static function feed($twitterId)
	{
		$instance = new self($twitterId);
		return $instance->get_feed();
	}
	
	private function get_feed()
	{
		//dd([$this->dom]);
		
		foreach($this->dom->find('li[data-item-type="tweet"] div.tweet') as $tweet) {
			
			dd($tweet);
		}
	}
}
