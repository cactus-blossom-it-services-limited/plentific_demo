<?php

namespace Drupal\plentific_demo;

use Drupal\views\EntityViewsData;

/**
 * This class exposes the Person entity type to views.
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
