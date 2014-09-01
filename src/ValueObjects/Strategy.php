<?php

namespace Milio\StrategyDecider\ValueObjects;

use Milio\StrategyDecider\Exceptions\InvalidStrategyException;

/**
 * Class Strategy
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class Strategy
{
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
        if (!is_string($strategy) || !in_array($strategy, ['consensus', 'affirmative', 'unanimous'], true)) {
            throw new InvalidStrategyException();
        }
    }
}
