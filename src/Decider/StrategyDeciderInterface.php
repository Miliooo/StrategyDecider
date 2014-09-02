<?php

namespace Milio\StrategyDecider\Decider;

use Milio\StrategyDecider\Strategy\StrategyInterface;
use Milio\StrategyDecider\Exceptions\InvalidStrategyException;
use Milio\StrategyDecider\ValueObjects\Vote;

/**
 * Deciders are responsible for deciding the outcome given an array of votes and a strategy.
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
interface StrategyDeciderInterface
{
    /**
     * @param Vote[]            $votes
     * @param StrategyInterface $strategy
     *
     * @return bool
     *
     * @throws InvalidStrategyException When not able to handle the given strategy.
     */
    public function decide($votes, StrategyInterface $strategy);
}
