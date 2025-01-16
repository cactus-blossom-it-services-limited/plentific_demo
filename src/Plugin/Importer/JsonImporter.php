<?php

namespace Drupal\plentific_demo\Plugin\Importer;

use Drupal\plentific_demo\Plugin\ImporterBase;

/**
 * Person importer from a JSON format.
 *
 * @Importer(
 *   id = "json",
 *   label = @Translation("JSON Importer")
 * )
 */
class JsonImporter extends ImporterBase {

  /**
   * {@inheritdoc}
   */
  public function import() {
    $data = $this->getData();
    if (!$data) {
      return FALSE;
    }

    if (!isset($data->persons)) {
      return FALSE;
    }

    $persons = $data->persons;
    foreach ($persons as $person) {
      $this->persistPerson($person);
    }
    return TRUE;
  }

  /**
   * Loads the person data from the remote URL.
   *
   * @return object
   *   The data from the remote URL.
   */
  private function getData() {
    /** @var \Drupal\plentific_demo\Entity\ImporterInterface $config */
    $config = $this->configuration['config'];
    $request = $this->httpClient->get($config->getUrl()->toString());
    $string = $request->getBody()->getContents();
    return json_decode($string);
  }

  /**
   * Saves a Person entity from the remote data.
   *
   * @param object $data
   *   The data to persist.
   */
  private function persistPerson($data) {
    /** @var \Drupal\plentific_demo\Entity\ImporterInterface $config */
    $config = $this->configuration['config'];

    $existing = $this->entityTypeManager->getStorage('person')->loadByProperties([
      'remote_id' => $data->id,
    ]);
    if (!$existing) {
      $values = [
        'remote_id' => $data->id,
        'type' => $config->getBundle(),
      ];
      /** @var \Drupal\plentific_demo\Entity\PersonInterface $person */
      $person = $this->entityTypeManager->getStorage('person')->create($values);
      $person->setRemoteId($data->id);
      $person->setEmail($data->email);
      $person->setFirstname($data->firstname);
      $person->setSurname($data->surname);
      $person->save();
      return;
    }

    if (!$config->updateExisting()) {
      return;
    }

    /** @var \Drupal\plentific_demo\Entity\PersonInterface $person */
    $person = reset($existing);
    $person->setRemoteId($data->id);
    $person->setEmail($data->email);
    $person->setFirstname($data->firstname);
    $person->setSurname($data->surname);
    $person->save();
  }

}