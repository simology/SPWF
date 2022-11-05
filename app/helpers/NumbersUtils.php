<?php

class NumbersUtils {

	const ROUNDING_PRECISION = 2;
	const VAT_ROUNDING_PRECISION = 2; // VAT must always be rounded to 2 decimal places. See https://www.fatturapa.gov.it/export/fatturazione/sdi/Elenco_Controlli_V1.5.pdf

	/**
	 * This function takes the last comma or dot (if any) to make a clean float,
	 * ignoring thousand separator, currency or any other letter.
	 *
	 * Courtesy of http://php.net/manual/en/function.floatval.php#114486
	 *
	 * @return float
	 */
	public static function parseToFloat($number) {
		$dotPos   = strrpos($number, ".");
		$commaPos = strrpos($number, ",");

		$sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
			((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

		$sign = substr($number, 0, 1);
		$signMultiplier = $sign == "-" ? -1 : 1;

		// If no dot or comma is found
		if (!$sep) {
			return $signMultiplier * floatval(preg_replace("/[^0-9]/", "", $number));
		}

		return $signMultiplier * floatval(
			preg_replace("/[^0-9]/", "", substr($number, 0, $sep))
			. "." .
			preg_replace("/[^0-9]/", "", substr($number, $sep + 1, strlen($number)))
		);
	}

	/**
	 * This function helps to mantain a standard format when showing a currency
	 *
	 * @return string
	 */
	public static function formatDecimal($currency, $decimals = self::ROUNDING_PRECISION) {
		return number_format($currency, $decimals, ",", ".");
	}

	/**
	 * This function helps to mantain a standard format when showing a currency, without the thousands separator
	 *
	 * @return string
	 */
	public static function formatDecimalForElectronicInvoice($currency, $decimals = self::ROUNDING_PRECISION) {
		return number_format($currency, $decimals, ".", "");
	}
}