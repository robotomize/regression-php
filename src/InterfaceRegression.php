<?php

namespace regressor;

/**
 * Interface InterfaceRegression
 * @package regressor
 * @author robotomize
 */
interface InterfaceRegression
{
	/**
	 * Calculate regression
	 * @return mixed
	 */
	public function make();

	/**
	 * @param array $data
	 *
	 * @return array
	 */
	public function setSequence(array $data);

	/**
	 * @return array
	 */
	public function getResultSequence();
}