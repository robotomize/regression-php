<?php

namespace test;


use PHPUnit_Framework_TestCase;
use Regression\LogarithmicRegression;
use Regression\RegressionException;
use Regression\RegressionModel;

/**
 * Class LogarithmicRegressionTest
 * @package test
 * @author robotomize@gmail.com
 */
class LogarithmicRegressionTest extends PHPUnit_Framework_TestCase
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
        $linear = new LogarithmicRegression();
        $linear->setSourceSequence($this->testData);
        $linear->calculate();

        /** @var RegressionModel $regressionModel */
        $regressionModel = $linear->getRegressionModel();

        $this->assertEquals('y = -320.03 + 504.51 ln(x)',  $regressionModel->getEquation());
        $this->assertEquals(842, round($regressionModel->getResultSequence()[9][1]));
        $this->assertEquals(788, round($regressionModel->getResultSequence()[8][1]));
        $this->assertEquals(729, round($regressionModel->getResultSequence()[7][1]));
    }
}
