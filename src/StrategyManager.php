<?php

namespace Milio\StrategyDecider;

use Milio\StrategyDecider\Strategy\StrategyInterface;

/**
 * Implementation which uses a factory.
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class StrategyManager implements StrategyManagerInterface
{
    /**
     * @var StrategyFactoryInterface
     */
    private $strategyFactory;

    /**
     * @param StrategyFactoryInterface $strategyFactory
     */
    public function __construct(StrategyFactoryInterface $strategyFactory)
    {
        $this->strategyFactory = $strategyFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function decideForStrategy(StrategyInterface $strategy, $votes)
    {
        $decider =  $this->strategyFactory->get($strategy->getName());

        return $decider->decide($votes, $strategy);
    }
}
