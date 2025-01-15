<?php

declare(strict_types=1);

namespace Drupal\plentific_demo;

use Drupal\Component\Plugin\PluginBase;

/**
 * Base class for importer plugins.
 */
abstract class ImporterPluginBase extends PluginBase implements ImporterInterface {

  /**
   * {@inheritdoc}
   */
  public function label(): string {
    // Cast the label to a string since it is a TranslatableMarkup object.
    return (string) $this->pluginDefinition['label'];
  }

}
