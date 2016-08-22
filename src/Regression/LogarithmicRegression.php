<?php

namespace Regression;

/**
 * Class LogarithmicRegression
 *
 * @package Regression
 * @author  robotomize@gmail.com
 */
class LogarithmicRegression extends AbstractRegression implements InterfaceRegression
{

    /**
     * LogarithmicRegression constructor.
     */
    public function __construct()
    {
        $this->sumIndex = [0, 0, 0, 0];
        $this->dimension = count($this->sumIndex);
    }

    public function calculate()
    {
        if ($this->sourceSequence === null) {
            throw new RegressionException('The input sequence is not set');
        }

        if (count($this->sourceSequence) < $this->dimension) {
            throw new RegressionException(sprintf('The dimension of the sequence of at least %s', $this->dimension));
        }

        $k = 0;

        foreach ($this->sourceSequence as $k => $v) {
            if ($v[1] !== null) {
                $this->sumIndex[0] += log($v[0]);
                $this->sumIndex[1] += $v[1] * log($v[0]);
                $this->sumIndex[2] += $v[1];
                $this->sumIndex[3] += pow(log($v[0]), 2);
            }
        }

        $k += 1;

        $B = ($k * $this->sumIndex[1] - $this->sumIndex[2] * $this->sumIndex[0])
            / ($k * $this->sumIndex[3] - $this->sumIndex[0] * $this->sumIndex[0]);

        $A = ($this->sumIndex[2] - $B * $this->sumIndex[0]) / $k;

        foreach ($this->sourceSequence as $i => $val) {
            $coordinate = [$val[0], $A + $B * log($val[0])];
            $this->resultSequence[] = $coordinate;
        }

        $this->equation = sprintf('y = %s + %sln(x)', round($A, 2), round($B, 2));

        $this->push();
    }
}
