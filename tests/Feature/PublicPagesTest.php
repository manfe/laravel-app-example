<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    public function testHomePage() {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

}
