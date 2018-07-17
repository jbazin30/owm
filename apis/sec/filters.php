<?php
namespace sec;
/**
 * Description of filters
 *
 * @author crash
 */
class filters {

	/**
	 * @var array $is_int filtre permettant la validation d'un entier.
	 * @see http://www.php.net/manual/fr/filter.filters.validate.php
	 */
	static public $is_int = [
		'parameters' => ['flags' => [], 'options' => []],
		'filter' => FILTER_VALIDATE_INT,
	];

	/**
	 * @var array $is_boolean filtre permettant la validation d'un booléen.
	 * @see http://www.php.net/manual/fr/filter.filters.validate.php
	 */
	static public $is_boolean = [
		'parameters' => ['flags' => FILTER_NULL_ON_FAILURE, 'options' => []],
		'filter' => FILTER_VALIDATE_BOOLEAN,
	];

	/**
	 * @var array $is_float filtre permettant la validation d'un flottant.
	 * @see http://www.php.net/manual/fr/filter.filters.validate.php
	 */
	static public $is_float = [
		'parameters' => ['flags' => [], 'options' => []],
		'filter' => FILTER_VALIDATE_FLOAT,
	];

	/**
	 * @var array $is_email filtre permettant la validation d'un email, à noter que root@host est invalide.
	 * @see http://www.php.net/manual/fr/filter.filters.validate.php
	 */
	static public $is_email = [
		'parameters' => ['flags' => [], 'options' => []],
		'filter' => FILTER_VALIDATE_EMAIL,
	];

	/**
	 * @var array $text filtre permettant le nettoyage d'un texte.
	 * @see http://www.php.net/manual/fr/filter.filters.validate.php
	 */
	static public $text = [
		'parameters' => ['flags' => [FILTER_FLAG_NO_ENCODE_QUOTES], 'options' => []],
		'filter' => FILTER_SANITIZE_STRING,
	];

}
