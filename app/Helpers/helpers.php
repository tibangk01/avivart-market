<?php
use NumberToWords\NumberToWords;

if (!function_exists('numberInLetter')) {
	function numberInLetter($value = 0, $currency = 'XOF')
	{
		return (new NumberToWords())->getCurrencyTransformer(app()->getLocale())->toWords($value, $currency);
	}
}