<?php

/**
 * @file
 * Definition of Drupal\ctools\Tests\MathExpressionStackTest
 */

namespace Drupal\ctools\Tests;

use Drupal\ctools\MathExpressionStack;
use Drupal\simpletest\UnitTestBase;

/**
 * Tests the simple MathExpressionStack class.
 */
class MathExpressionStackTest extends UnitTestBase {
  public static function getInfo() {
    return array(
      'name' => 'CTools math expression stack tests',
      'description' => 'Test the stack class of the math expression library.',
      'group' => 'Chaos Tools Suite',
    );
  }

  public function testStack() {
    $stack = new MathExpressionStack();

    // Test the empty stack.
    $this->assertNull($stack->last());
    $this->assertNull($stack->pop());

    // Add an element and see whether it's the right element.
    $value = $this->randomName();
    $stack->push($value);
    $this->assertIdentical($value, $stack->last());
    $this->assertIdentical($value, $stack->pop());
    $this->assertNull($stack->pop());

    // Add multiple elements and see whether they are returned in the right order.
    $values = array($this->randomName(), $this->randomName(), $this->randomName());
    foreach ($values as $value) {
      $stack->push($value);
    }

    // Test the different elements at different positions with the last() method.
    $count = count($values);
    foreach ($values as $key => $value) {
      $this->assertEqual($value, $stack->last($count - $key));
    }

    // Pass in a non-valid number to last.
    $non_valid_number = rand(10, 20);
    $this->assertNull($stack->last($non_valid_number));

    // Test the order of the poping.
    $values = array_reverse($values);
    foreach ($values as $key => $value) {
      $this->assertEqual($stack->last(), $value);
      $this->assertEqual($stack->pop(), $value);
    }
    $this->assertNull($stack->pop());

  }
}