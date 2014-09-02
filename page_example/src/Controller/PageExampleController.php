<?php
/**
 * @file
 * Contains \Drupal\page_example\Controller\PageExampleController.
 */
namespace Drupal\page_example\Controller;

/**
 * Controller routines for page example routes.
 */
class PageExampleController {
  /**
   * Constructs a page with descriptive content.
   *
   * Our router maps this method to the path 'examples/page_example'.
   */
  public function description() {
    $build = array(
      '#markup' => t('<p>The Page example module provides two pages, "simple" and "arguments".</p><p>The <a href="@simple_link">simple page</a> just returns a renderable array for display.</p><p>The <a href="@arguments_link">arguments page</a> takes two arguments and displays them, as in @arguments_link</p>',
        array(
          '@simple_link' => url('examples/page_example/simple', array('absolute' => TRUE)),
          '@arguments_link' => url('examples/page_example/arguments/23/56', array('absolute' => TRUE)),
        )
      ),
    );
    return $build;
  }
 
  /**
   * Constructs a simple page.
   *
   * The router _content callback, maps the path 'examples/page_example/simple'
   * to this method.
   *
   * _content callbacks return a renderable array for the content area of the
   * page. The theme system will later render and surround the content with the
   * appropriate blocks, navigation, and styling.
   */
  public function simple() {
    return array(
      '#markup' => '<p>' . t('Simple page: The quick brown fox jumps over the lazy dog.') . '</p>',
    );
  }
}