<?php

namespace regressor;

use Exception;

/**
 * Class ExponentialRegression
 * @package regressor
 * @author robotomize@gmail.com
 */
class ExponentialRegression implements InterfaceRegression
{

	/**
	 * @var array
	 */
	private $sourceSequence;

	/**
	 * @var array
	 */
	private $equation;

	/**
	 * @var array
	 */
	private $resultSequence;

	/**
	 * @var RegressionModel
	 */
	private $regressionModel;


	public function make()
	{
		if ($this->sourceSequence === null) {
			throw new Exception('Входная последовательность не задана');
		}
	}

	/**
	 * @param array $data
	 */
	public function setSourceSequence(array $data)
	{
		$this->sequence = $data;
	}

	/**
	 * @return string
	 */
	public function getEquation(): string
	{
		return $this->equation;
	}

	/**
	 * @return RegressionModel
	 */
	public function getRegressionModel(): RegressionModel
	{
		return $this->regressionModel;
	}

	/**
	 * @return array
	 */
	public function getSourceSequence(): array
	{
		return $this->sourceSequence;
	}
}