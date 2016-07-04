<?php

namespace Test;

use PHPUnit_Framework_TestCase;
use Regression\LinearRegression;
use Regression\RegressionException;
use Regression\RegressionModel;

/**
 * Class LinearRegressionTest
 * @package Test
 * @author robotomize@gmail.com
 */
class LinearRegressionTest extends PHPUnit_Framework_TestCase
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
		$linear = new LinearRegression();
		$linear->setSourceSequence($this->testData);
        $linear->calculate();

		/** @var RegressionModel $regressionModel */
		$regressionModel = $linear->getRegressionModel();

		$this->assertEquals('y = 142.4x + -341.2',  $regressionModel->getEquation());
		$this->assertEquals(1083, round($regressionModel->getResultSequence()[9][1]));
		$this->assertEquals(940, round($regressionModel->getResultSequence()[8][1]));
		$this->assertEquals(798, round($regressionModel->getResultSequence()[7][1]));
	}
}
