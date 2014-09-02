<?php

namespace Milio\StrategyDecider\Strategy;

/**
 * Returns yes if one voter returns an positive response.
 *
 * If all voters abstained from voting it depends on the allowAllAbstain setting (defaults false)
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class AffirmativeStrategy extends AbstractStrategy
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
        return StrategyInterface::STRATEGY_AFFIRMATIVE;
    }
}
