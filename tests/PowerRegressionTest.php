<?php

namespace Test;

use PHPUnit_Framework_TestCase;
use Regression\PowerRegression;
use Regression\RegressionException;
use Regression\RegressionModel;

/**
 * Class PowerRegressionTest
 * @package Test
 * @author robotomize@gmail.com
 */
class PowerRegressionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $testData;

    /**
     *
     */
    public function setUp()
    {
        $this->testData = [
            [1, 10], [2, 30], [3, 68], [4, 130], [5, 222], [6, 350], [7, 520], [8, 738], [9, 1010], [10, 1342]
        ];
    }

    /**
     *
     */
    public function tearDown()
    {
        $this->testData = null;
    }

    /**
     * @throws RegressionException
     */
    public function testCalculate()
    {
        $linear = new PowerRegression();
        $linear->setSourceSequence($this->testData);
        $linear->calculate();

        /** @var RegressionModel $regressionModel */
        $regressionModel = $linear->getRegressionModel();

        $this->assertEquals('y = 7.52 + x^2.18',  $regressionModel->getEquation());
        $this->assertEquals(1126, round($regressionModel->getResultSequence()[9][1]));
        $this->assertEquals(895, round($regressionModel->getResultSequence()[8][1]));
        $this->assertEquals(693, round($regressionModel->getResultSequence()[7][1]));
    }
}
