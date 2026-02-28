<?php

namespace App\Message;

class AnalyzeRiskMessage
{
    public function __construct(
        public int $riskId
    ) {}
}
