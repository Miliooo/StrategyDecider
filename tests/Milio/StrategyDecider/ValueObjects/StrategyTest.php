<?php

namespace Milio\StrategyDecider\ValueObjects;

use Milio\StrategyDecider\StrategyDeciderInterface;

/**
 * Test file for Strategy
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class StrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @dataProvider InvalidDataProvider
     * @expectedException \Milio\StrategyDecider\Exceptions\InvalidStrategyException
     */
    public function it_should_throw_InvalidStrategyException_when_not_valid_strategy($value)
    {
        new Strategy($value);
    }

    /**
     * @test
     *
     * @dataProvider ValidDataProvider
     */
    public function it_should_return_valid_strategies($value)
    {
        $strategy = new Strategy($value);
        $this->assertEquals($value, $strategy->getStrategy(), 'get failure');
        $this->assertEquals($value, (string) $strategy, 'toString failure');
    }

    /**
     * DataProvider
     *
     * @return array
     */
    public function invalidDataProvider()
    {
        return [
            ['foo'],
            [null],
            [''],
            [[]],
            [false],
            [true],
            [0],
            [new \stdClass()]
        ];
    }

    /**
     * DataProvider
     *
     * Although we should only rely on the constants let's check the real values too. They should never change.
     *
     * @return array
     */
    public function validDataProvider()
    {
        return [
            [StrategyDeciderInterface::STRATEGY_AFFIRMATIVE],
            [StrategyDeciderInterface::STRATEGY_AFFIRMATIVE_OR_ALL_ABSTAIN],
            [StrategyDeciderInterface::STRATEGY_CONSENSUS_YES],
            [StrategyDeciderInterface::STRATEGY_CONSENSUS_NO],
            [StrategyDeciderInterface::STRATEGY_UNANIMOUS]
        ];
    }
}
