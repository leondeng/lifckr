<?php

namespace FAN\LIFCKR\Model;

use FAN\LIFCKR\Model\BaseObject;
use FAN\LIFCKR\Model\Photo;

class PhotoList extends BaseObject
{
  private $page = 0;
  private $pages = 0;
  private $perpage = 0;
  private $total = 0;

  private $photos = array();

  public function __construct($data) {
    $dataArray = (array) json_decode($data);
    $dataArray = (array) $dataArray['photos'];

    if (isset($dataArray['page'])) {
      $this->page = $dataArray['page'];
    }
    if (isset($dataArray['pages'])) {
      $this->pages = $dataArray['pages'];
    }
    if (isset($dataArray['perpage'])) {
      $this->perpage = $dataArray['perpage'];
    }
    if (isset($dataArray['total'])) {
      $this->total = $dataArray['total'];
    }
    if (isset($dataArray['photo'])) {
      foreach ($dataArray['photo'] as $photoInfo) {
        $info = (array)$photoInfo;
        $this->photos[$info['id']] = new Photo($info);
      }
    }
  }

  public function getPage() {
    return $this->page;
  }

  public function getPages() {
    return $this->pages;
  }

  public function getPhotos() {
    return $this->photos;
  }
}