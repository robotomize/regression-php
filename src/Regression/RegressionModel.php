<?php
declare(strict_types = 1);

namespace Regression;

/**
 * Class RegressionModel
 *
 * @package Regression
 * @author  robotomize@gmail.com
 */
class RegressionModel
{
    /**
     * @var string
     */
    private $objectId;

    /**
     * @var array
     */
    private $resultSequence;

    /**
     * @var array
     */
    private $sourceSequence;

    /**
     * @var string
     */
    private $equation;

    /**
     * @var string
     */
    private $createDate;

    /**
     * @return string
     */
    public function getObjectId(): string
    {
        return $this->objectId;
    }

    /**
     * @param string $objectId
     */
    public function setObjectId(string $objectId)
    {
        $this->objectId = $objectId;
    }

    /**
     * @return array
     */
    public function getResultSequence(): array
    {
        return $this->resultSequence;
    }

    /**
     * @param array $resultSequence
     */
    public function setResultSequence(array $resultSequence)
    {
        $this->resultSequence = $resultSequence;
    }

    /**
     * @return array
     */
    public function getSourceSequence(): array
    {
        return $this->sourceSequence;
    }

    /**
     * @param array $sourceSequence
     */
    public function setSourceSequence(array $sourceSequence)
    {
        $this->sourceSequence = $sourceSequence;
    }

    /**
     * @return string
     */
    public function getEquation(): string
    {
        return $this->equation;
    }

    /**
     * @param string $equation
     */
    public function setEquation(string $equation)
    {
        $this->equation = $equation;
    }

    /**
     * @return string
     */
    public function getCreateDate(): string
    {
        return $this->createDate;
    }

    /**
     * @param string $createDate
     */
    public function setCreateDate(string $createDate)
    {
        $this->createDate = $createDate;
    }
}