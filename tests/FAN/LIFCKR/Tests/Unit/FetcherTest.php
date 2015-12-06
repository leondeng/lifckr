<?php

namespace FAN\LIFCKR\Tests\Unit;

use FAN\LIFCKR\Model\Fetcher;

require_once(dirname(__FILE__).'/../../../../../config/AppConfiguration.php');

class FetcherTest extends \PHPUnit_Framework_TestCase
{
  public function testInitlization() {
    $fetcher = $this->getFetcher();

    $this->assertContains('photos', $fetcher->fetchData('aaa', 1));
  }

  private function getFetcher() {
    return new Fetcher();
  }
}