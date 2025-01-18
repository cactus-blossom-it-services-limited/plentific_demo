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
   *   Returns the Url.
   */
  public function getUrl();

  /**
   * Returns the Importer plugin ID to be used by this importer.
   *
   * @return string
   *   Returns the plugin ID.
   */
  public function getPluginId();

  /**
   * Whether to update existing persons if they have already been imported.
   *
   * @return bool
   *   Returns TRUE if the existing persons are to be updated, else FALSE.
   */
  public function updateExisting();

}
