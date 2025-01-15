<?php

declare(strict_types=1);

namespace Drupal\plentific_demo;

/**
 * Interface for importer plugins.
 */
interface ImporterInterface {

  /**
   * Returns the translated plugin label.
   */
  public function label(): string;

}
