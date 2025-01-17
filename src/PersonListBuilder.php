<?php

namespace Drupal\plentific_demo;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * EntityListBuilderInterface implementation for the Person entities.
 */
class PersonListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Person ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\plentific_demo\Entity\Person */
    $row['id'] = $entity->id();
    $row['name'] = $entity->toLink();
    return $row + parent::buildRow($entity);
  }

}
