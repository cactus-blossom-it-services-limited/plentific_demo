<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Plugin\Importer;

use Drupal\plentific_demo\ImporterPluginBase;

/**
 * Plugin implementation of the importer.
 *
 * @Importer(
 *   id = "json",
 *   label = @Translation("Foo"),
 *   description = @Translation("Foo description.")
 * )
 */
final class Foo extends ImporterPluginBase {

}
