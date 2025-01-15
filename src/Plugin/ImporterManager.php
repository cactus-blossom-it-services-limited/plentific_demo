<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Plugin;

use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\plentific_demo\Entity\ImporterInterface;
use Drupal\core\Entity\EntityTypeManagerInterface;

/**
 * Importer plugin manager.
 */
class ImporterManager extends DefaultPluginManager {

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * ImporterManager constructor.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity type manager.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler, EntityTypeManagerInterface $entityTypeManager) {
    parent::__construct('Plugin/Importer', $namespaces, $module_handler, 'Drupal\plentific_demo\Plugin\ImporterPluginInterface', 'Drupal\plentific_demo\Annotation\Importer');

    $this->alterInfo('importer_info');
    $this->setCacheBackend($cache_backend, 'importer_plugins');
    $this->entityTypeManager = $entityTypeManager;
  }

  /**
   * Creates a new instance from a given config.
   *
   * @param string $id
   *   The ID of the config.
   *
   * @return object|null
   *   The plugin instance.
   */
  public function createInstanceFromConfig($id) {
    $config = $this->entityTypeManager->getStorage('importer')->load($id);
    if (!$config instanceof ImporterInterface) {
      return NULL;
    }

    return $this->createInstance($config->getPluginId(), ['config' => $config]);
  }

  /**
   * Creates instances from all the available configs.
   *
   * @return \Drupal\plentific_demo\Plugin\ImporterPluginInterface[]
   *   The plugin instances.
   */
  public function createInstanceFromAllConfigs() {
    $configs = $this->entityTypeManager->getStorage('importer')->loadMultiple();
    if (!$configs) {
      return [];
    }
    $plugins = [];
    foreach ($configs as $config) {
      $plugin = $this->createInstanceFromConfig($config->id());
      if (!$plugin) {
        continue;
      }

      $plugins[] = $plugin;
    }

    return $plugins;
  }
}
