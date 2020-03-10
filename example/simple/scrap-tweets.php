<?php

require_once(__DIR__ .'/../loader.php');

use Kodeio\TwitterScraper\Scraper;


$tweets = Scraper::feed('PolicyPak');
dd($tweets);
