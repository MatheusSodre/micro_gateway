<?php
namespace App\Services\User;
use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class AuthService
{
    protected $url;
    protected $http;
    protected $defaultResponse;
    public function __construct( DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url  = config('microservices.available.micro_auth.url') ;
        $this->http = Http::acceptJson();
    }

    public function authUser(array $params=[])
    {
        $response = $this->http
                            ->post($this->url . '/api/auth',$params);
        return response()->json(json_decode($response), $response->status());
    }

    public function getMe(array $headers)
    {
        $response = $this->http
                            ->withHeaders($headers)
                            ->get($this->url . '/api/me');
        return response()->json(json_decode($response), $response->status());
    }
    public function logout(array $headers)
    {
        $response = $this->http
                            ->withHeaders($headers)
                            ->post($this->url . '/api/logout');
        
        return response()->json(json_decode($response), $response->status());
    }
}

?>
