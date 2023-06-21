<?php
namespace App\Services\User;
use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;
use MatheusSodre\MicroservicesHttp\Services\Traits\ConsumeExternalService;


class UserService
{
    use ConsumeExternalService;
    protected $url;
    protected $token;
    protected $defaultResponse;
    public function __construct( DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url   = config('microservices.available.micro_auth.url') . '/api';
        $this->token =  request()->header('Authorization');
    }
    
    public function allUser(array $params=[])
    {
        $response = $this->request('get','/user');
        return response()->json(json_decode($response->body()), $response->status());                    
    }
    public function createUser(array $params=[])
    {
        $response = $this->request('post','/user',$params);
        return response()->json(json_decode($response->body()), $response->status());                    
    }
    public function getUser($identify)
    {
        $response = $this->request('get',"/user/{$identify}");
        return response()->json(json_decode($response->body()), $response->status());                    
    }
    public function updateUser(string $identify, array $params = [])
    {
        $response = $this->request('put',"/user/{$identify}",$params);
        return response()->json(json_decode($response->body()), $response->status());                    
    }
    public function deleteUser(string $identify, array $params = [])
    {
        $response = $this->request('delete',"/user/{$identify}");
        return response()->json(json_decode($response->body()), $response->status());                    
    }
    public function addPermissionUser(array $params=[])
    {
        $response = $this->request('post','/user/permission' ,$params);
        return response()->json(json_decode($response->body()), $response->status());                    
    }
}
?>
