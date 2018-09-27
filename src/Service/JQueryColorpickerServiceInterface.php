<?php

namespace Drupal\jquery_colorpicker\Service;

/**
 * Interface for jQuery Colorpicker service.
 */
interface JQueryColorpickerServiceInterface {

  /**
   * Validates a hecidecimal color string.
   *
   * The following rules are validated:
   *   - Length is six characters
   *   - Value is hexidecimal.
   *
   * @param string $color
   *   The color string to be validated.
   *
   * @return bool|\Drupal\Core\StringTranslation\TranslatableMarkup
   *   FALSE if there are no errors, or a TranslateabeMarkup object
   *   containing the error message if there are any errors.
   */
  public function validateHexColor($color);

}
