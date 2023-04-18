<?php

namespace Tests\Feature\Company;

use App\Models\Company\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected $endpoint = '/api/categories';
    /**
     * Validar se está criando a category correto.
     * @return void
     */
    public function test_get_all_category()
    {
        Category::factory()->count(6)->create();

        $response = $this->getJson($this->endpoint);
        $response->assertJsonCount(6,'data');
        $response->assertStatus(200);
    }
    /**
     * Validar se GET está retornando erro para uma caterory.
     * @return void
     */
    public function test_get_error_single_category()
    {
        $category = 9999;
        $response = $this->getJson("{$this->endpoint}/{$category}");
        $response->assertStatus(404);
    }
    /**
     * Validar se GET está  correto para uma caterory.
     * @return void
     */
    public function test_get_single_category()
    {
        $category = Category::factory()->create();

        $response = $this->getJson("{$this->endpoint}/{$category->id}");
        $response->assertStatus(200);
    }

    /**
     * Validar se POST store está  retornando "422 validation" para uma caterory.
     * @return void
     */
    public function test_validations_store_category()
    {
        $category = Category::factory()->create();

        $response = $this->postJson($this->endpoint,[
            'title' => '',
            'description'=>''
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
        

        $response = $this->postJson($this->endpoint,[
            'title' => 'Category 01',
            'description'=>'Description of category'
        ]);
        // return 201 criar category 
        $response->assertStatus(201);
    }

    /**
     * Validar se PUT está atualizadno uma caterory.
     * @return void
     */
    public function test_update_category()
    {
        $category = Category::factory()->create();
        
        $data =[
            'title' => 'Title updated',
            'description' => 'Description Category'
        ];
        $response = $this->putJson("{$this->endpoint}/999",$data);
        $response->assertStatus(500);

        $response = $this->putJson("$this->endpoint/{$category->id}",[]);
        $response->assertStatus(422);

        $response = $this->putJson("$this->endpoint/{$category->id}",$data);
        $response->assertStatus(200);
    }

    /**
     * Validar se PUT está atualizadno uma caterory.
     * @return void
     */
    public function test_delete_category()
    {
        $category = Category::factory()->create();
        
        $response = $this->deleteJson("$this->endpoint/999");
        $response->assertStatus(500);

        $response = $this->deleteJson("$this->endpoint/{$category->id}");
        $response->assertStatus(204);
    }
}
