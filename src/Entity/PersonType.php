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
 *   label_collection = @Translation("Person types"),
 *   label_singular = @Translation("person type"),
 *   label_plural = @Translation("persons types"),
 *   label_count = @PluralTranslation(
 *     singular = "@count persons type",
 *     plural = "@count persons types",
 *   ),
 *   handlers = {
 *     "form" = {
 *       "add" = "Drupal\plentific_demo\Form\PersonTypeForm",
 *       "edit" = "Drupal\plentific_demo\Form\PersonTypeForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *     "list_builder" = "Drupal\plentific_demo\PersonTypeListBuilder",
 *     "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\AdminHtmlRouteProvider",
 *     },
 *   },
 *   admin_permission = "administer person types",
 *   bundle_of = "person",
 *   config_prefix = "person_type",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   links = {
 *     "add-form" = "/admin/structure/person_types/add",
 *     "edit-form" = "/admin/structure/person_types/manage/{person_type}",
 *     "delete-form" = "/admin/structure/person_types/manage/{person_type}/delete",
 *     "collection" = "/admin/structure/person_types",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "uuid",
 *   },
 * )
 */
final class PersonType extends ConfigEntityBundleBase {

  /**
   * The machine name of this person type.
   */
  protected string $id;

  /**
   * The human-readable name of the person type.
   */
  protected string $label;

}
