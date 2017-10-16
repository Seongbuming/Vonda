<?php
class Http
{
    private $client;

    public function __construct() {
        // Guzzle Client
        $this->client = new GuzzleHttp\Client();
    }

    /**
     * request
     *
     * HTTP 요청 보내기
     *
     * @auth Siyeol
     * @param  String $method
     * @param  String $url
     * @param  Array  $params
     * @return Array
     */
    public function request($method="GET", $url, $params=[])
    {
        try{
            $res = $this->client->request($method, $url, $params);
        } catch (GuzzleHttp\Exception\ServerException $e) {
            // Server Error
        }

        if ($res->getStatusCode() == 200) {
            // return response
            $response = json_decode($res->getBody());

            if ($response->code == 401) {
                // Token Expired
                $_COOKIE['token'] = null;
                
                return false;
            }

            return $response;
        } else {
            // error
        }
    }
}
?>