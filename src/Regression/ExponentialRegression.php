<?php
declare(strict_types = 1);

namespace Regression;

use Carbon\Carbon;
use Exception;

/**
 * Class ExponentialRegression
 * @package Regression
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

	/**
	 * @var array
	 */
	private $sumIndex = [];

	/**
	 * @var int
	 */
	private $dimension;

	/**
	 * ExponentialRegression constructor.
	 * @param array $sumIndex
	 */
	public function __construct()
	{
		$this->sumIndex = [0, 0, 0, 0, 0, 0];
		$this->dimension = count($this->sumIndex);
	}

	private function push()
	{
		$this->regressionModel = new RegressionModel();
		$this->regressionModel->setEquation($this->equation);
		$this->regressionModel->setObjectId(bin2hex(random_bytes(10)));
		$this->regressionModel->setResultSequence($this->resultSequence);
		$this->regressionModel->setSourceSequence($this->sourceSequence);
		$this->regressionModel->setCreateDate(Carbon::now()->toDateTimeString());
	}

	/**
	 * @throws RegressionException
	 */
	public function calculate()
	{

		if ($this->sourceSequence === null) {
			throw new RegressionException('The input sequence is not set');
		}

		if (count($this->sourceSequence) < $this->dimension) {
			throw new RegressionException('The dimension of the sequence of at least ' . $this->dimension);
		}

		$k = 0;

		foreach ($this->sourceSequence as $k => $v) {
			if ($v[1] !== null) {
				$this->sumIndex[0] += $v[0];
				$this->sumIndex[1] += $v[1];
				$this->sumIndex[2] += $v[0] * $v[0] * $v[1];
				$this->sumIndex[3] += $v[1] * log($v[1]);
				$this->sumIndex[4] += $v[0] * $v[1] * log($v[1]);
				$this->sumIndex[5] += $v[0] * $v[1];
			}
		}

		$denominator = $this->sumIndex[1] * $this->sumIndex[2] - $this->sumIndex[5] * $this->sumIndex[5];

		$A = exp(($this->sumIndex[2] * $this->sumIndex[3] - $this->sumIndex[5] * $this->sumIndex[4]) / $denominator);
		$B = ($this->sumIndex[1] * $this->sumIndex[4] - $this->sumIndex[5] * $this->sumIndex[3]) / $denominator;

		foreach ($this->sourceSequence as $i => $val) {
			$coordinate = [$val[0], $A * exp($B * $val[0])];
			$this->resultSequence[] = $coordinate;
		}

		$this->equation = 'y = ' .  round($A, 2) .  'e^(' . round($B, 2) . 'x)';

		$this->push();
	}

	/**
	 * @param array $data
	 */
	public function setSourceSequence(array $data)
	{
		$this->sourceSequence = $data;
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