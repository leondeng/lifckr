<?php

namespace FAN\LIFCKR\Model;

class Fetcher
{
  private function getUrl($text, $page) {
    return sprintf('%s?method=%s&api_key=%s&text=%s&per_page=%d&format=json&nojsoncallback=1&extras=%s&page=%d',
      G_FlickrUrl, G_SearchApi, G_ApiKey, $text, G_PerPage, G_Extras, $page);
  }

  public function fetchData($text, $page = 1) {
    try {
      $ch = curl_init();

      if (FALSE === $ch) {
        throw new Exception('failed to initialize');
      }

      curl_setopt($ch, CURLOPT_URL, $this->getUrl($text, $page));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      
      $content = curl_exec($ch);

      if (FALSE === $content) {
        throw new Exception(curl_error($ch), curl_errno($ch));
      }

      return $content;
    } catch(Exception $e) {
      trigger_error(sprintf(
        'Curl failed with error #%d: %s',
        $e->getCode(), $e->getMessage()),
        E_USER_ERROR);
    }

    return false;
  }
}