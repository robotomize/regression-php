<?php

namespace regressor;

include __DIR__ . '/../src/InterfaceRegression.php';

use Exception;

/**
 * Class LinearRegression
 * @package regressor
 * @author robotomize
 */
class LinearRegression implements InterfaceRegression
{

	/**
	 * @var array
	 */
	private $sequence;

	/**
	 * @var string
	 */
	private $equation;

	/**
	 * @var array
	 */
	private $sumIndex;

	/**
	 * @var float
	 */
	private $gradient;

	/**
	 * @var float
	 */
	private $intercept;

	/**
	 * @var array
	 */
	private $resultSequence;

	public function make()
	{
		if ($this->sequence === null) {
			throw new Exception('The input sequence is not set');
		}

		$this->sumIndex = [0, 0, 0, 0, 0];
		$k = 0;

		foreach ($this->sequence as $k => $v) {
			if ($v[1] !== null) {
				$this->sumIndex[0] += $this->sequence[$k][0];
				$this->sumIndex[1] += $this->sequence[$k][1];
				$this->sumIndex[2] += $this->sequence[$k][0] * $this->sequence[$k][0];
				$this->sumIndex[3] += $this->sequence[$k][0] * $this->sequence[$k][1];
				$this->sumIndex[4] += $this->sequence[$k][1] * $this->sequence[$k][1];
			}
		}

		$this->gradient = ($k * $this->sumIndex[3] - $this->sumIndex[0]*$this->sumIndex[1]) /
			($k * $this->sumIndex[2] - $this->sumIndex[0] * $this->sumIndex[0]);
		$this->intercept = ($this->sumIndex[1] / $k) - ($this->gradient * $this->sumIndex[0]) / $k;

		foreach ($this->sequence as $i => $val) {
			$coordinate = [$this->sequence[$i][0], $this->sequence[$i][0] * $this->gradient + $this->intercept];
			$this->resultSequence[] = $coordinate;
		}

		$this->equation = 'y = ' .  round($this->gradient * 100) / 100 .  'x + ' . round($this->intercept * 100) / 100;
	}

	/**
	 * @param array $data
	 *
	 * @return bool
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

	/**
	 * @return mixed
	 */
	public function getResultSequence()
	{
		return $this->resultSequence;
	}

	/**
	 * @return array
	 */
	public function getSequence()
	{
		return $this->sequence;
	}

	/**
	 * @return float
	 */
	public function getIntercept()
	{
		return $this->intercept;
	}

	/**
	 * @return float
	 */
	public function getGradient()
	{
		return $this->gradient;
	}
}