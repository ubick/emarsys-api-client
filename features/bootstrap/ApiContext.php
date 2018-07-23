<?php

use Behat\Behat\Context\Context;

class ApiContext implements Context
{
    /**
     * @When I send a GET request to the :arg1 endpoint
     */
    public function iSendAGetRequestToTheEndpoint($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then The HTTP response code should be :arg1
     */
    public function theHttpResponseCodeShouldBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the reply code should be :arg1
     */
    public function theReplyCodeShouldBe($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then the response content should contain the following keys:
     */
    public function theResponseContentShouldContainTheFollowingKeys(TableNode $table)
    {
        throw new PendingException();
    }
}
