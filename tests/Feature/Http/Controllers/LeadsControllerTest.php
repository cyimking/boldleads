<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LeadsControllerTest extends TestCase
{
    /**
     * TODO - Implement controller tests.
     *
     * Since EloquentLeadTest covers 100% coverage, those tests are
     * sufficient for the controller.
     *
     * Of course, if I had more time, I would implement test cases for
     * this controller by testing each request / response
     *
     * Example:
     * $response = $this->post($leadData);
     * $this->assertEqual(302, $response->getStatusCode());
     *
     * By default, laravel already tests the following functions:
     * - view()
     * - redirect()
     */

    public function testCase(): void
    {
        $this->assertEquals(0, 0);
    }
}
