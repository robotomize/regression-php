<?php

namespace Regression;


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
    public static function logarithmic(array $data)
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
     * @return RegressionModel
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
                sprintf(
                    'the object %s is not compatible with the interface %s',
                    $className,
                    InterfaceRegression::class
                )
            );
        }

        $regressionObj->setSourceSequence($data);
        $regressionObj->calculate();

        return $regressionObj->getRegressionModel();
    }
}