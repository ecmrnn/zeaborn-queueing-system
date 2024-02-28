<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class SendAppointmentTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_greets_visitor(): void
    {
        $response = $this->get('/appointment');

        $response->assertSee('Good Morning!');
    }
}
