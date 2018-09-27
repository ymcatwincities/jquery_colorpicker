<?php

namespace Drupal\jquery_colorpicker\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Formatter class for jquery_colorpicker field.
 *
 * @FieldFormatter(
 *   id = "jquery_colorpicker_color_display",
 *   label = @Translation("Colored Block"),
 *
 *   field_types = {
 *      "hexidecimal_color"
 *   }
 * )
 */
class JQueryColorpickerColorDisplayFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {

    $summary = [];

    $summary['overview'] = $this->t('Displays the color in a colored block/square/div');

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#theme' => 'jquery_colorpicker_color_display',
        '#entity_delta' => $delta,
        '#item' => $item,
        '#color' => $item->value,
      ];
    }

    return $element;
  }

}
