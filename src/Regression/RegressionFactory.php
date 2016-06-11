<?php
declare(strict_types = 1);

namespace Regression;

use Exception;

/**
 * Class RegressionFactory
 * @package Regression
 * @author robotomize@gmail.com
 */
class RegressionFactory
{
	/**
	 * @param array $data
	 * @return RegressionModel
	 * @throws Exception
	 */
	public static function Linear(array $data): RegressionModel
	{
		$model = new LinearRegression();
		$model->setSourceSequence($data);
		$model->calculate();
		return $model->getRegressionModel();
	}

	/**
	 * @param array $data
	 * @return RegressionModel
	 * @throws Exception
	 */
	public static function Exponential(array $data): RegressionModel
	{
		$model = new ExponentialRegression();
		$model->setSourceSequence($data);
		$model->calculate();
		return $model->getRegressionModel();
	}
}