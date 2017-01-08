The Drupal 8 branch of Jquery Colorpicker offers a form element than can be
included in any form in this way:

<?php
$form['element'] = [
	'#type' => 'jquery_colorpicker',
	'#title' => t('Color'),
	'#default_value' => 'FFFFFF',
];
?>

This module includes Field API integration. A colorpicker field can be added to
any content type with the JQuery Colorpicker widget

==================
Installation guide
==================

Automatic installation:

 1.- In a terminal, navigate to the root of the module
 2.- Run `composer update`
 3.- Install the module as you would any Drupal module

Manual installation:
 1.- Navigate to the module folder
 2.- Create the following folder [MOUDULEROOT]/vendor/jaypan/jquery_colorpicker
 3.- Navigate to the folder you just created
 4.- Go to www.eyecon.ro/colorpicker/ and download colorpicker.zip.
 5.- Extract the the zip file content to the
      [MOUDULEROOT]/vendor/jaypan/jquery_colorpicker folder.
 6.- If you have extracted the contents correctly, the following file should
      exist: [MOUDULEROOT]/vendor/jaypan/jquery_colorpicker/js/colorpicker.js
 7.- Enjoy your colors!!
