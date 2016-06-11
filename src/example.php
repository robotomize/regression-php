<?php

use Regression\ExponentialRegression;
use Regression\LinearRegression;
use Regression\RegressionFactory;
use Regression\RegressionModel;

require __DIR__ . '/autoload.php';
require __DIR__ . '/../vendor/autoload.php';

$testData = [[0, 2], [1, 10], [2, 30], [3, 68], [4, 130], [5, 222], [6, 350], [7, 520], [8, 738], [9, 1010], [10, 1342]];

$linear = new LinearRegression();
$linear->setSourceSequence($testData);
$linear->calculate();

/** @var RegressionModel $regressionModel */
$regressionModel = $linear->getRegressionModel();

var_dump($regressionModel);

/** @var RegressionModel $regressionModel */
$regressionModel = RegressionFactory::Linear($testData);

$exponential = new ExponentialRegression();
$exponential->setSourceSequence($testData);
$exponential->calculate();
$regressionModel = $exponential->getRegressionModel();

$regressionModel = RegressionFactory::Exponential($testData);