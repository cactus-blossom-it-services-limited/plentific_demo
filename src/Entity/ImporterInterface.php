<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

/**
 * Importer configuration entity.
 */
interface ImporterInterface extends ConfigEntityInterface {

  /**
   * Returns the Url where the import can get the data from.
   *
   * @return \Drupal\Core\Url
   */
  public function getUrl();

  /**
   * Returns the Importer plugin ID to be used by this importer.
   *
   * @return string
   */
  public function getPluginId();

  /**
   * Whether or not to update existing persons if they have already been imported.
   *
   * @return bool
   */
  public function updateExisting();

}
