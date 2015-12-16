<?php

namespace FAN\LIFCKR\Model;

use FAN\LIFCKR\Model\BaseObject;

class Pager extends BaseObject
{
  private $page    = 0;
  private $pages   = 0;
  private $text    = '';

  private $pageItems = array();

  public function __construct($page, $pages, $text) {
    $this->page = $page;
    $this->pages = $pages;
    $this->text = $text;
    $this->generatePageItems();
  }


  private function getUrl() {
    return '/index.php?text=%s&page=%d';
  }

  public function getFirstPageUrl() {
    return sprintf($this->getUrl(), $this->text, 1);
  }

  public function getPrevPageUrl() {
    if ($this->page == 1) {
      return '';
    }
    return sprintf($this->getUrl(), $this->text, $this->page - 1);
  }

  public function getNextPageUrl() {
    if ($this->page == $this->pages) {
      return '';
    }
    return sprintf($this->getUrl(), $this->text, $this->page + 1);
  }

  public function getLastPageUrl() {
    return sprintf($this->getUrl(), $this->text, $this->pages);
  }

  public function generatePageItems() {
    $this->pageItems = array();

    if ($this->page <= 5) {
      $n = 1;
    } elseif ($this->page + 2 > $this->pages) {
      $n = $this->pages - 4;
    } else {
      $n = $this->page - 2;
    }

    $i = 0;
    do {
      $this->pageItems[$n] = sprintf($this->getUrl(), $this->text, $n);
      $n++;
      $i++;
    } while ($n <= $this->pages && $i < 5);
  }

  public function getPageItems() {
    return $this->pageItems;
  }

  public function getPage() {
    return $this->page;
  }

  public function getPages() {
    return $this->pages;
  }
}