<?php

namespace Milio\StrategyDecider\ValueObjects;

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
    public function it_should_throw_an_exception_when_not_valid_strategy($value)
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
        $this->assertEquals($value, (string) $strategy, 'tostring failure');
    }

    /**
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
        ];
    }

    /**
     * @return array
     */
    public function validDataProvider()
    {
        return [
            ['consensus'],
            ['unanimous'],
            ['affirmative']
        ];
    }
}
