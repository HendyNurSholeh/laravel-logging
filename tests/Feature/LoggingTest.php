<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLog(): void
    {
        $response = $this->get('/');
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error");
        Log::critical("Hello Critical");

        self::assertTrue(true);
    }

    public function testContext(): void{
        Log::info("Hello Info", ['context' => ['user' => 'hendy']]);
        Log::warning("Hello Warning", ['context' => ['user' => 'hendy']]);
        self::assertTrue(true);
    }

    public function withContext(): void{
        Log::withContext(['user' => 'hendy']);
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        self::assertTrue(true);
    }

    /**
     * @test
     */
    public function testLogChannel(): void{
        $logSdrr = Log::channel("single");
        $logSdrr->info("Hello Info");
        $logSdrr->warning("Hello Warning");
        $logSdrr->error("Hello Error");
        Log::info("Hello Info to default channel");
        self::assertTrue(true);
    }
}