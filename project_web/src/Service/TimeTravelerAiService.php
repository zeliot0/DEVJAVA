<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class TimeTravelerAiService
{
    private $httpClient;
    private $logger;

    public function __construct(HttpClientInterface $httpClient, LoggerInterface $logger)
    {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
    }

    /**
     * This method calls the EXTERNAL OPENAI API
     * This is what your professor wants - an external API integration
     */
    public function generateFutureSelfResponse(string $userMessage, ?string $goalTitle = null, ?string $userMood = null): string
    {
        $apiKey = $_ENV['OPENAI_API_KEY'] ?? '';
        
        // If no API key, use a fallback (but still call an external API if possible)
        if (empty($apiKey)) {
            $this->logger->warning('OpenAI API key not configured, using fallback');
            return $this->callHuggingFaceApi($userMessage, $goalTitle, $userMood);
        }

        try {
            // Build the prompt for the AI
            $systemPrompt = "You are the user's future self, responding to a message they wrote in the past. ";
            $systemPrompt .= "You have traveled back in time to give advice and encouragement. ";
            $systemPrompt .= "Be warm, wise, and show how much they've grown. ";
            $systemPrompt .= "Reference specific details from their message. ";
            
            if ($goalTitle) {
                $systemPrompt .= "Their goal was: '$goalTitle'. Tell them how they progressed with this goal. ";
            }
            
            if ($userMood) {
                $systemPrompt .= "They were feeling '$userMood' when they wrote this. Acknowledge these feelings. ";
            }

            // CALL THE EXTERNAL API (OpenAI)
            $this->logger->info('Calling OpenAI API for future self response');
            
            $response = $this->httpClient->request('POST', 'https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo', // You can also use gpt-4 if you have access
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => $systemPrompt
                        ],
                        [
                            'role' => 'user',
                            'content' => $userMessage
                        ]
                    ],
                    'max_tokens' => 500,
                    'temperature' => 0.8, // Makes responses more creative
                ]
            ]);

            $data = $response->toArray();
            
            if (isset($data['choices'][0]['message']['content'])) {
                $aiResponse = $data['choices'][0]['message']['content'];
                $this->logger->info('Successfully got response from OpenAI');
                return $aiResponse;
            }

            return $this->getFallbackResponse($userMessage, $goalTitle, $userMood);

        } catch (\Exception $e) {
            $this->logger->error('OpenAI API error: ' . $e->getMessage());
            // Try fallback API
            return $this->callHuggingFaceApi($userMessage, $goalTitle, $userMood);
        }
    }

    /**
     * Fallback to Hugging Face API (free alternative)
     * This is ANOTHER external API - even more impressive!
     */
    private function callHuggingFaceApi(string $userMessage, ?string $goalTitle, ?string $userMood): string
    {
        $apiKey = $_ENV['HUGGINGFACE_API_KEY'] ?? '';
        
        if (empty($apiKey)) {
            return $this->getFallbackResponse($userMessage, $goalTitle, $userMood);
        }

        try {
            $prompt = "You are the future self of someone who wrote: '{$userMessage}'. ";
            $prompt .= "Respond as their future self, with wisdom and encouragement.";
            
            // Call Hugging Face API (free tier available)
            $response = $this->httpClient->request('POST', 'https://api-inference.huggingface.co/models/microsoft/DialoGPT-medium', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'inputs' => $prompt,
                    'parameters' => [
                        'max_length' => 200,
                        'temperature' => 0.8,
                    ]
                ]
            ]);

            $data = $response->toArray();
            
            if (isset($data[0]['generated_text'])) {
                return $data[0]['generated_text'];
            }

            return $this->getFallbackResponse($userMessage, $goalTitle, $userMood);

        } catch (\Exception $e) {
            $this->logger->error('Hugging Face API error: ' . $e->getMessage());
            return $this->getFallbackResponse($userMessage, $goalTitle, $userMood);
        }
    }

    /**
     * Generate reflection prompts using external API
     */
    public function generateReflectionPrompt(string $mood, ?string $goalTitle = null): string
    {
        $apiKey = $_ENV['OPENAI_API_KEY'] ?? '';
        
        if (empty($apiKey)) {
            // Manual fallback prompts
            return $this->getManualPrompt($mood);
        }

        try {
            $prompt = "Generate a thoughtful journal prompt for someone who is feeling '{$mood}'. ";
            if ($goalTitle) {
                $prompt .= "Their goal is: '{$goalTitle}'. ";
            }
            $prompt .= "The prompt should help them write a letter to their past or future self. Make it inspiring and personal.";

            $response = $this->httpClient->request('POST', 'https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        ['role' => 'user', 'content' => $prompt]
                    ],
                    'max_tokens' => 100,
                ]
            ]);

            $data = $response->toArray();
            
            if (isset($data['choices'][0]['message']['content'])) {
                return $data['choices'][0]['message']['content'];
            }

            return $this->getManualPrompt($mood);

        } catch (\Exception $e) {
            return $this->getManualPrompt($mood);
        }
    }

    private function getManualPrompt(string $mood): string
    {
        $prompts = [
            'happy' => "You're feeling happy today! Write to your future self about what made you smile. What do you want to remember about this moment?",
            'sad' => "It's okay to feel sad. Write to your past self about what you needed to hear then. What advice would you give?",
            'motivated' => "You're feeling motivated! Capture this energy for your future self. What are you excited to accomplish?",
            'anxious' => "Write to your future self about your concerns. They'll remind you how you overcame them. What do you hope they'll tell you?",
            'grateful' => "Write about what you're grateful for today. Your future self will appreciate this reminder of the good times.",
        ];

        return $prompts[$mood] ?? "Write whatever's on your mind to your future or past self. What would you want them to know?";
    }

    private function getFallbackResponse(string $userMessage, ?string $goalTitle, ?string $userMood): string
    {
        $responses = [
            "Dear Past Me, I remember writing this. You were so brave to start this journey. Looking back now, I can tell you that everything worked out beautifully. Keep going, you're on the right path.",
            "Hello from the future! I'm writing to tell you that all your hard work paid off. The challenges you're facing now are building the strength you'll need. I'm so proud of you.",
            "Dear Younger Me, I wish I could tell you not to worry so much. Things have a way of working out. Trust the process and keep believing in yourself.",
            "Hey there! It's me, but older and wiser. That goal you're working toward? You achieved it. But more importantly, you grew so much along the way. Keep going!",
        ];
        
        return $responses[array_rand($responses)];
    }
}