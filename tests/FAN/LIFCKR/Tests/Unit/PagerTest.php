<?php

namespace FAN\LIFCKR\Tests\Unit;

use FAN\LIFCKR\Model\Pager;

//require_once(dirname(__FILE__).'/../../../../../config/AppConfiguration.php');

class PagerTest extends \PHPUnit_Framework_TestCase
{
  public function testInitlization() {
    $pager = $this->getPager();

    $this->assertEquals(5, count($pager->getPageItems()));
  }

  public function testRender() {
    $pager = $this->getPager();

    $this->assertEquals('<div class="pager" style="clear:both">
  <ul>
      <li>&laquo;</li>
    <li>&lsaquo;</li>
          <li>1</li>
            <li><a href="/index.php?text=aaa&page=2">2</a></li>
            <li><a href="/index.php?text=aaa&page=3">3</a></li>
            <li><a href="/index.php?text=aaa&page=4">4</a></li>
            <li><a href="/index.php?text=aaa&page=5">5</a></li>
          <li><a href="/index.php?text=aaa&page=2" title="Next">&rsaquo;</a></li>
      <li><a href="/index.php?text=%s&page=%d15632" title="Last">&raquo;</a></li>
      </ul>
</div>
', $pager->getView());
  }

  private function getPager() {
    return new Pager(1, 15632, 'aaa');
  }
}