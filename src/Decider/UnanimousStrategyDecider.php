<?php

namespace Milio\StrategyDecider\Decider;

use Milio\StrategyDecider\Exceptions\CanNotProcessStrategyException;
use Milio\StrategyDecider\Strategy\StrategyInterface;
use Milio\StrategyDecider\ValueObjects\Vote;
use Milio\StrategyDecider\Strategy\UnanimousStrategy;

/**
 * Class UnanimousStrategyDecider
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class UnanimousStrategyDecider implements StrategyDeciderInterface
{
    /**
     * {@inheritdoc}
     */
    public function decide($votes, StrategyInterface $strategy)
    {
        if ($strategy instanceof UnanimousStrategy === false) {
            throw new CanNotProcessStrategyException();
        }

        $grant = 0;
        foreach ($votes as $vote) {
            $result = $vote->getVote();

            switch ($result) {
                case Vote::VOTE_NO:
                    return false;
                case Vote::VOTE_YES:
                    ++$grant;
                    break;
            }
        }

        if ($grant > 0) {
            return true;
        }

        return $strategy->getAllowAllAbstain();
    }
}
