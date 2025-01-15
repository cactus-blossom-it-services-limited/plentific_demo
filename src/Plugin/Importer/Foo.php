<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Plugin\Importer;

use Drupal\plentific_demo\Annotation\Importer;
use Drupal\plentific_demo\Plugin\ImporterBase;

/**
 * Plugin implementation of the importer.
 *
 * @Importer(
 *   id = "json",
 *   label = @Translation("Foo"),
 *   description = @Translation("Foo description.")
 * )
 */
final class Foo extends ImporterBase {

  public function import(): bool {
    // TODO: Implement import() method
  }

}
