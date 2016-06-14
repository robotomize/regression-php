<?php

namespace test;


use PHPUnit_Framework_TestCase;

class ExponentialRegressionTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    private $testData;
    

    public function setUp()
    {
        $this->testData = [
            [1, 10], [2, 30], [3, 68], [4, 130], [5, 222], [6, 350], [7, 520], [8, 738], [9, 1010], [10, 1342]
        ];
    }

    public function tearDown()
    {
        $this->testData = null;
    }

    public function testExponentialRegression()
    {
        return false;
    }
}
