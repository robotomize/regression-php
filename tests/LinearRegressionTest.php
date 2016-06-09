<?php

namespace test;

include __DIR__ . '/../src/autoload.php';

include __DIR__ . '/../src/LinearRegression.php';

use PHPUnit_Framework_TestCase;

use regressor\LinearRegression;

class LinearRegressionTest extends PHPUnit_Framework_TestCase
{

	/**
	 * @var array
	 */
	private $testData;

	public function setUp()
	{
		$this->testData = [
			[-10, -738],
			[-9, -520],
			[-8, -350],
			[-7, -222],
			[-6, -130],
			[-5, -68],
			[-4, -30],
			[-3, -10],
			[-2, -2],
			[-1, 0],
			[0, 2],
			[1, 10],
			[2, 30],
			[3, 68],
			[4, 130],
			[5, 222],
			[6, 350],
			[7, 520],
			[8, 738],
			[9, 1010],
			[10, 1342],
			[11, 1400],
			[12, 1440]
		];
	}

	public function tearDown()
	{
		$this->testData = null;
	}

	public function testLinearRegression()
	{
		$model = new LinearRegression();
		$model->setSequence($this->testData);
		$model->make();
		print $model->getEquation();
		var_dump($model->getResultSequence());
		//$this->assertEquals('', $model->getEquation());
	}
}
