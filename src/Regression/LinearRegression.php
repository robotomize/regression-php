<?php
declare(strict_types = 1);

namespace Regression;

/**
 * Class LinearRegression
 * @package Regression
 * @author robotomize@gmail.com
 */
class LinearRegression extends AbstractRegression implements InterfaceRegression
{
    /**
     * LinearRegression constructor.
     */
    public function __construct()
    {
        $this->sumIndex = [0, 0, 0, 0, 0, 0];
        $this->dimension = count($this->sumIndex);
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

        $gradient = ($k * $this->sumIndex[3] - $this->sumIndex[0] * $this->sumIndex[1]) /
            ($k * $this->sumIndex[2] - $this->sumIndex[0] * $this->sumIndex[0]);
		
        $intercept = $this->sumIndex[1] / $k - $gradient * $this->sumIndex[0] / $k;

        foreach ($this->sourceSequence as $i => $val) {
            $coordinate = [$val[0], $val[0] * $gradient + $intercept];
            $this->resultSequence[] = $coordinate;
        }

        $this->equation = 'y = ' .  round($gradient, 1) .  'x + ' . round($intercept, 1);

        $this->push();
    }
}
