<?php

namespace Milio\StrategyDecider\Strategy;

/**
 * Returns no as soon as any voter returns an negative response.
 *
 * If all voters abstained from voting it depends on the allowAllAbstain setting (defaults false)
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class UnanimousStrategy extends AbstractStrategy
{
    /**
     * @param bool $allowAllAbstain
     */
    public function __construct($allowAllAbstain = false)
    {
        parent::__construct($allowAllAbstain);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return StrategyInterface::STRATEGY_UNANIMOUS;
    }
}
