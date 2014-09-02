<?php

namespace Milio\StrategyDecider;
use Milio\StrategyDecider\Strategy\StrategyInterface;
use Milio\StrategyDecider\Decider\StrategyDeciderInterface;
use Milio\StrategyDecider\ValueObjects\Vote;

/**
 * Class StrategyManagerTest
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class StrategyManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|StrategyFactoryInterface
     */
    private $factory;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|StrategyDeciderInterface
     */
    private $strategyDecider;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|StrategyInterface
     */
    private $strategy;

    /**
     * @var StrategyManager
     */
    private $strategyManager;

    public function setup()
    {
        $this->strategyDecider = $this->getMock('Milio\StrategyDecider\Decider\StrategyDeciderInterface');
        $this->factory = $this->getMock('Milio\StrategyDecider\StrategyFactoryInterface');
        $this->strategy = $this->getMock('Milio\StrategyDecider\Strategy\StrategyInterface');
        $this->strategyManager = new StrategyManager($this->factory);
    }

    /**
     * @test
     */
    public function it_should_implement_the_interface()
    {
        $this->assertInstanceOf('Milio\StrategyDecider\StrategyManagerInterface', $this->strategyManager);
    }

    /**
     * @test
     */
    public function it_should_decide_for_strategy()
    {
        $votes = [new Vote(Vote::VOTE_YES)];

        $this->strategy->expects($this->once())->method('getName')->will($this->returnValue('foo'));

        $this->factory
            ->expects($this->once())
            ->method('get')
            ->with('foo')
            ->will($this->returnValue($this->strategyDecider));

        $this->strategyDecider->expects($this->once())->method('decide')->with($votes, $this->strategy)
        ->will($this->returnValue(true));

        $result = $this->strategyManager->decideForStrategy($this->strategy, $votes);

        $this->assertTrue($result);
    }
}
