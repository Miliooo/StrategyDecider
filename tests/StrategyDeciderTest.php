<?php

namespace Milio\StrategyDecider;

/**
 * Class StrategyDeciderTest
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class StrategyDeciderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var StrategyDecider
     */
    private $strategyDecider;


    public function setup()
    {
        $this->strategyDecider = new StrategyDecider();
    }

    /**
     * @test
     */
    public function it_should_implement_the_interface()
    {
        $this->assertInstanceOf('Milio\StrategyDecider\StrategyDeciderInterface', $this->strategyDecider);
    }
}
