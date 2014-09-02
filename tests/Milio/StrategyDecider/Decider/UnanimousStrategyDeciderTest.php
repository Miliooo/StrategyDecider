<?php

namespace Milio\StrategyDecider\Decider;

use Milio\StrategyDecider\Strategy\UnanimousStrategy;
use Milio\StrategyDecider\ValueObjects\Vote;

/**
 * Class UnanimousStrategyDeciderTest
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class UnanimousStrategyDeciderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @dataProvider dataProvider
     */
    public function it_should_process_the_votes(array $votes, $allowAllAbstain, $result, $msg)
    {
        $strategy = new UnanimousStrategy($allowAllAbstain);
        $decider = new UnanimousStrategyDecider();

        $outcome = $decider->decide($votes, $strategy);

        $this->assertEquals($result, $outcome, $msg);
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return
            [
                [$this->createVoteArray([1, 0, -1]), true, false, 'one VOTE_NO should return false'],
                [$this->createVoteArray([1, 0, -1]), false, false, 'one VOTE_NO should return false'],

                [$this->createVoteArray([1, 0, 0]), true, true, 'one VOTE_YES no VOTE_NO should return true'],
                [$this->createVoteArray([1, 0, 0]), false, true, 'one VOTE_YES no VOTE_NO should return true'],


                [$this->createVoteArray([0, 0, 0]), true, true, 'all VOTE_ABSTAIN when allowed should return true'],
                [$this->createVoteArray([0, 0, 0]), false, false, 'all VOTE_ABSTAIN when not allowed should return false'],
            ];
    }

    /**
     * Helper function to create a vote array.
     *
     * @param array $values (0, -1, 1)
     *
     * @return array
     */
    private function createVoteArray(array $values)
    {
        $votes = [];

        foreach ($values as $value) {
            $votes[] = new Vote($value);
        }

        return $votes;
    }

}
