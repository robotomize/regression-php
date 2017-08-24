<?php

use Regression\ExponentialRegression;
use Regression\LinearRegression;
use Regression\LogarithmicRegression;
use Regression\PowerRegression;
use Regression\RegressionFactory;
use Regression\RegressionModel;

require __DIR__ . '/src/autoload.php';
require __DIR__ . '/vendor/autoload.php';

$testData = [[1, 129], [2, 384], [3, 396], [4, 579], [5, 495], [6, 843], [7, 936], [8, 431], [9, 431], [10, 600], [11, 512], [12, 314], [13, 432], [14, 489], [15, 327], [16, 492], [17, 551], [18, 544], [19, 643], [20, 535]];

/**
 * Calculate linear regression call calculate()
 */
$linear = new LinearRegression();
$linear->setSourceSequence($testData);
$linear->calculate();

/** @var RegressionModel $regressionModel */
$regressionModel = $linear->getRegressionModel();

/**
 * Calculate with Fabric method
 */
/** @var RegressionModel $regressionModel */
$regressionModel = RegressionFactory::linear($testData);
//var_dump($regressionModel);


/**
 * Calculate Exponential regression call calculate()
 */
$exponential = new ExponentialRegression();
$exponential->setSourceSequence($testData);
$exponential->calculate();
/**
 * And with Fabric method
 */
$regressionModel = $exponential->getRegressionModel();
//var_dump($regressionModel);
/**
 * Calculate logarithmic regression call calculate()
 */
$logarithmic = new LogarithmicRegression();
$logarithmic->setSourceSequence($testData);
$logarithmic->calculate();

/** @var RegressionModel $regressionModel */
$regressionModel = $logarithmic->getRegressionModel();

$regressionModel = RegressionFactory::logarithmic($testData);
var_dump($regressionModel);
/**
 * Calculate power regression call calculate()
 */
$powerReg = new PowerRegression();
$powerReg->setSourceSequence($testData);
$powerReg->calculate();

/** @var RegressionModel $regressionModel */
$regressionModel = $powerReg->getRegressionModel();

$regressionModel = RegressionFactory::power($testData);
//var_dump($regressionModel);
//var_dump(RegressionFactory::Power($testData));
