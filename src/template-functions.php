<?php
/**
 * Creator: Bryan Mayor
 * Company: Blue Nest Digital, LLC
 * License: (Blue Nest Digital LLC, All rights reserved)
 * Copyright: Copyright 2021 Blue Nest Digital LLC
 */

define('TEMPLATE_TAG', '%%%TEMPLATE_VALUE%%%');

function replaceValueInTemplate(string $needle, string $replaceWith, string $templatedString) {
	$templateTag = str_replace('TEMPLATE_VALUE', $needle, TEMPLATE_TAG);

	if(strpos($templatedString, $templateTag) === false) {
		throw new RuntimeException('Could not find template tag in template for replacement: ' . $templateTag);
	}

	return str_replace($templateTag, $replaceWith, $templatedString);
}

function replaceValuesInTemplate(array $replacements, string $templatedString) {
	foreach($replacements as $needle => $replacement) {
		$templatedString = replaceValueInTemplate($needle, $replacement, $templatedString);
	}

	return $templatedString;
}