<?php

namespace Tests\Feature;

use Tests\TestCase;

class SummaryInformationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        //test for company
        // $response = $this->get('/http://127.0.0.1:8000/api/companyData');

        //test for user
        $response = $this->get('/http://127.0.0.1:8000/api/userData');


        $response->assertStatus(200);
    }
}
