<?php

namespace Drupal\plentific_demo\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Messenger\MessengerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form handler for creating/editing PersonType entities.
 */
class PersonTypeForm extends EntityForm {

  /**
   * PersonTypeForm constructor.
   *
   * @param \Drupal\Core\Messenger\MessengerInterface $messenger
   *   The messenger.
   */
  public function __construct(MessengerInterface $messenger) {
    $this->messenger = $messenger;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('messenger')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    /** @var \Drupal\plentific_demo\Entity\PersonTypeInterface $person_type */
    $person_type = $this->entity;
    $form['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#maxlength' => 255,
      '#default_value' => $person_type->label(),
      '#description' => $this->t('Label for the Person type.'),
      '#required' => TRUE,
    ];

    $form['id'] = [
      '#type' => 'machine_name',
      '#default_value' => $person_type->id(),
      '#machine_name' => [
        'exists' => '\Drupal\plentific_demo\Entity\PersonType::load',
      ],
      '#disabled' => !$person_type->isNew(),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state): int {
    $person_type = $this->entity;
    $status = $person_type->save();

    switch ($status) {
      case SAVED_NEW:
        $this->messenger->addMessage($this->t('Created the %label person type.', [
          '%label' => $person_type->label(),
        ]));
        break;

      default:
        $this->messenger->addMessage($this->t('Saved the %label person type.', [
          '%label' => $person_type->label(),
        ]));
    }
    $form_state->setRedirect('entity.person.collection');
    return 1;
  }

}
