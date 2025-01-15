<?php

declare(strict_types=1);

namespace Drupal\plentific_demo;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;

/**
 * Provides an interface defining a person entity type.
 */
interface PersonInterface extends ContentEntityInterface, EntityChangedInterface {

}
