<?php

namespace Drupal\jquery_colorpicker\Plugin\DataType;

use Drupal\Core\TypedData\Plugin\DataType\StringData;

/**
 * Provides the Hexidecimal Color typed data type.
 *
 * This data type is a wrapper for hexidecimal color strings.
 *
 * @DataType(
 *   id = "hexidecimal_color",
 *   label = @Translation("Hexidecimal Color"),
 * )
 */
class HexColorData extends StringData implements HexColorInterface {

  /**
   * {@inheritdoc}
   */
  public function setValue($value, $notify = TRUE) {
    $value = strtoupper($value);

    parent::setValue($value, $notify);
  }

  /**
   * {@inheritdoc}
   */
  public function getConstraints() {
    $constraint_manager = \Drupal::typedDataManager()->getValidationConstraintManager();
    $constraints = parent::getConstraints();
    // Add a constraint to ensure that submitted data is valid for a PHP
    // DateInterval object.
    $constraints[] = $constraint_manager->create('hexidecimal_color', []);

    return $constraints;
  }

}
