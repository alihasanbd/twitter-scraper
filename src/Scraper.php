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
		$results = array();
		foreach($this->dom->find('div[class="content"]') as $tweet)
		{
			$header = $tweet->find('a[class="tweet-timestamp js-permalink js-nav js-tooltip"]');
			$content = $tweet->find('p[class="TweetTextSize TweetTextSize--normal js-tweet-text tweet-text"]');
			$date = \DateTime::createFromFormat('H:i A - d M Y', $header->getAttribute('title')); 

			$results[] = (object) array(
				'tdate' => $date->format('Y-m-d H:i:s'),
				'thtml' => $content->outerHtml(),
				'content' => $content->text(true),
				'turl' => 'https://twitter.com' . $header->getAttribute('href'),
			);
		}
		return $results;
	}
}
