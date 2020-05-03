<?php

namespace EasyMVC;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;

/**
 * Class HttpRequest (PHP version 7.1)
 *
 * @author      Rudy Mas <rudy.mas@rmsoft.be>
 * @copyright   2016-2018, rmsoft.be. (http://www.rmsoft.be/)
 * @license     https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3 (GPL-3.0)
 * @version     1.5.0.19
 * @package     EasyMVC\HttpRequest
 */
class HttpRequest
{
    private $httpClient;
    private $baseUri = '';

    /**
     * HttpRequest constructor.
     */
    public function __construct()
    {
        $this->httpClient = new Client();
    }

    /**
     * @param string $url
     * @param string|null $username
     * @param string|null $password
     * @return Response
     * @throws GuzzleException
     */
    public function get(string $url, string $username = null, string $password = null): Response
    {
        try {
            $response = $this->httpClient->request('GET', $this->baseUri . $url, [
                'auth' => [$username, $password]
            ]);
        } catch (GuzzleException $e) {
            throw $e;
        }
        return $response;
    }

    /**
     * @param string $url
     * @param string $body
     * @param string|null $username
     * @param string|null $password
     * @param string $contentType
     * @return Response
     * @throws GuzzleException
     */
    public function post(string $url, string $body, string $username = null, string $password = null, string $contentType = 'application/json'): Response
    {
        try {
            $response = $this->httpClient->request('POST', $this->baseUri . $url, [
                'auth' => [$username, $password],
                'headers' => ['Content-Type' => $contentType, 'accept' => $contentType],
                'body' => $body
            ]);
        } catch (GuzzleException $e) {
            throw $e;
        }
        return $response;
    }

    /**
     * @param string $url
     * @param string $body
     * @param string|null $username
     * @param string|null $password
     * @param string $contentType
     * @return Response
     * @throws GuzzleException
     */
    public function put(string $url, string $body, string $username = null, string $password = null, string $contentType = 'application/json'): Response
    {
        try {
            $response = $this->httpClient->request('PUT', $this->baseUri . $url, [
                'auth' => [$username, $password],
                'headers' => ['content-type' => $contentType, 'accept' => $contentType],
                'body' => $body
            ]);
        } catch (GuzzleException $e) {
            throw $e;
        }
        return $response;
    }

    /**
     * @param string $url
     * @param string $body
     * @param string|null $username
     * @param string|null $password
     * @param string $contentType
     * @return Response
     * @throws GuzzleException
     */
    public function patch(string $url, string $body, string $username = null, string $password = null, string $contentType = 'application/json'): Response
    {
        try {
            $response = $this->httpClient->request('PATH', $this->baseUri . $url, [
                'auth' => [$username, $password],
                'headers' => ['content-type' => $contentType, 'accept' => $contentType],
                'body' => $body
            ]);
        } catch (GuzzleException $e) {
            throw $e;
        }
        return $response;
    }

    /**
     * @param string $url
     * @param string|null $username
     * @param string|null $password
     * @return Response
     * @throws GuzzleException
     */
    public function delete(string $url, string $username = null, string $password = null): Response
    {
        try {
            $response = $this->httpClient->request('DELETE', $this->baseUri . $url, [
                'auth' => [$username, $password]
            ]);
        } catch (GuzzleException $e) {
            throw $e;
        }
        return $response;
    }

    /**
     * @return string
     */
    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    /**
     * @param string $baseUri
     */
    public function setBaseUri(string $baseUri): void
    {
        $this->baseUri = $baseUri;
    }
}
