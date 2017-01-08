<?php

/**
 * @file Contains Drupal\jquery_colorpicker\Service\JQueryColorpickeService
 */

namespace Drupal\jquery_colorpicker\Service;

use Drupal\jquery_colorpicker\Service\JQueryColorpickerServiceInterface;

class JQueryColorpickerService implements JQueryColorpickerServiceInterface
{
	public function validateColor($color)
	{
		if(preg_match('/^#/', $color))
		{
			$color = substr($color, 1);
		}

		$return = [
			'color' => $color,
		];

		if(strlen($color) != 6)
		{
			$return['error'] = t('Color values must be exactly six characters in length');
		}
		// All values must be hexadecimal values.
		elseif(!preg_match('/^[0-9a-fA-F]{6}$/i', $color))
		{
			$return['error'] = t("You entered an invalid value for the color. Colors must be hexadecimal, and can only contain the characters '0-9', 'a-f' and/or 'A-F'.");
		}

		return $return;
	}
}
