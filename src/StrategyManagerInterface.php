<?php

namespace Milio\StrategyDecider;

use Milio\StrategyDecider\Strategy\StrategyInterface;
use Milio\StrategyDecider\ValueObjects\Vote;

/**
 * The strategyManager is capable of deciding on the outcome of votes for different strategies.
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
interface StrategyManagerInterface
{
    /**
     * Returns true or false depending on the votes and the strategy.
     *
     * @param StrategyInterface $strategy The given strategy
     * @param Vote[]            $votes    An array of vote value objects.
     *
     * @return boolean Depending on the votes and the given strategy.
     */
    public function decideForStrategy(StrategyInterface $strategy, $votes);
}
