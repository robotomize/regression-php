<?php

namespace Regression;

/**
 * Class PowerRegression
 *
 * @package Regression
 * @author  robotomoze@gmail.com
 */
class PowerRegression extends AbstractRegression implements InterfaceRegression
{
    /**
     * ExponentialRegression constructor.
     */
    public function __construct()
    {
        $this->sumIndex = [0, 0, 0, 0];
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
                $this->sumIndex[0] += log($v[0]);
                $this->sumIndex[1] += log($v[0]) * log($v[1]);
                $this->sumIndex[2] += log($v[1]);
                $this->sumIndex[3] += pow(log($v[0]), 2);
            }
        }

        $k += 1;

        $B = ($k * $this->sumIndex[1] - $this->sumIndex[2] * $this->sumIndex[0])
                / ($k * $this->sumIndex[3] - $this->sumIndex[0] * $this->sumIndex[0]);
        $A = exp(($this->sumIndex[2] - $B * $this->sumIndex[0]) / $k);

        foreach ($this->sourceSequence as $i => $val) {
            $coordinate = [$val[0], $A * pow($val[0], $B)];
            $this->resultSequence[] = $coordinate;
        }

        $this->equation = 'y = ' . round($A, 2) . '+ x^' . round($B, 2);

        $this->push();
    }
}
