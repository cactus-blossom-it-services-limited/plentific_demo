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
    $header['name'] = $this->t('Remote ID');
    $header['email'] = $this->t('Email Address');
    $header['firstname'] = $this->t('First Name');
    $header['surname'] = $this->t('Last Name');
    $header['status'] = $this->t('Status');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\plentific_demo\Entity\Person */
    $row['id'] = $entity->id();
    $row['name'] = $entity->getName();
    $row['email'] = $entity->getEmail();
    $row['firstname'] = $entity->getFirstname();
    $row['surname'] = $entity->getLastname();
    $row['status'] = $entity->get('status')->value ? $this->t('Enabled') : $this->t('Disabled');
    return $row + parent::buildRow($entity);
  }

}
