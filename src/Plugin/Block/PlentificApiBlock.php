<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Logger\LoggerChannelFactoryInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a plentific api block.
 *
 * @Block(
 *   id = "plentific_demo_plentific_api",
 *   admin_label = @Translation("Plentific API"),
 *   category = @Translation("Custom"),
 * )
 */
final class PlentificApiBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Constructs the plugin instance.
   */
  public function __construct(
    array $configuration,
    $plugin_id,
    $plugin_definition,
    private readonly LoggerChannelFactoryInterface $loggerFactory,
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition): self {
    return new self(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('logger.factory'),
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration(): array {
    return [
      'number_of_items_per_page' => 6,
      'email_field_label' => $this->t('Email Address'),
      'forename_field_label' => $this->t('Forename'),
      'surname_field_label' => $this->t('Surname'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state): array {
    $form['number_of_items_per_page'] = [
      '#type' => 'text',
      '#title' => $this->t('No. of Items per page'),
      '#default_value' => $this->configuration['number_of_items_per_page'],
    ];
    $form['email_field_label'] = [
      '#type' => 'text',
      '#title' => $this->t('Email field label'),
      '#default_value' => $this->configuration['email_field_label'],
    ];
    $form['forename_field_label'] = [
      '#type' => 'text',
      '#title' => $this->t('Forename field label'),
      '#default_value' => $this->configuration['forename_field_label'],
    ];
    $form['surname_field_label'] = [
      '#type' => 'text',
      '#title' => $this->t('Surname field label'),
      '#default_value' => $this->configuration['surname_field_label'],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state): void {
    $this->configuration['example'] = $form_state->getValue('example');
  }

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $build['content'] = [
      '#markup' => $this->t('It works!'),
    ];
    return $build;
  }

}
