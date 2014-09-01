<?php

namespace Milio\StrategyDecider\ValueObjects;

use Milio\StrategyDecider\StrategyDeciderInterface;
use Milio\StrategyDecider\Exceptions\InvalidVoteException;

/**
 * This value objects makes sure the votes are valid.
 *
 * Votes should be one of the VOTE class constants found in StrategyDeciderInterface
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class Vote
{
    /**
     * @var string A valid vote
     */
    private $vote;

    /**
     * Constructor.
     *
     * @param string $vote
     */
    public function __construct($vote)
    {
        $this->guardValidVote($vote);

        $this->vote = $vote;
    }

    /**
     * @return string
     */
    public function getVote()
    {
        return (integer) $this->vote;
    }

    /**
     * @param $vote
     *
     * @throws InvalidVoteException
     */
    private function guardValidVote($vote)
    {
        if (
            false === is_numeric($vote)
            ||
            false === in_array
            (
                $vote,
                [
                    StrategyDeciderInterface::VOTE_YES,
                    StrategyDeciderInterface::VOTE_ABSTAIN,
                    StrategyDeciderInterface::VOTE_NO,
                ],
                true
            )
        ) {
            throw new InvalidVoteException();
        }
    }
}
