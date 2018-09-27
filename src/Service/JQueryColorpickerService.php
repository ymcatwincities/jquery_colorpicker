<?php

namespace Drupal\jquery_colorpicker\Service;

use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\jquery_colorpicker\Plugin\DataType\HexColorInterface;

/**
 * The jQuery Colorpicker service.
 */
class JQueryColorpickerService implements JQueryColorpickerServiceInterface {

  use StringTranslationTrait;

  /**
   * {@inheritdoc}
   */
  public function formatColor($color) {

    if (is_scalar($color)) {
      $color = (string) $color;
      if (strlen($color)) {
        if (!preg_match('/^#/', $color)) {
          $color = '#' . $color;
        }
      }
    }
    else {
      $color = '';
    }

    return $color;
  }

  /**
   * {@inheritdoc}
   */
  public function validateHexColor($color) {
    return preg_match(HexColorInterface::HEXIDECIMAL_COLOR_REGEX, $color);
  }

}
