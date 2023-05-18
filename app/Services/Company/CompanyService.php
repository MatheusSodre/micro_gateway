<?php 
namespace App\Services\Company;
use App\Http\Utils\DefaultResponse;
use Illuminate\Support\Facades\Http;

class CompanyService
{
    protected $url;
    protected $http;
    protected $defaultResponse;
    public function __construct( DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
        $this->url = config('microservices.available.micro_01.url') . '/api/companies';
        $this->http = Http::acceptJson();

    }

    public function getAllCompanies(array $params=[])
    {
        $response = $this->http->get( $this->url,$params);
        return $this->defaultResponse->response($response);
    }

    public function newCompany(array $params=[])
    {
        $response = $this->http->post( $this->url,$params);
        return $this->defaultResponse->response($response);
    }

    public function getCompanyId($id)
    {
        $response = $this->http->get( $this->url . '/' .$id);
        return json_decode($response->body(),$response->status());
    }

    public function updateCompanyId($id,$params)
    {
        $response = $this->http->delete($this->url. '/' . $id,$params);
        return Response()->json(json_decode($response->body()), $response->status());
    }

    public function deleteCompany($id)
    {
        $response = $this->http->delete($this->url. '/' . $id);
        return Response()->json(json_decode($response->body()),$response->status());
    }
}

?>
