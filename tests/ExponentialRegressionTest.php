<?php

namespace Test;


use PHPUnit_Framework_TestCase;
use Regression\ExponentialRegression;
use Regression\RegressionException;
use Regression\RegressionFactory;
use Regression\RegressionModel;

/**
 * Class ExponentialRegressionTest
 * @package Test
 * @author robotomize@gmail.com
 */
class ExponentialRegressionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $rows;

    /**
     *
     */
    public function setUp()
    {
        $this->rows[0] = [
            [1, 10], [2, 30], [3, 68], [4, 130], [5, 222], [6, 350], [7, 520], [8, 738], [9, 1010], [10, 1342]
        ];
        /**
         * Another dataSet
         */
        $this->rows[1] = [
            [1, 11], [2, 13], [3, 13], [4, 14], [5, 16], [6, 16], [7, 13], [8, 13]
        ];
    }

    /**
     *
     */
    public function tearDown()
    {
        $this->rows = null;
    }

    /**
     * @throws RegressionException
     */
    public function testCalculate()
    {
        $linear = new ExponentialRegression();
        $linear->setSourceSequence($this->rows[0]);
        $linear->calculate();

        /** @var RegressionModel $regressionModel */
        $regressionModel = $linear->getRegressionModel();

        $this->assertEquals('y = 30.2 + e^(0.39x)', $regressionModel->getEquation());
        $this->assertEquals(1470, \round($regressionModel->getResultSequence()[9][1]));
        $this->assertEquals(997, \round($regressionModel->getResultSequence()[8][1]));
        $this->assertEquals(676, \round($regressionModel->getResultSequence()[7][1]));

        $regressionModel = RegressionFactory::exponential($this->rows[1]);
        $this->assertEquals('y = 12.36 + e^(0.02x)', $regressionModel->getEquation());
        $this->assertEquals(13, \round($regressionModel->getResultSequence()[0][1]));
        $this->assertEquals(13, \round($regressionModel->getResultSequence()[1][1]));
        $this->assertEquals(13, \round($regressionModel->getResultSequence()[2][1]));
    }
}
