<?php

namespace regressor;

use Exception;

/**
 * Class Regression
 * @package regressor
 * @author robotomize@gmail.com
 */
class Regression
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
		$model->make();
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
		$model->make();
		return $model->getRegressionModel();
	}
}