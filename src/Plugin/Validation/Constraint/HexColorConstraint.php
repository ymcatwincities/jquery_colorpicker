<?php

namespace Drupal\jquery_colorpicker\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that the submitted value is a valid granularity string.
 *
 * @Constraint(
 *   id = "hexidecimal_color",
 *   label = @Translation("Hexidecimal Color", context = "Validation"),
 *   type = "string"
 * )
 */
class HexColorConstraint extends Constraint {

  /**
   * The message shown when the value is not a valid granularity string.
   *
   * @var string
   */
  public $notValidHexidecimalColorString = '%value is not a valid hexidecimal color string';

}
