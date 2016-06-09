## Regression-php package
My implementation of the regression algorithm

## Requirements
* composer dependency (Carbon DateTime)
* PHP7

### Linear regression algorithm

Basic usage
```php
$testData = [[0, 10], [1, 20], [2, 3], [3, 15], [4, 0]]
$linear = new LinearRegression();
$linear->setSourceSequence($testData);
$linear->make();

/** @var RegressionModel $regressionModel */
$regressionModel = $linear->getRegressionModel();

```
```sh
object(regressor\RegressionModel)#4 (5) {
    ["objectId":"regressor\RegressionModel":private]=> string
    ["resultSequence":"regressor\RegressionModel":private]=> []
    ...
    ["sourceSequence":"regressor\RegressionModel":private]=> []
    ...
    ["equation":"regressor\RegressionModel":private]=> (string)
    ["createDate":"regressor\RegressionModel":private]=> (string)
}
```

Factory usage

```php
/** @var RegressionModel $regressionModel */
$regressionModel = Regression::Linear([[0, 10], [1, 20], [2, 3], [3, 15], [4, 0]]);
```

