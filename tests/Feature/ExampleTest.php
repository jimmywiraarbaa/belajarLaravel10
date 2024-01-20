<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        // untuk mengetest suatu yang besar seperti mengetes halaman register
        $response = $this->get('/');

        $response->assertOk();
    }
}
