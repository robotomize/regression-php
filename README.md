## Regression-php package

Implementation of the regression algorithm

## Requirements
* composer dependency (Carbon DateTime)
* PHP7

## Install
```sh
git clone https://github.com/robotomize/regression-php.git
cd regression-php;
php src/example.php
```

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
