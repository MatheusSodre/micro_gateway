<?php
namespace App\Services\User;
use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class UserService
{
    protected $url;
    protected $http;
    protected $defaultResponse;
    public function __construct( DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url  = config('microservices.available.micro_auth.url') . '/api';
        $this->http = Http::acceptJson()
                            ->withHeaders([
                                'Authorization' => request()->header('Authorization')
                            ]);
    }
    
    public function allUser(array $params=[])
    {
        $response = $this->http
                            ->get($this->url . '/user',$params);
        return response()->json(json_decode($response->body()), $response->status());                    
    }
    public function createUser(array $params=[])
    {
        $response = $this->http
                            ->post($this->url . '/user',$params);
        return response()->json(json_decode($response->body()), $response->status());                    
    }
    public function getUser($identify)
    {
        $response = $this->http
                            ->get($this->url . "/user/{$identify}");
        return response()->json(json_decode($response->body()), $response->status());                    
    }
    public function updateUser(string $identify, array $params = [])
    {
        $response = $this->http
                            ->put($this->url . "/user/{$identify}" , $params);
        return response()->json(json_decode($response->body()), $response->status());                    
    }
    public function deleteUser(string $identify, array $params = [])
    {
        $response = $this->http
                            ->delete($this->url . "/user/{$identify}");
        return response()->json(json_decode($response->body()), $response->status());                    
    }
    
    public function addPermissionUser(array $params=[])
    {
        $response = $this->http
                              ->post($this->url . '/user/permission' ,$params);
        return response()->json(json_decode($response->body()), $response->status());                    
    }
}
?>
