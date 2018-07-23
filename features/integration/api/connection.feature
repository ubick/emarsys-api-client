@emarsys
Feature: Ensure API communication with Emarsys
    In order to communicate with the Emarsys API
    I need to make sure the connection is successful

    Scenario: Making a successfull API call
        When I send a GET request to the "settings" endpoint
        Then The HTTP response code should be 200
        And the reply code should be 0
        And the response content should contain the following keys:
            | id          |
            | environment |
            | timezone    |
            | name        |
