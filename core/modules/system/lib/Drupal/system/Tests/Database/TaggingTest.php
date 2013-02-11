<?php

/**
 * @file
 * Definition of Drupal\system\Tests\Database\TaggingTest.
 */

namespace Drupal\system\Tests\Database;

/**
 * Tests SELECT query tagging.
 *
 * Tags are a way to flag queries for alter hooks so they know
 * what type of query it is, such as "node_access".
 */
class TaggingTest extends DatabaseTestBase {

  public static function getInfo() {
    return array(
      'name' => 'Query tagging tests',
      'description' => 'Test the tagging capabilities of the Select builder.',
      'group' => 'Database',
    );
  }

  /**
   * Confirms that a query has a tag added to it.
   */
  function testHasTag() {
    $query = db_select('test');
    $query->addField('test', 'name');
    $query->addField('test', 'age', 'age');

    $query->addTag('test');

    $this->assertTrue($query->hasTag('test'), 'hasTag() returned true.');
    $this->assertFalse($query->hasTag('other'), 'hasTag() returned false.');
  }

  /**
   * Tests query tagging "has all of these tags" functionality.
   */
  function testHasAllTags() {
    $query = db_select('test');
    $query->addField('test', 'name');
    $query->addField('test', 'age', 'age');

    $query->addTag('test');
    $query->addTag('other');

    $this->assertTrue($query->hasAllTags('test', 'other'), 'hasAllTags() returned true.');
    $this->assertFalse($query->hasAllTags('test', 'stuff'), 'hasAllTags() returned false.');
  }

  /**
   * Tests query tagging "has at least one of these tags" functionality.
   */
  function testHasAnyTag() {
    $query = db_select('test');
    $query->addField('test', 'name');
    $query->addField('test', 'age', 'age');

    $query->addTag('test');

    $this->assertTrue($query->hasAnyTag('test', 'other'), 'hasAnyTag() returned true.');
    $this->assertFalse($query->hasAnyTag('other', 'stuff'), 'hasAnyTag() returned false.');
  }

  /**
   * Tests that we can attach metadata to a query object.
   *
   * This is how we pass additional context to alter hooks.
   */
  function testMetaData() {
    $query = db_select('test');
    $query->addField('test', 'name');
    $query->addField('test', 'age', 'age');

    $data = array(
      'a' => 'A',
      'b' => 'B',
    );

    $query->addMetaData('test', $data);

    $return = $query->getMetaData('test');
    $this->assertEqual($data, $return, 'Corect metadata returned.');

    $return = $query->getMetaData('nothere');
    $this->assertNull($return, 'Non-existent key returned NULL.');
  }
}
