## Regression-php package
[![Latest Stable Version](https://poser.pugx.org/robotomize/regression-php/v/stable)](https://packagist.org/packages/robotomize/regression-php)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/robotomize/regression-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/robotomize/regression-php/?branch=master)
[![Build Status](https://travis-ci.org/robotomize/regression-php.svg?branch=master)](https://travis-ci.org/robotomize/regression-php/)
[![Total Downloads](https://poser.pugx.org/robotomize/regression-php/downloads)](https://packagist.org/packages/robotomize/regression-php)
[![License](https://poser.pugx.org/robotomize/regression-php/license)](https://packagist.org/packages/robotomize/regression-php)
## Description
* Implementation of model building for regression
* New models of regression in the development
* There will be a separate thread for php 5.6

## Requirements
* composer dependency (Carbon DateTime, random-bytes)
* PHP 5.6-7

## Install
```sh
composer require robotomize/regression-php
```

### Branches

* Under php7 branch 0.24, develop branch
* Use the branch with the syntax php7, you can clone the repository or view the 0.24 branch


### Linear regression algorithm

Basic usage
```php
$testData = [[0, 10], [1, 20], [2, 3], [3, 15], [4, 0]]
$linear = new LinearRegression();
$linear->setSourceSequence($testData);
$linear->calculate();

/** @var RegressionModel $regressionModel */
$regressionModel = $linear->getRegressionModel();

```

Factory usage

```php
/** @var RegressionModel $regressionModel */
$regressionModel = Regression::Linear([[0, 10], [1, 20], [2, 3], [3, 15], [4, 0]]);
```
### Exponential regression

Basic usage

```php
$exponential = new ExponentialRegression();
$exponential->setSourceSequence($testData);
$exponential->calculate();
$regressionModel = $exponential->getRegressionModel();
```

Factory usage

```php
$regressionModel = Regression::Exponential($testData);
```
### Logarithmic regression

### Basic usage
```php
$logarithmic = new LogarithmicRegression();
$logarithmic->setSourceSequence($testData);
$logarithmic->calculate();

/** @var RegressionModel $regressionModel */
$regressionModel = $logarithmic->getRegressionModel();
```

### Factory usage
```php
$regressionModel = RegressionFactory::Logarithmic($testData);
```

### Power regression

### Basic usage
```php
$powerReg = new PowerRegression();
$powerReg->setSourceSequence($testData);
$powerReg->calculate();

/** @var RegressionModel $regressionModel */
$regressionModel = $powerReg->getRegressionModel();
```

### Factory usage
```php
$regressionModel = RegressionFactory::Power($testData);
```
