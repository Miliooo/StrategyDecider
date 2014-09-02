<?php

namespace Milio\StrategyDecider\ValueObjects;

use Milio\StrategyDecider\Exceptions\InvalidVoteException;

/**
 * This value objects makes sure the votes are valid.
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class Vote
{
    CONST VOTE_YES = 1;
    CONST VOTE_ABSTAIN = 0;
    CONST VOTE_NO = -1;

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
                    self::VOTE_YES,
                    self::VOTE_ABSTAIN,
                    self::VOTE_NO,
                ],
                true
            )
        ) {
            throw new InvalidVoteException();
        }
    }
}
