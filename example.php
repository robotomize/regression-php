<?php

use Regression\ExponentialRegression;
use Regression\LinearRegression;
use Regression\LogarithmicRegression;
use Regression\PowerRegression;
use Regression\RegressionFactory;
use Regression\RegressionModel;

require __DIR__ . '/src/autoload.php';
require __DIR__ . '/vendor/autoload.php';

$testData = [[1, 10], [2, 30], [3, 68], [4, 130], [5, 222], [6, 350], [7, 520], [8, 738], [9, 1010], [10, 1342]];

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
$regressionModel = RegressionFactory::Linear($testData);

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

/**
 * Calculate logarithmic regression call calculate()
 */
$logarithmic = new LogarithmicRegression();
$logarithmic->setSourceSequence($testData);
$logarithmic->calculate();

/** @var RegressionModel $regressionModel */
$regressionModel = $logarithmic->getRegressionModel();

$regressionModel = RegressionFactory::Logarithmic($testData);

/**
 * Calculate power regression call calculate()
 */
$powerReg = new PowerRegression();
$powerReg->setSourceSequence($testData);
$powerReg->calculate();

/** @var RegressionModel $regressionModel */
$regressionModel = $powerReg->getRegressionModel();

$regressionModel = RegressionFactory::Power($testData);
var_dump($regressionModel);
//var_dump(RegressionFactory::Power($testData));
