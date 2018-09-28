<?php

namespace Drupal\jquery_colorpicker\Service;

use Drupal\hexidecimal_color\Plugin\DataType\HexColorInterface;

/**
 * The jQuery Colorpicker service.
 */
class JQueryColorpickerService implements JQueryColorpickerServiceInterface {

  /**
   * {@inheritdoc}
   */
  public function validateHexColor($color) {
    if (is_string($color)) {
      return preg_match(HexColorInterface::HEXIDECIMAL_COLOR_REGEX, $color);
    }

    return FALSE;
  }

}
