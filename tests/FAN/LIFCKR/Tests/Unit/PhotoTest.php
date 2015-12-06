<?php

namespace FAN\LIFCKR\Tests\Unit;

use FAN\LIFCKR\Model\Photo;

class PhotoTest extends \PHPUnit_Framework_TestCase
{
  public function testInitlization() {
    $photo = $this->getPhoto();

    $this->assertEquals('14218763829', $photo->getId());
  }

  public function testRender() {
    $photo = $this->getPhoto();

    $this->assertEquals('<div class="photo" style="float:left;">
  <a href="/photo.php?id=14218763829" target="_blank">
    <div style="width:100px; height:67px; background-image:url(\'https://farm3.staticflickr.com/2925/14218763829_6f1a050bfc_t.jpg\')">
    </div>
  </a>
</div>
', $photo->getView());
  }

  private function getPhoto() {
    $data = '{"id":"14218763829","owner":"25176950@N04","secret":"6f1a050bfc","server":"2925","farm":3,"title":"xxx","ispublic":1,"isfriend":0,"isfamily":0,"safe":1,"license":"0","needs_interstitial":0,"description":{"_content":"xxx"},"rotation":0,"ownername":"waliditaly2008","count_faves":"14","count_comments":"1","can_comment":1,"isfavorite":0,"media":"photo","media_status":"ready","url_l":"https:\/\/farm3.staticflickr.com\/2925\/14218763829_6f1a050bfc_b.jpg","url_l_cdn":"https:\/\/c1.staticflickr.com\/3\/2925\/14218763829_6f1a050bfc_b.jpg","height_l":"470","width_l":"700","url_m":"https:\/\/farm3.staticflickr.com\/2925\/14218763829_6f1a050bfc.jpg","url_m_cdn":"https:\/\/c1.staticflickr.com\/3\/2925\/14218763829_6f1a050bfc.jpg","height_m":"336","width_m":"500","url_n":"https:\/\/farm3.staticflickr.com\/2925\/14218763829_6f1a050bfc_n.jpg","url_n_cdn":"https:\/\/c1.staticflickr.com\/3\/2925\/14218763829_6f1a050bfc_n.jpg","height_n":215,"width_n":"320","url_q":"https:\/\/farm3.staticflickr.com\/2925\/14218763829_6f1a050bfc_q.jpg","url_q_cdn":"https:\/\/c1.staticflickr.com\/3\/2925\/14218763829_6f1a050bfc_q.jpg","height_q":"150","width_q":"150","url_s":"https:\/\/farm3.staticflickr.com\/2925\/14218763829_6f1a050bfc_m.jpg","url_s_cdn":"https:\/\/c1.staticflickr.com\/3\/2925\/14218763829_6f1a050bfc_m.jpg","height_s":"161","width_s":"240","url_sq":"https:\/\/farm3.staticflickr.com\/2925\/14218763829_6f1a050bfc_s.jpg","url_sq_cdn":"https:\/\/c1.staticflickr.com\/3\/2925\/14218763829_6f1a050bfc_s.jpg","height_sq":75,"width_sq":75,"url_t":"https:\/\/farm3.staticflickr.com\/2925\/14218763829_6f1a050bfc_t.jpg","url_t_cdn":"https:\/\/c1.staticflickr.com\/3\/2925\/14218763829_6f1a050bfc_t.jpg","height_t":"67","width_t":"100","url_z":"https:\/\/farm3.staticflickr.com\/2925\/14218763829_6f1a050bfc_z.jpg","url_z_cdn":"https:\/\/c1.staticflickr.com\/3\/2925\/14218763829_6f1a050bfc_z.jpg","height_z":"430","width_z":"640","pathalias":null,"is_marketplace_licensable":false,"marketplace_licensing_url":""}';
    $photoInfoArray = json_decode($data);
    return new Photo((array)$photoInfoArray);
  }
}

