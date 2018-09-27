<?php

namespace Drupal\jquery_colorpicker\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\WidgetInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\jquery_colorpicker\Service\JQueryColorpickerServiceInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

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
class JQueryColorpickerDefaultWidget extends WidgetBase implements WidgetInterface, ContainerFactoryPluginInterface {

  /**
   * The JQuery Colorpicker service.
   *
   * @var \Drupal\jquery_colorpicker\Service\JQueryColorpickerServiceInterface
   */
  protected $JQueryColorpickerService;

  /**
   * Constructs a JQueryColorpickerDefaultWidget object.
   *
   * @param string $plugin_id
   *   The plugin ID.
   * @param mixed $plugin_definition
   *   The plugin definition.
   * @param Drupal\Core\Field\FieldDefinitionInterface $field_definition
   *   The field definition.
   * @param array $settings
   *   The field settings.
   * @param array $third_party_settings
   *   Third party field settings.
   * @param Drupal\jquery_colorpicker\Service\JQueryColorpickerServiceInterface $jQueryColorpickerService
   *   The jQuery Colorpicker service.
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, array $third_party_settings, JQueryColorpickerServiceInterface $jQueryColorpickerService) {

    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $third_party_settings);

    $this->JQueryColorpickerService = $jQueryColorpickerService;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['third_party_settings'],
      $container->get('jquery_colorpicker.service')
    );
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
