<?php

namespace Drupal\visita_ubec_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Visita ubec module routes.
 */
class PageController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {
    $additionalVariable = 'Some additional data';

    $build = [
      '#theme' => 'visita_top_page',
      '#additional_variable' => $additionalVariable,
    ];

    return $build;
  }

}
