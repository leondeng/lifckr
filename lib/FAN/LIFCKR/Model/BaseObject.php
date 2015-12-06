<?php

namespace FAN\LIFCKR\Model;

abstract class BaseObject
{
	public function __toString() {
    return $this->getView();
  }

  public function getTemplate() {
    return dirname(__FILE__).'/../Template/'.(new \ReflectionClass($this))->getShortName().'.php';
  }

  public function getView() {
    $template = $this->getTemplate();
    $obj = $this;

    ob_start();
    ob_implicit_flush(0);

    try
    {
      require($template);
    }
    catch (Exception $e)
    {
      ob_end_clean();
      throw $e;
    }

    return ob_get_clean();
  }

  public function render() {
    echo $this->getView();
  }
}