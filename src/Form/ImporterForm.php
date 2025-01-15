<?php

declare(strict_types=1);

namespace Drupal\plentific_demo\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\plentific_demo\Entity\Importer;
use Drupal\Core\Messenger\MessengerInterface;
use Drupal\Core\Url;
use Drupal\plentific_demo\Plugin\ImporterManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form for creating/editing Importer entities.
 */
final class ImporterForm extends EntityForm {
  /**
   * @var ImporterManager
   */
  protected $importerManager;

  /**
   * ImporterForm constructor.
   *
   * @param ImporterManager $importerManager
   * @param MessengerInterface $messenger
   */
  public function __construct(ImporterManager
                              $importerManager, MessengerInterface $messenger) {
    $this->importerManager = $importerManager;
    $this->messenger = $messenger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface
                                $container) {
    return new static(
      $container->get('plugin.manager.importer'),
      $container->get('messenger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state): array {

    $form = parent::form($form, $form_state);

    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $this->entity->label(),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $this->entity->id(),
      '#machine_name' => [
        'exists' => [Importer::class, 'load'],
      ],
      '#disabled' => !$this->entity->isNew(),
    ];

    $form['status'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enabled'),
      '#default_value' => $this->entity->status(),
    ];

    $form['description'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#default_value' => $this->entity->get('description'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state): int {
    $result = parent::save($form, $form_state);
    $message_args = ['%label' => $this->entity->label()];
    $this->messenger()->addStatus(
      match($result) {
        \SAVED_NEW => $this->t('Created new example %label.', $message_args),
        \SAVED_UPDATED => $this->t('Updated example %label.', $message_args),
      }
    );
    $form_state->setRedirectUrl($this->entity->toUrl('collection'));
    return $result;
  }

}
