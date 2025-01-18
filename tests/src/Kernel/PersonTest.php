<?php

namespace Drupal\Tests\plentific_demo\Kernel;

use Drupal\plentific_demo\Entity\Person;
use Drupal\KernelTests\KernelTestBase;

/**
 * Test basic CRUD operations for the Person entity type.
 *
 * @group plentific_demo
 *
 * @ingroup plentific_demo
 */
class PersonTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['plentific_demo'];

  /**
   * Basic CRUD operations on a Person entity.
   */
  public function testEntity() {
    $this->installEntitySchema('person');
    $entity = Person::create([
      'name' => 1,
      'email' => 'test@example.com',
      'firstname' => 'Paul',
      'surname' => 'Espresso',
      'status' => TRUE,
      'type' => 'person',
      'bundle' => 'person'
    ]);
    $this->assertNotNull($entity);
    $this->assertEquals(SAVED_NEW, $entity->save());
    $entity_id = $entity->id();
    $this->assertNotEmpty($entity_id);
    $entity->delete();
    $this->assertNull(Person::load($entity_id));
  }

}
