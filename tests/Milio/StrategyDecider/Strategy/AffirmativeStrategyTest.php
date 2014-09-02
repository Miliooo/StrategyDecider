<?php

namespace Milio\StrategyDecider\Strategy;

/**
 * Class AffirmativeStrategyTest
 *
 * @author Michiel Boeckaert <boeckaert@gmail.com>
 */
class AffirmativeStrategyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_should_implement_the_interface()
    {
        $this->assertInstanceOf('Milio\StrategyDecider\Strategy\StrategyInterface', new AffirmativeStrategy());
    }

    /**
     * @test
     */
    public function test_get_name()
    {
        $strategy = new AffirmativeStrategy();
        $this->assertEquals(StrategyInterface::STRATEGY_AFFIRMATIVE, $strategy->getName());
    }

    /**
     * @test
     */
    public function allow_all_abstain_defaults_to_false()
    {
        $strategy = new AffirmativeStrategy();
        $this->assertFalse($strategy->getAllowAllAbstain());
    }

    /**
     * @test
     */
    public function it_should_be_able_to_set_the_allowed_all_abstain_setting()
    {
        $strategy = new AffirmativeStrategy(true);
        $this->assertTrue($strategy->getAllowAllAbstain());

        $strategy = new AffirmativeStrategy(false);
        $this->assertFalse($strategy->getAllowAllAbstain());
    }
}
