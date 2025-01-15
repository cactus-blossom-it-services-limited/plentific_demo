<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Provides an Unique Integer constraint.
 *
 * @Constraint(
 *   id = "UniqueInteger",
 *   label = @Translation("Unique Integer", context = "Validation"),
 * )
 *
 * @see https://www.drupal.org/node/2015723.
 */
final class UniqueIntegerConstraint extends Constraint {

  public string $message = '@todo Specify error message here.';

}
