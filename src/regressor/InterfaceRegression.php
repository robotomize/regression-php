<?php

namespace regressor;

/**
 * Interface InterfaceRegression
 * @package regressor
 * @author robotomize@gmail.com
 */
interface InterfaceRegression
{
	/**
	 * @return mixed
	 */
	public function make();

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function setSourceSequence(array $data);

	/**
	 * @return RegressionModel
	 */
	public function getRegressionModel(): RegressionModel;

}