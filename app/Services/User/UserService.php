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
        $this->url  = config('microservices.available.micro_auth.url') . '/api/user';
        $this->http = Http::acceptJson()
                            ->withHeaders([
                                'Authorization' => request()->header('Authorization')
                            ]);
    }

    public function addPermissionUser(array $params=[])
    {
        $response = $this->http
                              ->post($this->url . '/permission' ,$params);
        return json_decode($response->body());
    }
}
?>
