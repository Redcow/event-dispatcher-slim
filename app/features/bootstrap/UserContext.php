<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class UserContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I have the following email :mailAddress
     */
    public function iHaveTheFollowingEmail($mailAddress)
    {
        throw new PendingException();
    }

    /**
     * @When I try to create an account
     */
    public function iTryToCreateAnAccount()
    {
        throw new PendingException();
    }

    /**
     * @Then I get the message :message
     */
    public function iGetTheMessage($message)
    {
        throw new PendingException();
    }
}
