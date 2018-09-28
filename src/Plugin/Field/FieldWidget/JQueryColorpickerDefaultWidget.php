<?php

namespace Drupal\jquery_colorpicker\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\WidgetInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * The default jQuery Colorpicker field widget.
 *
 * @FieldWidget(
 *   id = "jquery_colorpicker_widget",
 *   label = @Translation("jQuery Colorpicker"),
 *   field_types = {
 *      "hexidecimal_color"
 *   }
 * )
 */
class JQueryColorpickerDefaultWidget extends WidgetBase implements WidgetInterface {

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {

    $summary = [];

    $summary['overview'] = $this->t('A jQuery Colorpicker color widget.');

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $cardinality = $this->fieldDefinition->getFieldStorageDefinition()->getCardinality();
    $element['color'] = $element + [
      '#type' => 'jquery_colorpicker',
      '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : 'FFFFFF',
      '#description' => $element['#description'],
      '#cardinality' => $this->fieldDefinition->getFieldStorageDefinition()->getCardinality(),
    ];

    return $element;
  }

}
