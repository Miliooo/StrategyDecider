<?php

namespace Milio\StrategyDecider\ValueObjects;

use Milio\StrategyDecider\StrategyDeciderInterface;

/**
 * Class VoteTest
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class VoteTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @dataProvider invalidDataProvider
     *
     * @expectedException \Milio\StrategyDecider\Exceptions\InvalidVoteException
     */
    public function it_should_throw_InvalidVoteException_when_not_valid_vote_value($voteValue)
    {
        new Vote($voteValue);
    }

    /**
     * @test
     *
     * @dataProvider validDataProvider
     */
    public function it_should_return_valid_votes($voteValue)
    {
        $vote = new Vote($voteValue);
        $this->assertEquals($voteValue, $vote->getVote());
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
            [5],
            [new \stdClass()],
        ];
    }

    /**
     * DataProvider
     *
     * Although one should only use the interface constants this should never change so let's check for the real values too.
     *
     * @return array
     */
    public function validDataProvider()
    {
        return [
            [StrategyDeciderInterface::VOTE_NO],
            [StrategyDeciderInterface::VOTE_YES],
            [StrategyDeciderInterface::VOTE_ABSTAIN],
            [0],
            [-1],
            [1]
        ];
    }
}
