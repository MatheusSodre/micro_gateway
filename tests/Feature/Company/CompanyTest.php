<?php

namespace Tests\Feature\Company;

use App\Models\Company\Category;
use App\Models\Company\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    protected $endpoint = '/api/companies';
    /**
     * Validar se está criando a company correto.
     * @return void
     */
    public function test_get_all_company()
    {
        Company::factory()->count(3)->create();

        $response = $this->getJson($this->endpoint);
        $response->assertJsonCount(3,'data');
        $response->assertStatus(200);
    }
    /**
     * Validar se GET está retornando erro para uma company.
     * @return void
     */
    public function test_get_error_single_company()
    {
        $company = 9999;
        $response = $this->getJson("{$this->endpoint}/{$company}");
        $response->assertStatus(404);
    }
    /**
     * Validar se GET está  correto para uma company.
     * @return void
     */
    public function test_get_single_category()
    {
        $company = Company::factory()->create();

        $response = $this->getJson("{$this->endpoint}/{$company->id}");
        $response->assertStatus(200);
    }

    /**
     * Validar se POST store está  retornando "422 validation" para uma company.
     * @return void
     */
    public function test_validations_store_category()
    {
    
        $response = $this->postJson($this->endpoint,[
            'category_id' => '',
            'name'        => '', 
            'phone'       => '',
            'whatsapp'    => '',
            'email'       => '',
        ]);
        // return 422 validação 
        $response->assertStatus(422);
    }

    /**
     * Validar se POST store está ok 201 created.
     * @return void
     */
    public function test_store_category()
    {
        $category = Category::factory()->create();

        $response = $this->postJson($this->endpoint,[
            'category_id' => $category->id,
            'name'        => 'Company Teste', 
            'phone'       => '9999999999',
            'whatsapp'    => '9999999999',
            'email'       => 'company@teste.com',
        ]);
        // return 201 criar Company 
        $response->assertStatus(201);
    }

    /**
     * Validar se PUT está atualizadno uma company.
     * @return void
     */
    public function test_update_company()
    {
        $category = Category::factory()->create();
        $company  = Company::factory()->create();
        
        $data =[
            'category_id' => $category->id,
            'name'        => 'Company Teste', 
            'phone'       => '9999999999',
            'whatsapp'    => '9999999999',
            'email'       => 'company@teste.com',
        ];
        $response = $this->putJson("{$this->endpoint}/999",$data);
        $response->assertStatus(500);

        $response = $this->putJson("$this->endpoint/{$company->id}",[]);
        $response->assertStatus(422);

        $response = $this->putJson("$this->endpoint/{$company->id}",$data);
        $response->assertStatus(200);
    }

    /**
     * Validar se PUT está atualizadno uma company.
     * @return void
     */
    public function test_delete_company()
    {
        $category = Company::factory()->create();
        
        $response = $this->deleteJson("$this->endpoint/999");
        $response->assertStatus(500);

        $response = $this->deleteJson("$this->endpoint/{$category->id}");
        $response->assertStatus(204);
    }
}
