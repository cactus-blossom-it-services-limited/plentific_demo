<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Url;

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
 *   admin_permission = "administer site configuration",
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
 *     "url",
 *     "plugin",
 *     "update_existing",
 *     "source"
 *   },
 * )
 */
final class Importer extends ConfigEntityBase implements ImporterInterface {

  /**
   * The Importer ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The Importer label.
   *
   * @var string
   */
  protected $label;

  /**
   * The URL from where the import file can be retrieved.
   *
   * @var string
   */
  protected $url;

  /**
   * The plugin ID of the plugin to be used for processing this import.
   *
   * @var string
   */
  protected $plugin;

  /**
   * Whether to update existing products if they have already been imported.
   *
   * @var bool
   */
  protected $update_existing = TRUE;

  /**
   * The source of the products.
   *
   * @var string
   */
  protected $source;

  /**
   * The product bundle.
   *
   * @var string
   */
  protected $bundle;

  /**
   * {@inheritdoc}
   */
  public function getUrl() {
    return $this->url ? Url::fromUri($this->url) : NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getPluginId() {
    return $this->plugin;
  }

  /**
   * {@inheritdoc}
   */
  public function updateExisting() {
    return $this->update_existing;
  }

  /**
   * {@inheritdoc}
   */
  public function getSource() {
    return $this->source;
  }


}
