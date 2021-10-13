<?php
use NumberToWords\NumberToWords;

if (!function_exists('currencyAppender')) {
	function currencyAppender()
	{
		return ' francs CFA';
	}
}

if (!function_exists('numberTransformer')) {
	function numberTransformer($value = 0)
	{
		return (new NumberToWords())->getNumberTransformer(app()->getLocale())->toWords($value) . currencyAppender();
	}
}

if (!function_exists('currencyTransformer')) {
	function currencyTransformer($value = 0, $currency = 'XOF')
	{
		return (new NumberToWords())->getCurrencyTransformer(app()->getLocale())->toWords($value, $currency);
	}
}

if (!function_exists('nativeNumberTransformer')) {
	function nativeNumberTransformer($value = 0)
	{
		return (new NumberFormatter(app()->getLocale(), NumberFormatter::SPELLOUT))->format($value);
	}
}