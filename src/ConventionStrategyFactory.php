<?php

namespace Milio\StrategyDecider;

use Milio\StrategyDecider\Decider\StrategyDeciderInterface;

/**
 * Implementation of a factory which uses naming conventions for returning the right StrategyDecider instance.
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class ConventionStrategyFactory implements StrategyFactoryInterface
{
    /**
     * @param string $name
     *
     * @return StrategyDeciderInterface
     *
     * @throws \InvalidArgumentException
     */
    public function get($name)
    {
        $namespace = 'Milio\StrategyDecider\Decider';
        $class = $namespace."\\".ucfirst($name)."StrategyDecider";

        if (class_exists($class, true)) {
            return new $class;
        } else {
            throw new \InvalidArgumentException('could not find class');
        }
    }
}
