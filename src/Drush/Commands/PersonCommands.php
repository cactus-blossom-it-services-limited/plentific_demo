<?php

namespace Drupal\plentific_demo\Commands;

use Drupal\plentific_demo\Plugin\ImporterPluginInterface;
use Drush\Commands\DrushCommands;
use Symfony\Component\Console\Input\InputOption;
use Drupal\plentific_demo\Plugin\ImporterManager;

/**
 * Drush commands for persons.
 */
class PersonCommands extends DrushCommands {

  /**
   * The importer manager.
   *
   * @var \Drupal\plentific_demo\Plugin\ImporterManager
   */
  protected $importerManager;

  /**
   * ProductCommands constructor.
   *
   * @param \Drupal\plentific_demo\Plugin\ImporterManager $importerManager
   *   The importer manager.
   */
  public function __construct(ImporterManager $importerManager) {
    $this->importerManager = $importerManager;
  }

  /**
   * Imports the Persons.
   *
   * @param array $options
   *   The command options.
   *
   * @option importer
   *   The importer config ID to use.
   *
   * @command persons-import-run
   * @aliases pir
   */
  public function import(array $options = ['importer' => InputOption::VALUE_OPTIONAL]) {
    $importer = $options['importer'];

    if (!is_null($importer)) {
      $plugin = $this->importerManager->createInstanceFromConfig($importer);
      if (is_null($plugin)) {
        $this->logger()->error(t('The specified importer does not exist.'));
        return;
      }

      $this->runPluginImport($plugin);
      return;
    }

    $plugins = $this->importerManager->createInstanceFromAllConfigs();
    if (!$plugins) {
      $this->logger()->error(t('There are no importers to run.'));
      return;
    }

    foreach ($plugins as $plugin) {
      $this->runPluginImport($plugin);
    }

  }

  /**
   * Runs the import function of a given plugin.
   *
   * @param \Drupal\plentific_demo\Plugin\ImporterPluginInterface $plugin
   *   The importer plugin.
   */
  protected function runPluginImport(ImporterPluginInterface $plugin) {
    $result = $plugin->import();
    $message_values = ['@importer' => $plugin->getConfig()->label()];
    if ($result) {
      $this->logger()->notice(t('The "@importer" importer has been run.', $message_values));
      return;
    }

    $this->logger()->error(t('There was a problem running the "@importer" importer.', $message_values));
  }

}
