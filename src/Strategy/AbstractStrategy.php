<?php

namespace Milio\StrategyDecider\Strategy;

/**
 * Base abstract class for strategies.
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
abstract class AbstractStrategy implements StrategyInterface
{
    private $allowAllAbstain = false;

    /**
     * @param bool $allowAllAbstain
     */
    public function __construct($allowAllAbstain = false)
    {
        $this->allowAllAbstain = $allowAllAbstain;
    }

    /**
     * {@inheritdoc}
     */
    public final function getAllowAllAbstain()
    {
        return $this->allowAllAbstain;
    }

    /**
     * {@inheritdoc}
     */
    public abstract function getName();
}
