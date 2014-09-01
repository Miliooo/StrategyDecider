<?php

namespace Milio\StrategyDecider\ValueObjects;

use Milio\StrategyDecider\Exceptions\InvalidStrategyException;
use Milio\StrategyDecider\StrategyDeciderInterface;

/**
 * This value object guards that the strategy is valid.
 *
 * Strategy should be one of the STRATEGY_ class constants in StrategyDeciderInterface
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class Strategy
{
    /**
     * @var string A valid strategy name.
     */
    private $strategy;

    /**
     * Constructor.
     *
     * @param $strategy
     */
    public function __construct($strategy)
    {
        $this->guardValidStrategy($strategy);

        $this->strategy = $strategy;
    }

    /**
     * Returns the strategy string.
     *
     * @return string The strategy ('consensus', 'affirmative', 'unanimous')
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getStrategy();
    }

    /**
     * @param string $strategy
     *
     * @throws InvalidStrategyException
     */
    private function guardValidStrategy($strategy)
    {
        if (
            !is_string($strategy)
            ||
            !in_array(
                $strategy,
                [
                    StrategyDeciderInterface::STRATEGY_AFFIRMATIVE,
                    StrategyDeciderInterface::STRATEGY_AFFIRMATIVE_OR_ALL_ABSTAIN,
                    StrategyDeciderInterface::STRATEGY_CONSENSUS_NO,
                    StrategyDeciderInterface::STRATEGY_CONSENSUS_YES,
                    StrategyDeciderInterface::STRATEGY_UNANIMOUS,
                ],
                true
            )
        ) {
            throw new InvalidStrategyException();
        }
    }
}
