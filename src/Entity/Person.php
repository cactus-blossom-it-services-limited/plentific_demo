<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;

/**
 * Defines the person entity class.
 *
 * @ContentEntityType(
 *   id = "person",
 *   label = @Translation("Person"),
 *   bundle_label = @Translation("Person type"),
 *   handlers = {
 *     "list_builder" = "Drupal\plentific_demo\PersonListBuilder",
 *     "views_data" = "Drupal\plentific_demo\PersonEntityViewsData",
 *     "form" = {
 *       "default" = "Drupal\plentific_demo\Form\PersonForm",
 *       "add" = "Drupal\plentific_demo\Form\PersonForm",
 *       "edit" = "Drupal\plentific_demo\Form\PersonForm",
 *       "delete" = "Drupal\Core\Entity\ContentEntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "person",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "bundle" = "type"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/person/{person}",
 *     "add-form" = "/admin/structure/person/add/{person_type}",
 *     "add-page" = "/admin/structure/person/add",
 *     "edit-form" = "/admin/structure/person/{person}/edit",
 *     "delete-form" = "/admin/structure/person/{person}/delete",
 *     "collection" = "/admin/structure/person",
 *   },
 *   bundle_entity_type = "person_type",
 *   field_ui_base_route = "entity.person_type.edit_form",
 * )
 */
final class Person extends ContentEntityBase implements PersonInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getEmail() {
    return $this->get('email')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setEmail($email) {
    $this->set('email', $email);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getFirstname() {
    return $this->get('firstname')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setFirstname($firstname) {
    $this->set('email', $firstname);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getLastname() {
    return $this->get('surname')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setLastname($surname) {
    $this->set('surname', $surname);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type): array {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The Person ID.'))
      ->setSettings([
        'min' => 1,
        'max' => 1000,
      ])
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'number_unformatted',
        'weight' => -6,
      ])
      ->setDisplayOptions('form', [
        'type' => 'number',
        'weight' => -6,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['email'] = BaseFieldDefinition::create('email')
      ->setLabel(t('Email'))
      ->setDescription(t('The Person\'s email address.'))
      ->setDefaultValue('')
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setRequired(TRUE)
      ->addConstraint('UserMailRequired')
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -5,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -5,
      ]);

    $fields['firstname'] = BaseFieldDefinition::create('string')
      ->setLabel(t('First Name'))
      ->setDescription(t('The first name of the Person.'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['surname'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Surname'))
      ->setDescription(t('The surname of the Person.'))
      ->setSettings([
        'max_length' => 255,
        'text_processing' => 0,
      ])
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'string',
        'weight' => -3
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -3,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Authored on'))
      ->setDescription(t('The time that the person was created.'))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'timestamp',
        'weight' => 20,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayOptions('form', [
        'type' => 'datetime_timestamp',
        'weight' => 20,
      ])
      ->setDisplayConfigurable('view', TRUE);

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the person was last edited.'));

    return $fields;
  }

}
