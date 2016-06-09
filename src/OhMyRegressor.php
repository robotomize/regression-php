<?php

namespace regressor;

use Exception;
use InvalidArgumentException;
use regressor\InterfaceRegression;

/**
 * Class OhhMyRegressor
 * @package regressor
 */
class OhMyRegressor
{

	const LINEAR = 'linear';

	const EXPONENTIAL = 'explonential';

	/**
	 * @var array
	 */
	public static $classMap = [
		self::LINEAR => LinearRegression::class,
		self::EXPONENTIAL => ExponentialRegression::class
	];

	/**
	 * @var array
	 */
	private	$data;

	/**
	 * @var string
3	 */
	private $regressionType;

	public function __construct(array $data, $regressionType = OhMyRegressor::LINEAR)
	{
		$this->data = $data;

		if (!in_array($regressionType, [OhMyRegressor::LINEAR, OhMyRegressor::EXPONENTIAL], true)) {
			throw new InvalidArgumentException('the regression type was not found in ' . OhMyRegressor::class);
		}

		$this->regressionType = $regressionType;
	}

	public function run()
	{
		$regression = new self::$classMap[$this->regressionType]();
		/** var $regression InterfaceRegression */
		$regression->setSequence($this->data);
		$regression->make();
	}
}