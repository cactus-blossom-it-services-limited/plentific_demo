<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBundleBase;

/**
 * Defines the Person type configuration entity.
 *
 * @ConfigEntityType(
 *   id = "person_type",
 *   label = @Translation("Person type"),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\plentific_demo\Form\PersonTypeForm",
 *       "edit" = "Drupal\plentific_demo\Form\PersonTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "person_type",
 *   admin_permission = "administer site configuration",
 *   bundle_of = "person",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid"
 *   },
 *   links = {
 *     "canonical" = "/admin/structure/person_type/{person_type}",
 *     "add-form" = "/admin/structure/person_type/add",
 *     "edit-form" = "/admin/structure/person_type/{person_type}/edit",
 *     "delete-form" = "/admin/structure/person_type/{person_type}/delete",
 *     "collection" = "/admin/structure/person_type"
 *   },
 *   config_export = {
 *     "id",
 *     "label"
 *   },
 * )
 */
final class PersonType extends ConfigEntityBundleBase {

  /**
   * The machine name of this person type.
   */
  protected string $id;

}
