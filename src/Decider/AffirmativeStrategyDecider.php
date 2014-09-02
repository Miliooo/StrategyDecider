<?php

namespace Milio\StrategyDecider\Decider;

use Milio\StrategyDecider\Exceptions\CanNotProcessStrategyException;
use Milio\StrategyDecider\Strategy\StrategyInterface;
use Milio\StrategyDecider\Strategy\AffirmativeStrategy;
use Milio\StrategyDecider\ValueObjects\Vote;

/**
 * Class AffirmativeStrategyDecider
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class AffirmativeStrategyDecider implements StrategyDeciderInterface
{
    /**
     * {@inheritdoc}
     */
    public function decide($votes, StrategyInterface $strategy)
    {
        if ($strategy instanceof AffirmativeStrategy === false) {
            throw new CanNotProcessStrategyException();
        }

        $deny = 0;
        foreach ($votes as $vote) {

            $result = $vote->getVote();

            switch ($result) {
                case Vote::VOTE_YES:
                    return true;

                case Vote::VOTE_NO:
                    ++$deny;
                    break;
            }
        }

        //there were deny votes
        if ($deny > 0) {
            return false;
        }

        return $strategy->getAllowAllAbstain();
    }
}
