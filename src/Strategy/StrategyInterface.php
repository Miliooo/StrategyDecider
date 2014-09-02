<?php

namespace Milio\StrategyDecider\Strategy;

/**
 * Interface StrategyInterface
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
interface StrategyInterface
{
    const STRATEGY_AFFIRMATIVE = 'affirmative';
    const STRATEGY_UNANIMOUS = 'unanimous';

    /**
     * @return string
     */
    public function getName();

    /**
     * When voting it is possible that all votes were abstained. This means that no one voted yes or no.
     *
     * Since we do have to make a decision the decision is based on this value.
     *
     * When set to false, we will return false when all votes were abstained, else we will return true.
     *
     * @return boolean
     */
    public function getAllowAllAbstain();
}
