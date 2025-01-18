<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a person entity type.
 */
interface PersonInterface extends ContentEntityInterface, EntityChangedInterface {

  /**
   * Gets the person name.
   *
   * @return int
   *   The ID.
   */
  public function getName();

  /**
   * Sets the person ID.
   *
   * @param int $name
   *   The ID.
   *
   * @return \Drupal\plentific_demo\Entity\PersonInterface
   *   The called person entity.
   */
  public function setName($name);

  /**
   * Gets the Person email address.
   *
   * @return string
   *   The email address.
   */
  public function getEmail();

  /**
   * Sets the Person email address.
   *
   * @param string $email
   *   The email address.
   *
   * @return \Drupal\plentific_demo\Entity\PersonInterface
   *   The called Person entity.
   */
  public function setEmail(string $email);

  /**
   * Gets the Person first name.
   *
   * @return string
   *   The first name.
   */
  public function getFirstName();

  /**
   * Sets the Person first name.
   *
   * @param string $firstname
   *   The email address.
   *
   * @return \Drupal\plentific_demo\Entity\PersonInterface
   *   The called Person entity.
   */
  public function setFirstname(string $firstname);

  /**
   * Gets the Person surname.
   *
   * @return string
   *   The surname.
   */
  public function getLastname();

  /**
   * Sets the Person surname.
   *
   * @param string $surname
   *   The surname.
   *
   * @return \Drupal\plentific_demo\Entity\PersonInterface
   *   The called Person entity.
   */
  public function setLastname(string $surname);

  /**
   * Gets the Person creation timestamp.
   *
   * @return int
   *   The created timestamp.
   */
  public function getCreatedTime();

  /**
   * Sets the Person creation timestamp.
   *
   * @param int $timestamp
   *   The created timestamp.
   *
   * @return \Drupal\plentific_demo\Entity\PersonInterface
   *   The called Person entity.
   */
  public function setCreatedTime($timestamp);

}
