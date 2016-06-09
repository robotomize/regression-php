<?php

use regressor\ExponentialRegression;
use regressor\LinearRegression;
use regressor\Regression;
use regressor\RegressionModel;

require __DIR__ . '/autoload.php';
require __DIR__ . '/../vendor/autoload.php';

$testData = [[0, 2], [1, 10], [2, 30], [3, 68], [4, 130], [5, 222], [6, 350], [7, 520], [8, 738], [9, 1010], [10, 1342]
];

$linear = new LinearRegression();
$linear->setSourceSequence($testData);
$linear->make();

/** @var RegressionModel $regressionModel */
$regressionModel = $linear->getRegressionModel();

var_dump($regressionModel);

/** @var RegressionModel $regressionModel */
$regressionModel = Regression::Linear($testData);

$exponential = new ExponentialRegression();
$exponential->setSourceSequence($testData);
$exponential->make();
$regressionModel = $exponential->getRegressionModel();

$regressionModel = Regression::Exponential($testData);
