<?php
// src/Service/QuoteService.php

namespace App\Service;

class Quotes
{
    private array $frenchQuotes = [
        [
            'text' => "Le succès, c'est tomber sept fois et se relever huit.",
            'author' => "Proverbe japonais",
            'type' => 'french',
            'icon' => '🇫🇷',
            'views' => 0
        ],
        [
            'text' => "La seule limite à notre réalisation de demain sera nos doutes d'aujourd'hui.",
            'author' => "Franklin D. Roosevelt",
            'type' => 'french',
            'icon' => '🇫🇷',
            'views' => 0
        ],
        [
            'text' => "Ne remets pas à demain ce que tu peux faire aujourd'hui.",
            'author' => "Proverbe français",
            'type' => 'french',
            'icon' => '🇫🇷',
            'views' => 0
        ],
        [
            'text' => "Chaque accomplissement commence par la décision d'essayer.",
            'author' => "John F. Kennedy",
            'type' => 'french',
            'icon' => '🇫🇷',
            'views' => 0
        ]
    ];

    private array $quranQuotes = [
        [
            'text' => "Indeed, with hardship comes ease.",
            'arabicText' => "إِنَّ مَعَ الْعُسْرِ يُسْرًا",
            'translation' => "Certes, avec la difficulté vient la facilité.",
            'reference' => "Sourate Ash-Sharh, 94:6",
            'type' => 'quran',
            'icon' => '🕌',
            'views' => 0
        ],
        [
            'text' => "But perhaps you hate a thing and it is good for you.",
            'arabicText' => "وَعَسَىٰ أَن تَكْرَهُوا شَيْئًا وَهُوَ خَيْرٌ لَّكُمْ",
            'translation' => "Mais il se peut que vous détestiez une chose alors qu'elle est un bien pour vous.",
            'reference' => "Sourate Al-Baqarah, 2:216",
            'type' => 'quran',
            'icon' => '🕌',
            'views' => 0
        ],
        [
            'text' => "Allah does not charge a soul except with that within its capacity.",
            'arabicText' => "لَا يُكَلِّفُ اللَّهُ نَفْسًا إِلَّا وُسْعَهَا",
            'translation' => "Allah n'impose à aucune âme une charge supérieure à sa capacité.",
            'reference' => "Sourate Al-Baqarah, 2:286",
            'type' => 'quran',
            'icon' => '🕌',
            'views' => 0
        ]
    ];

    public function getDailyQuote(): array
    {
        // Utiliser le jour de l'année pour changer quotidiennement
        $dayOfYear = (int) date('z');
        
        return [
            'french' => $this->frenchQuotes[$dayOfYear % count($this->frenchQuotes)],
            'quran' => $this->quranQuotes[$dayOfYear % count($this->quranQuotes)]
        ];
    }

    public function getRandomQuote(): array
    {
        return [
            'french' => $this->frenchQuotes[array_rand($this->frenchQuotes)],
            'quran' => $this->quranQuotes[array_rand($this->quranQuotes)]
        ];
    }
}