<?php

/**
 * @file
 * Definition of Drupal\ctools\Tests\MathExpressionTest
 */

namespace Drupal\ctools\Tests;

use Drupal\ctools\MathExpression;
use Drupal\simpletest\UnitTestBase;

/**
 * Tests the MathExpression library of ctools.
 */
class MathExpressionTest extends UnitTestBase {
  public static function getInfo() {
    return array(
      'name' => 'CTools math expression tests',
      'description' => 'Test the math expression library of ctools.',
      'group' => 'Chaos Tools Suite',
    );
  }

  /**
   * Returns a random double between 0 and 1.
   */
  protected function rand01() {
    return rand(0, PHP_INT_MAX) / PHP_INT_MAX;
  }

  /**
   * A custom assertion with checks the values in a certain range.
   */
  protected function assertFloat($first, $second, $delta = 0.0000001, $message = '', $group = 'Other') {
    return $this->assert(abs($first - $second) <= $delta, $message ? $message : t('Value @first is equal to value @second.', array('@first' => var_export($first, TRUE), '@second' => var_export($second, TRUE))), $group);
  }

  public function testArithmetic() {
    $math_expression = new MathExpression();

    // Test constant expressions.
    $this->assertEqual($math_expression->e('2'), 2);
    $random_number = rand(0, 10);
    $this->assertEqual($random_number, $math_expression->e((string) $random_number));

    // Test simple arithmetic.
    $random_number_a = rand(5, 10);
    $random_number_b = rand(5, 10);
    $this->assertEqual($random_number_a + $random_number_b, $math_expression->e("$random_number_a + $random_number_b"));
    $this->assertEqual($random_number_a - $random_number_b, $math_expression->e("$random_number_a - $random_number_b"));
    $this->assertEqual($random_number_a * $random_number_b, $math_expression->e("$random_number_a * $random_number_b"));
    $this->assertEqual($random_number_a / $random_number_b, $math_expression->e("$random_number_a / $random_number_b"));

    // Test Associative property.
    $random_number_c = rand(5, 10);
    $this->assertEqual($math_expression->e("$random_number_a + ($random_number_b + $random_number_c)"), $math_expression->e("($random_number_a + $random_number_b) + $random_number_c"));
    $this->assertEqual($math_expression->e("$random_number_a * ($random_number_b * $random_number_c)"), $math_expression->e("($random_number_a * $random_number_b) * $random_number_c"));

    // Test Commutative property.
    $this->assertEqual($math_expression->e("$random_number_a + $random_number_b"), $math_expression->e("$random_number_b + $random_number_a"));
    $this->assertEqual($math_expression->e("$random_number_a * $random_number_b"), $math_expression->e("$random_number_b * $random_number_a"));

    // Test Distributive property.
    $this->assertEqual($math_expression->e("($random_number_a + $random_number_b) * $random_number_c"), $math_expression->e("($random_number_a * $random_number_c + $random_number_b * $random_number_c)"));

    $this->assertEqual(pow($random_number_a, $random_number_b), $math_expression->e("$random_number_a ^ $random_number_b"));
  }

  public function testBuildInFunctions() {
    $math_expression = new MathExpression();

    // @todo: maybe run this code multiple times to test different values.
    $random_double = $this->rand01();
    $random_int = rand(5, 10);
    $this->assertFloat(sin($random_double), $math_expression->e("sin($random_double)"));
    $this->assertFloat(cos($random_double), $math_expression->e("cos($random_double)"));
    $this->assertFloat(tan($random_double), $math_expression->e("tan($random_double)"));
    $this->assertFloat(exp($random_double), $math_expression->e("exp($random_double)"));
    $this->assertFloat(sqrt($random_double), $math_expression->e("sqrt($random_double)"));
    $this->assertFloat(log($random_double), $math_expression->e("ln($random_double)"));
    $this->assertFloat(round($random_double), $math_expression->e("round($random_double)"));
    $this->assertFloat(abs($random_double + $random_int), $math_expression->e('abs(' . ($random_double + $random_int) . ')'));
    $this->assertEqual(round($random_double + $random_int), $math_expression->e('round(' . ($random_double + $random_int) . ')'));
    $this->assertEqual(ceil($random_double + $random_int), $math_expression->e('ceil(' . ($random_double + $random_int) . ')'));
    $this->assertEqual(floor($random_double + $random_int), $math_expression->e('floor(' . ($random_double + $random_int) . ')'));

    // @fixme: you can't run time without an argument.
    $this->assertFloat(time(), $math_expression->e('time(1)'));

    $random_double_a = $this->rand01();
    $random_double_b = $this->rand01();
    // @fixme: max/min don't work at the moment.
//    $this->assertFloat(max($random_double_a, $random_double_b), $math_expression->e("max($random_double_a, $random_double_b)"));
//    $this->assertFloat(min($random_double_a, $random_double_b), $math_expression->e("min($random_double_a, $random_double_b)"));
  }

  public function testVariables() {
    $math_expression = new MathExpression();

    $random_number_a = rand(5, 10);
    $random_number_b = rand(5, 10);

    // Store the first random number and use it on calculations.
    $math_expression->e("var = $random_number_a");
    $this->assertEqual($random_number_a + $random_number_b, $math_expression->e("var + $random_number_b"));
    $this->assertEqual($random_number_a * $random_number_b, $math_expression->e("var * $random_number_b"));
    $this->assertEqual($random_number_a - $random_number_b, $math_expression->e("var - $random_number_b"));
    $this->assertEqual($random_number_a / $random_number_b, $math_expression->e("var / $random_number_b"));
  }

  public function testCustomFunctions() {
    $math_expression = new MathExpression();

    $random_number_a = rand(5, 10);
    $random_number_b = rand(5, 10);

    // Create a one-argument function.
    $math_expression->e("f(x) = 2 * x");
    $this->assertEqual($random_number_a * 2, $math_expression->e("f($random_number_a)"));
    $this->assertEqual($random_number_b * 2, $math_expression->e("f($random_number_b)"));

    // Create a two-argument function.
    $math_expression->e("g(x, y) = 2 * x + y");
    $this->assertEqual($random_number_a * 2 + $random_number_b, $math_expression->e("g($random_number_a, $random_number_b)"));

    // Use a custom function in another function.
    $this->assertEqual(($random_number_a * 2 + $random_number_b) * 2, $math_expression->e("f(g($random_number_a, $random_number_b))"));
  }
}