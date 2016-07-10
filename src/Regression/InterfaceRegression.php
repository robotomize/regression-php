<?php

namespace Regression;

/**
 * Interface InterfaceRegression
 *
 * @package Regerssion
 * @author  robotomize@gmail.com
 */
interface InterfaceRegression
{
    
    public function calculate();

    /**
     * @param array $data
     *
     * @return array
     */
    public function setSourceSequence(array $data);

    /**
     * @return RegressionModel
     */
    public function getRegressionModel();

}