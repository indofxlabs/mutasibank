<?php

namespace Indofx\Mutasibank;

use Aslam\Response\ConnectionException;
use Aslam\Response\RequestException;
use Aslam\Response\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use Indofx\Mutasibank\Traits\MutasibankAPI;

class Mutasibank
{
    use MutasibankAPI;

    /**
     * Send the request to the given URL.
     *
     * @param  string $httpMethod
     * @param  array $data
     * @return \Aslam\Response\Response
     *
     * @throws \Aslam\Response\RequestException
     */
    public function send(string $httpMethod, string $endpoint, array $options = [])
    {
        try {
            return tap(
                new Response(
                    $this->buildClient($options)->request($httpMethod, $endpoint)
                ),
                function ($response) {
                    if (!$response->successful()) {
                        $response->throw();
                    }
                }
            );

        } catch (ConnectException $exception) {
            throw new ConnectionException($exception->getMessage(), 0, $exception);
        } catch (RequestException $exception) {
            return $exception->response;
        }
    }

    /**
     * Build the Guzzle client.
     *
     * @return \GuzzleHttp\Client
     */
    public function buildClient(array $options)
    {
        $options = array_merge([
            'http_errors' => false,
            'base_uri' => config('mutasibank.url'),
            'headers' => [
                'Authorization' => config('mutasibank.token'),
            ],
        ], $options);

        return new Client($options);
    }
}
