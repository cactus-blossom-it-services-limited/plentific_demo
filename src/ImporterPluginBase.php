<?php

declare(strict_types=1);

namespace Drupal\plentific_demo;

use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\Component\Plugin\PluginBase;
use Drupal\Core\Entity\EntityTypeManager;
use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\plentific_demo\Entity\ImporterInterface;



/**
 * Base class for importer plugins.
 */
abstract class ImporterPluginBase extends PluginBase implements ImporterInterface {
  /**
   * @var \Drupal\Core\Entity\EntityTypeManager
   */
  protected $entityTypeManager;
  /**
   * @var \GuzzleHttp\Client
   */
  protected $httpClient;

  /**
   * {@inheritdoc}
   * @throws PluginException
   */
  public function __construct(array $configuration,
                                    $plugin_id, $plugin_definition, EntityTypeManager
                                    $entityTypeManager, Client $httpClient) {
    parent::__construct($configuration, $plugin_id,
      $plugin_definition);
    $this->entityTypeManager = $entityTypeManager;
    $this->httpClient = $httpClient;
    if (!isset($configuration['config'])) {
      throw new PluginException('Missing Importer
        configuration.');
    }
    if (!$configuration['config'] instanceof
      ImporterInterface) {
      throw new PluginException('Wrong Importer
        configuration.');
    }
  }

  /**
   * {@inheritdoc}
   * @throws PluginException
   */
  public static function create(ContainerInterface
                                $container, array $configuration, $plugin_id,
                                $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('http_client')
    );
  }


  /**
   * {@inheritdoc}
   */
  public function label(): string {
    // Cast the label to a string since it is a TranslatableMarkup object.
    return (string) $this->pluginDefinition['label'];
  }

}
