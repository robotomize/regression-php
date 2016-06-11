<?php
declare(strict_types = 1);

namespace Regression;

use Carbon\Carbon;
use Exception;
use IllegalArgumentException;

/**
 * Class LinearRegression
 * @package Regression
 * @author robotomize@gmail.com
 */
class LinearRegression implements InterfaceRegression
{
	/**
	 * @var array
	 */
	private $sourceSequence;

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

	/**
	 * @var RegressionModel
	 */
	private $regressionModel;

	/**
	 * @var int
	 */
	private $dimension;

	/**
	 * LinearRegression constructor.
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
				$this->sumIndex[2] += $v[0] * $v[0];
				$this->sumIndex[3] += $v[0] * $v[1];
				$this->sumIndex[4] += $v[1] * $v[1];
			}
		}

		$k += 1;

		$this->gradient = ($k * $this->sumIndex[3] - $this->sumIndex[0] * $this->sumIndex[1]) /
			($k * $this->sumIndex[2] - $this->sumIndex[0] * $this->sumIndex[0]);
		
		$this->intercept = $this->sumIndex[1] / $k - $this->gradient * $this->sumIndex[0] / $k;

		foreach ($this->sourceSequence as $i => $val) {
			$coordinate = [$val[0], $val[0] * $this->gradient + $this->intercept];
			$this->resultSequence[] = $coordinate;
		}

		$this->equation = 'y = ' .  round($this->gradient, 1) .  'x + ' . round($this->intercept, 1);

		$this->push();

	}

	/**
	 * @return RegressionModel
	 */
	public function getRegressionModel(): RegressionModel
	{
		return $this->regressionModel;
	}

	/**
	 * @param array $data
	 *
	 * @return bool
	 */
	public function setSourceSequence(array $data)
	{
		if (0 === count($data)) {
			throw new IllegalArgumentException($data . ' array is empty ');
		}

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
	 * @return array
	 */
	public function getSourceSequence(): array
	{
		return $this->sourceSequence;
	}

	/**
	 * @return float
	 */
	public function getIntercept(): float
	{
		return $this->intercept;
	}

	/**
	 * @return float
	 */
	public function getGradient(): float
	{
		return $this->gradient;
	}
}