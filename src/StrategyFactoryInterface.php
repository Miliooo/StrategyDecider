<?php

namespace Milio\StrategyDecider;

use Milio\StrategyDecider\Decider\StrategyDeciderInterface;

/**
 * Class StrategyFactory
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
interface StrategyFactoryInterface
{
    /**
     * @param string $name
     *
     * @return StrategyDeciderInterface
     *
     * @throws \InvalidArgumentException
     */
    public function get($name);
}
