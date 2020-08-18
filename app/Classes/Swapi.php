<?php

namespace App\Classes;

use GuzzleHttp;

class Swapi
{
    /**
     * URL for the endpoint.
     *
     * @var string
     */
    private $url;

    /**
     * @var GuzzleHttp\Client
     */
    private $client;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        $this->client = new GuzzleHttp\Client;

        $this->url = 'https://swapi.dev/api/';
    }

    /**
     * Import data from the API, we're using the same code for detailed and list function as the API endpoint are all the same.
     *
     * @param         $endpoint
     *
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function import($endpoint)
    {
        if ( ! in_array($endpoint, $this->apiEndpoints()))
        {
            return redirect('/')->with('failure', 'Endpoint does not exsist! please, try again or contact our system administrator.');
        }

        $result = [];

        $data  = json_decode($this->getDatafromTheApi($endpoint));
        $pages = ceil($data->count / count($data->results));

        for ($page = 1; $page <= $pages; $page++)
        {
            $data   = json_decode($this->getDatafromTheApi($endpoint, $page));
            $result = array_merge($result, $data->results);
        }

        return $result;
    }

    /**
     * @param         $endpoint
     * @param   null  $page
     *
     * @return array|\Psr\Http\Message\StreamInterface
     */
    private function getDatafromTheApi($endpoint, $page = null)
    {
        if ( ! empty($page))
        {
            $endpoint = $endpoint . '/?page=' . $page;
        }

        $result = $this->client->get($this->url . $endpoint);

        return $result->getStatusCode() == 200 ? $result->getBody() : [];
    }

    /**
     * Available endpioint in this script.
     * There are more available but we don't want them for this test. So they may NOT being called at all.
     *
     * @return string[]
     */
    private function apiEndpoints()
    {
        return [
            'people',
            'planets',
            'species',
        ];
    }
}
