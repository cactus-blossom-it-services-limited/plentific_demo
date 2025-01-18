<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines importer annotation object.
 *
 * @Annotation
 */
final class Importer extends Plugin {

  /**
   * The plugin ID.
   *
   * @var int
   */
  public $id;

  /**
   * The human-readable name of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $title;

  /**
   * The description of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $description;

}
