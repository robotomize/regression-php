<?php

namespace regressor;

use Exception;

/**
 * Class ExponentialRegression
 * @package regressor
 * @author robotomize
 */
class ExponentialRegression implements InterfaceRegression
{

	/**
	 * @var array
	 */
	private $sequence;

	/**
	 * @var array
	 */
	private $equation;

	public function make()
	{
		if ($this->sequence === null) {
			throw new Exception('Входная последовательность не задана');
		}
	}

	/**
	 * @param array $data
	 */
	public function setSequence(array $data)
	{
		$this->sequence = $data;
	}

	/**
	 * @return array
	 */
	public function getEquation()
	{
		return $this->equation;
	}
}