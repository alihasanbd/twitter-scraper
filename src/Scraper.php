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
		foreach($this->dom->find('div[class="content"]') as $a)
		{
			echo "<br>-------DATE--------------<br>";
			echo $a->find('span[data-long-form="true"]');
			
			echo "<br>-------CONTENT--------------<br>";
			echo $a->find('p[class="TweetTextSize TweetTextSize--normal js-tweet-text tweet-text"]');

			echo "<br>-------Link--------------<br>";
			if(count($a->find('a[class="twitter-timeline-link u-hidden"]')) >= 1) 
				echo $a->find('a[class="twitter-timeline-link u-hidden"]');

			echo "<br><br><br>";
		}
	}
}
