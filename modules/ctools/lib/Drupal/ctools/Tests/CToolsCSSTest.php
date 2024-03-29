<?php

/**
 * @file
 * Definition of Drupal\ctools\Tests\CToolsCSSTest.
 */

namespace Drupal\ctools\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Test menu links depending on user permissions.
 */
class CToolsCSSTest extends WebTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = array('ctools');

  public static function getInfo() {
    return array(
      'name' => 'CSS Tools tests',
      'description' => '...',
      'group' => 'Chaos Tools Suite',
    );
  }

  /**
   * Test that cached plugins are loaded correctly.
   */
  function testCssStuff() {
    $css = "#some-id .some-class {\n  color: black;\n  illegal-key: foo;\n}";
    $filtered_css = '#some-id .some-class{color:black;}';

    ctools_include('css');
    $filename1 = ctools_css_store('unfiltered-css-test', $css, FALSE);
    $filename2 = ctools_css_store('filtered-css-test', $css, TRUE);

    $this->assertEqual($filename1, ctools_css_retrieve('unfiltered-css-test'), 'Unfiltered css file successfully fetched');
    $file_contents = file_get_contents($filename1);
    $this->assertEqual($css, $file_contents, 'Unfiltered css file contents are correct');
//    $match = $filename1 == ctools_css_retrieve('unfiltered-css-test') ? 'Match' : 'No match';
//    $output .= '<pre>Unfiltered: ' . $filename1 . ' ' . $match . '</pre>';
//    $output .= '<pre>' . file_get_contents($filename1) . '</pre>';

    $this->assertEqual($filename2, ctools_css_retrieve('filtered-css-test'), 'Filtered css file succcesfully fetched');
    $file_contents = file_get_contents($filename2);
    $this->assertEqual($filtered_css, $file_contents, 'Filtered css file contents are correct');
    //    $match = $filename2 == ctools_css_retrieve('filtered-css-test') ? 'Match' : 'No match';
//    $output .= '<pre>Filtered: ' . $filename2 . ' ' . $match . '</pre>';
//    $output .= '<pre>' . file_get_contents($filename2) . '</pre>';
//
//    drupal_add_css($filename2, array('type' => 'file'));
//    return array('#markup' => $output);


    // Test that in case that url can be used, the value surives when a colon is in it.
    $css = "#some-id {\n  background-image: url(http://example.com/example.gif);\n}";
    $css_data = ctools_css_disassemble($css);
    $empty_array = array();
    $disallowed_values_regex = '/(expression)/';
    $filtered = ctools_css_assemble(ctools_css_filter_css_data($css_data, $empty_array, $empty_array, '', $disallowed_values_regex));
    $url = (strpos($filtered, 'http://example.com/example.gif') !== FALSE);
    $this->assertTrue($url, 'CSS with multiple colons can survive.');

    // Test that in case the CSS has two properties defined are merged.
    $css = "#some-id {\n  font-size: 12px;\n}\n#some-id {\n  color: blue;\n}";
    $filtered = ctools_css_filter($css);
    $font_size = (strpos($filtered, 'font-size:12px;') !== FALSE);
    $color = (strpos($filtered, 'color:blue') !== FALSE);
    $this->assertTrue($font_size && $color, 'Multiple properties are merged.');
  }
}
