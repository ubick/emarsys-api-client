<?php

namespace Inviqa\Emarsys\Api\Client;

use Inviqa\Emarsys\Api\Client;

class TestClient implements Client
{
    public function requestAccountSettings()
    {
        return <<< 'EOD'
{
  "replyCode": 0,
  "replyText": "OK",
  "data": {
    "environment": "suite.emarsys.com",
    "timezone": "America/New_York",
    "name": "Heimdall",
    "password_history_queue_size": 3,
    "country": "United States of America"
  }
}
EOD;
    }
}
