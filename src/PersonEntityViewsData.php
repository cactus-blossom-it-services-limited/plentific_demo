<?php

namespace Drupal\plentific_demo;

use Drupal\views\EntityViewsData;

/**
 *
 */
class PersonEntityViewsData extends EntityViewsData {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    // Add your custom data descriptions here.
    return $data;
  }

}
