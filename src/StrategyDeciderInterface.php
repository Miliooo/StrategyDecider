<?php

namespace Milio\StrategyDecider;

use Milio\StrategyDecider\ValueObjects\Strategy;
use Milio\StrategyDecider\ValueObjects\Vote;

/**
 * Interface StrategyDeciderInterface
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
interface StrategyDeciderInterface
{
    CONST VOTE_YES = 1;
    CONST VOTE_ABSTAIN = 0;
    CONST VOTE_NO = -1;

    /**
     * Returns true:
     *  - Needs at least one VOTE_YES
     * Returns false:
     *  - When no VOTE_YES
     */
    const STRATEGY_AFFIRMATIVE = 'affirmative';

    /**
     * Returns true:
     *  - one VOTE_YES
     *  - All the votes were VOTE_ABSTAINED
     * Returns false:
     *  - No VOTE_YES AND no VOTE_ABSTAIN
     */
    const STRATEGY_AFFIRMATIVE_OR_ALL_ABSTAIN = 'affirmative_or_all_abstain';


    /**
     * Returns true if we have a majority VOTE_YES OR the votes are equal (not counting abstained votes)
     *
     * eg ['VOTE_ABSTAIN', 'VOTE_ABSTAIN'] => returns true
     */
    const STRATEGY_CONSENSUS_YES = 'consensus_yes';

    /**
     * Returns true if we have a majority VOTE_YES (not counting abstained votes) else returns false.
     */
    const STRATEGY_CONSENSUS_NO = 'consensus_no';

    /**
     * Returns true if all the votes are VOTE_YES (not counting abstained votes) else returns false.
     */
    const STRATEGY_UNANIMOUS = 'unanimous';

    /**
     * Returns true or false depending on the votes and the strategy.
     *
     * @param Vote[]   $votes    An array of vote value objects.
     * @param Strategy $strategy The given strategy
     *
     * @return boolean Depending on the votes and the given strategy.
     */
    public function decide(array $votes, Strategy $strategy);
}
