<?php

namespace FAN\LIFCKR\Model;

use FAN\LIFCKR\Model\BaseObject;

class Photo extends BaseObject
{
	private $info = array();

  public function __construct(array $data) {
    $this->info = $data;
  }

  public function getId() {
    if (isset($this->info['id'])) {
      return $this->info['id'];
    } else {
      return 0;
    }
  }

  public function getThumbWidth() {
    if (isset($this->info['width_t'])) {
      return $this->info['width_t'];
    } else {
      return 0;
    }
  }

  public function getThumbHeight() {
    if (isset($this->info['height_t'])) {
      return $this->info['height_t'];
    } else {
      return 0;
    }
  }

  public function getThumbUrl() {
    if (isset($this->info['url_t'])) {
      return $this->info['url_t'];
    } else {
      return '';
    }
  }

  public function getLargeUrl() {
    if (isset($this->info['url_l'])) {
      return $this->info['url_l'];
    } else {
      return false;
    }
  }

  public function getMediumUrl() {
    if (isset($this->info['url_m'])) {
      return $this->info['url_m'];
    } else {
      return false;
    }
  }

  public function getSmallUrl() {
    if (isset($this->info['url_s'])) {
      return $this->info['url_s'];
    } else {
      return false;
    }
  }

  public function getUrl() {
    if ($url = $this->getLargeUrl()) {
      return $url;
    }

    if ($url = $this->getMediumUrl()) {
      return $url;
    }

    if ($url = $this->getSmallUrl()) {
      return $url;
    }

    return $this->getThumbUrl();
  }

  public function getDesc() {
    if (isset($this->info['title'])) {
      return $this->info['title'];
    }

    $info = (array) $this->info['description'];

    if (isset($info['_content'])) {
      return $info['_content'];
    }

    return '';
  }
}