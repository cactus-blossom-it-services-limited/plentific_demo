<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\plentific_demo\ImporterInterface;

/**
 * Defines the importer entity type.
 *
 * @ConfigEntityType(
 *   id = "importer",
 *   label = @Translation("Importer"),
 *   label_collection = @Translation("Importers"),
 *   label_singular = @Translation("importer"),
 *   label_plural = @Translation("importers"),
 *   label_count = @PluralTranslation(
 *     singular = "@count importer",
 *     plural = "@count importers",
 *   ),
 *   handlers = {
 *     "list_builder" = "Drupal\plentific_demo\ImporterListBuilder",
 *     "form" = {
 *       "add" = "Drupal\plentific_demo\Form\ImporterForm",
 *       "edit" = "Drupal\plentific_demo\Form\ImporterForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm",
 *     },
 *   },
 *   config_prefix = "importer",
 *   admin_permission = "administer importer",
 *   links = {
 *     "collection" = "/admin/structure/importer",
 *     "add-form" = "/admin/structure/importer/add",
 *     "edit-form" = "/admin/structure/importer/{importer}",
 *     "delete-form" = "/admin/structure/importer/{importer}/delete",
 *   },
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label",
 *     "uuid" = "uuid",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "description",
 *   },
 * )
 */
final class Importer extends ConfigEntityBase implements ImporterInterface {

  /**
   * The example ID.
   */
  protected string $id;

  /**
   * The example label.
   */
  protected string $label;

  /**
   * The example description.
   */
  protected string $description;

}
