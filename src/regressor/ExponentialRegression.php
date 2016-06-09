<?php

namespace regressor;

use Carbon\Carbon;
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

	/**
	 * @var array
	 */
	private $sumIndex = [];

	/**
	 * @throws Exception
	 */
	public function make()
	{
		if ($this->sourceSequence === null) {
			throw new Exception('The input sequence is not set');
		}

		$this->sumIndex = [0, 0, 0, 0, 0, 0];
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

		$this->regressionModel = new RegressionModel();

		$this->regressionModel->setEquation($this->equation);
		$this->regressionModel->setObjectId(bin2hex(random_bytes(10)));
		$this->regressionModel->setResultSequence($this->resultSequence);
		$this->regressionModel->setSourceSequence($this->sourceSequence);
		$this->regressionModel->setCreateDate(Carbon::now()->toDateTimeString());
		
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