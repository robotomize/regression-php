<?php

namespace robotomize\regression\Math;

use IllegalArgumentException;

/**
 * Class Math
 *
 * @package Regression\Math
 * @author  robotomize@sgmail.com
 */
class Math
{

    const ERROR_ARRAY_LENGTH = 'The length of the arrays does not match';

    /**
     * The quadratic mean square error
     *
     * @param  array $rightData
     * @param  array $hypothesisData
     * @return float
     * @throws IllegalArgumentException
     */
    public static function mse(array $rightData, array $hypothesisData): float
    {
        $score = 0;

        if (count($hypothesisData) !== count($rightData)) {
            throw new IllegalArgumentException(self::ERROR_ARRAY_LENGTH);
        }

        foreach ($rightData as $k => $v) {
            $score += pow($v - $hypothesisData[$k], 2);
        }

        return $score;
    }

    /**
     * Total Sum of Squares
     *
     * @param  array $rightData
     * @return float
     */
    public static function tss(array $rightData): float
    {
        $score = 0;
        $avgConst = array_sum($rightData) / count($rightData);

        foreach ($rightData as $v) {
            $score += pow($v - $avgConst, 2);
        }
        return $score;
    }

    /**
     * @param array $rightData
     * @param array $hypothesisData
     * @return float
     * @throws IllegalArgumentException
     */
    public static function r2(array $rightData, array $hypothesisData):float
    {
        return 1 - self::mse($rightData, $hypothesisData) / self::tss($rightData);
    }

    /**
     * Mean absolute percentage error
     *
     * @param  array $rightData
     * @param  array $hypothesisData
     * @return float
     * @throws IllegalArgumentException
     */
    public static function mape(array $rightData, array $hypothesisData): float
    {
        $score = 0;
        if (count($rightData) !== count($hypothesisData)) {
            throw new IllegalArgumentException(self::ERROR_ARRAY_LENGTH);
        }

        foreach ($rightData as $k => $v) {
            $score += abs($v - $hypothesisData[$k]) / $v;
        }

        return $score / count($rightData);
    }

    /**
     * Mean absolute error
     *
     * @param  array $rightData
     * @param  array $hypothesisData
     * @return float
     * @throws IllegalArgumentException
     */
    public static function mae(array $rightData, array $hypothesisData): float
    {
        $score = 0;
        if (count($rightData) !== count($hypothesisData)) {
            throw new IllegalArgumentException(self::ERROR_ARRAY_LENGTH);
        }

        foreach ($rightData as $k => $v) {
            $score += abs($v - $hypothesisData[$k]);
        }

        return $score / count($rightData);
    }

    /**
     * 1- mae
     *
     * @param  array $rightData
     * @param  array $hypothesisData
     * @return float
     * @throws IllegalArgumentException
     */
    public static function mpmae(array $rightData, array $hypothesisData): float
    {
        return 1 - self::mae($rightData, $hypothesisData);
    }

    /**
     * The accuracy of the forecast
     *
     * @param  array $rightData
     * @param  array $hypothesisData
     * @return float
     * @throws IllegalArgumentException
     */
    public static function mpe(array $rightData, array $hypothesisData): float
    {
        return 1 - self::mape($rightData, $hypothesisData);
    }

    /**
     * Moving Average
     *
     * @param  array $vector
     * @return array
     */
    public static function tripleMovingAverage(array $vector): array
    {
        $iterior = [];
        for ($i = 0; $i < count($vector); $i++) {

            if ($i >= count($vector) - 3) {
                $iterior[$i] = ($vector[$i] + $vector[$i - 1] + $vector[$i - 2] + $vector[$i - 3]) / 4;
            } else {
                $iterior[$i] = ($vector[$i] + $vector[$i + 1] + $vector[$i + 2] + $vector[$i + 3]) / 4;
            }
        }
        return $iterior;
    }
}