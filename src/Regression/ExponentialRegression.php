<?php
declare(strict_types = 1);

namespace Regression;

/**
 * Class ExponentialRegression
 *
 * @package Regression
 * @author  robotomize@gmail.com
 */
class ExponentialRegression extends AbstractRegression implements InterfaceRegression
{

    /**
     * ExponentialRegression constructor.
     */
    public function __construct()
    {
        $this->sumIndex = [0, 0, 0, 0, 0, 0];
        $this->dimension = \count($this->sumIndex);
    }

    /**
     * @throws RegressionException
     */
    public function calculate()
    {
        if ($this->sourceSequence === null) {
            throw new RegressionException('The input sequence is not set');
        }

        if (\count($this->sourceSequence) < $this->dimension) {
            throw new RegressionException('The dimension of the sequence of at least ' . $this->dimension);
        }

        foreach ($this->sourceSequence as $k => $v) {
            if ($v[1] !== null) {
                $this->sumIndex[0] += $v[0];
                $this->sumIndex[1] += $v[1];
                $this->sumIndex[2] += $v[0] * $v[0] * $v[1];
                $this->sumIndex[3] += $v[1] * \log($v[1]);
                $this->sumIndex[4] += $v[0] * $v[1] * \log($v[1]);
                $this->sumIndex[5] += $v[0] * $v[1];
            }
        }

        $denominator = $this->sumIndex[1] * $this->sumIndex[2] - $this->sumIndex[5] * $this->sumIndex[5];

        $A = \exp(($this->sumIndex[2] * $this->sumIndex[3] - $this->sumIndex[5] * $this->sumIndex[4]) / $denominator);
        $B = ($this->sumIndex[1] * $this->sumIndex[4] - $this->sumIndex[5] * $this->sumIndex[3]) / $denominator;

        foreach ($this->sourceSequence as $i => $val) {
            $coordinate = [$val[0], $A * \exp($B * $val[0])];
            $this->resultSequence[] = $coordinate;
        }

        $this->equation = 'y = ' . \round($A, 2) . '+ e^(' . \round($B, 2) . 'x)';

        $this->push();
    }
}
