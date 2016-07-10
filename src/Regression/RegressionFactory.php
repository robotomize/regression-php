<?php

namespace Regression;
use Regression\TypeError;


/**
 * Class RegressionFactory
 *
 * @package Regression
 * @author  robotomize@gmail.com
 */
class RegressionFactory
{
    /**
     * @param array $data
     * @return RegressionModel
     * @throws TypeError
     */
    public static function linear(array $data)
    {
        return self::createContainer(LinearRegression::class, $data);
    }

    /**
     * @param array $data
     * @return RegressionModel
     * @throws TypeError
     */
    public static function exponential(array $data)
    {
        return self::createContainer(ExponentialRegression::class, $data);
    }

    /**
     * @param array $data
     * @return RegressionModel
     * @throws TypeError
     */
    public static function logarithmic(array $data): RegressionModel
    {
        return self::createContainer(LogarithmicRegression::class, $data);
    }

    /**
     * @param array $data
     * @return RegressionModel
     * @throws TypeError
     */
    public static function power(array $data)
    {
        return self::createContainer(PowerRegression::class, $data);
    }

    /**
     * @param string $className
     * @param array  $data
     * @return InterfaceRegression
     * @throws TypeError
     */
    protected static function createContainer($className, array $data)
    {
        /**
        * @var InterfaceRegression $regressionObj
        */
        $regressionObj = new $className();

        if (!$regressionObj instanceof InterfaceRegression) {
            throw new TypeError(
                'the object' . $className .
                '  is not compatible with the interface ' . InterfaceRegression::class
            );
        }

        $regressionObj->setSourceSequence($data);
        $regressionObj->calculate();
        return $regressionObj->getRegressionModel();
    }
}