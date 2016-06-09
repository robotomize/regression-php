<?php

namespace regressor;

/**
 * Class RegressionModel
 * @package regressor
 * author robotomize@gmail.com
 */
class RegressionModel
{
    /**
     * @var int
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
     * @return int
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * @param int $objectId
     */
    public function setObjectId($objectId)
    {
        $this->objectId = $objectId;
    }

    /**
     * @return array
     */
    public function getResultSequence()
    {
        return $this->resultSequence;
    }

    /**
     * @param array $resultSequence
     */
    public function setResultSequence($resultSequence)
    {
        $this->resultSequence = $resultSequence;
    }

    /**
     * @return array
     */
    public function getSourceSequence()
    {
        return $this->sourceSequence;
    }

    /**
     * @param array $sourceSequence
     */
    public function setSourceSequence($sourceSequence)
    {
        $this->sourceSequence = $sourceSequence;
    }

    /**
     * @return string
     */
    public function getEquation()
    {
        return $this->equation;
    }

    /**
     * @param string $equation
     */
    public function setEquation($equation)
    {
        $this->equation = $equation;
    }

    /**
     * @return string
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * @param string $createDate
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }
}