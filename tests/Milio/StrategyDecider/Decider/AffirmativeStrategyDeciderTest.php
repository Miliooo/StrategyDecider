<?php

namespace Milio\StrategyDecider\Decider;

use Milio\StrategyDecider\ValueObjects\Vote;
use Milio\StrategyDecider\Strategy\AffirmativeStrategy;

/**
 * Class AffirmativeStrategyDeciderTest
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class AffirmativeStrategyDeciderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     *
     * @dataProvider dataProvider
     */
    public function it_should_process_the_votes(array $votes, $allowAllAbstain, $result, $msg)
    {
        $strategy = new AffirmativeStrategy($allowAllAbstain);
        $decider = new AffirmativeStrategyDecider();

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
                [$this->createVoteArray([1, 0, -1]), true, true, 'one VOTE_YES should return true'],
                [$this->createVoteArray([-1, -1, -1]), true, false, 'not a single VOTE_YES should return false'],
                [$this->createVoteArray([0, 0, 0]), true, true, 'all VOTE_ABSTAIN when allowed all vote abstain should return true'],
                [$this->createVoteArray([0, 0]), false, false, 'all VOTE_ABSTAIN when not allowed all vote abstain should return false']
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
