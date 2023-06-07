<?php 
namespace App\Services\User;
use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class RegisterService
{
    protected $url;
    protected $http;
    protected $defaultResponse;
    public function __construct( DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url  = config('microservices.available.micro_auth.url') . '/api/register';
        $this->http = Http::acceptJson();
    }

    public function registerUser(array $params=[])
    {
        $response = $this->http->post( $this->url,$params);
        return $this->defaultResponse->response($response);
    }
}

?>