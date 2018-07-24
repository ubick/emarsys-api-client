<?php

namespace Inviqa\Emarsys;

class EmarsysResponse
{
    private $replyCode;

    private $replyText;

    private $data;

    public function __construct(
        string $replyCode,
        string $replyText,
        array $data = []
    ) {
        $this->replyCode = $replyCode;
        $this->replyText = $replyText;
        $this->data = $data;
    }

    public function getReplyCode(): string
    {
        return $this->replyCode;
    }

    public function getReplyText(): string
    {
        return $this->replyText;
    }

    public function getJsonEncodedData(): array
    {
        return $this->data;
    }
}
