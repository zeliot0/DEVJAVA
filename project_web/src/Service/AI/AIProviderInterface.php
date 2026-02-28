<?php

namespace App\Service\AI;

interface AIProviderInterface
{
    /**
     * Analyze a natural-language prompt and return parsed result as an associative array.
     *
     * @param string $prompt
     * @return array
     */
    public function analyze(string $prompt): array;
}
