<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\company;

class CompanyDetailsTest extends TestCase
{
    public function test_company_have_details_to_view_more(): void
    {

        // $id = 26;
        // $company = Company::find($id);
        // $response = $this->get('/api/company_details/'.$id);
        // $response->assertStatus(200);
        // $response->assertJson([
        //     'data' => [
        //         'id' => $company->id,
        //         'name' => $company->name,
        //         'keywords' => $company->keywords,
        //         'country' => $company->country,
        //         'web_address'=> $company->web_address,
        //         'more_info'=> $company->more_info,   //description         
        //         'category_id' => $company->category_id,
        //         'subcategory_id' => $company->subcategory_id,
        //         'profile_picture' => $company -> profile_picture,
        //         'membership' => $company -> membership
        //     ]
        // ]);
        
        $response = $this->get('/api/company_details/26');

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                [
                    'id' => 26,
                    'name' => 'Schaefer and Sons',
                    'keywords' => 'suscipit sapiente occaecati',
                    'country' => 'Angola',
                    'web_address' => 'http://www.ferry.com/voluptatum-vel-voluptates-beatae-voluptatum-porro',
                    'more_info' => 'voluptatum esse veniam',
                    'profile_picture' => 'https://via.placeholder.com/640x480.png/00ff55?text=company+Faker+commodi',
                    'membership' => 'ullam corrupti fugiat',
                    'category' => 'Others',
                    'subcategory' => 'Limited by Guarante', 
                ]
            ]
        ]);
    }
}