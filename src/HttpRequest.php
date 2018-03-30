<?php

namespace EasyMVC\HttpRequest;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Class HttpRequest (PHP version 7.1)
 *
 * @author      Rudy Mas <rudy.mas@rmsoft.be>
 * @copyright   2016-2018, rmsoft.be. (http://www.rmsoft.be/)
 * @license     https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3 (GPL-3.0)
 * @version     1.4.0
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
     */
    public function get(string $url, string $username = null, string $password = null): Response
    {
        $response = $this->httpClient->request('GET', $this->baseUri . $url, [
            'auth' => [$username, $password]
        ]);
        return $response;
    }

    /**
     * @param string $url
     * @param string $body
     * @param string|null $username
     * @param string|null $password
     * @return Response
     */
    public function post(string $url, string $body, string $username = null, string $password = null): Response
    {
        $response = $this->httpClient->request('POST', $this->baseUri . $url, [
            'auth' => [$username, $password],
            'headers' => ['Content-Type' => 'application/json', 'accept' => 'application/json'],
            'body' => $body
        ]);
        return $response;
    }

    /**
     * @param string $url
     * @param string $body
     * @param string|null $username
     * @param string|null $password
     * @return Response
     */
    public function put(string $url, string $body, string $username = null, string $password = null): Response
    {
        $response = $this->httpClient->request('PUT', $this->baseUri . $url, [
            'auth' => [$username, $password],
            'headers' => ['content-type' => 'application/json', 'accept' => 'application/json'],
            'body' => $body
        ]);
        return $response;
    }

    /**
     * @param string $url
     * @param string $body
     * @param string|null $username
     * @param string|null $password
     * @return Response
     */
    public function patch(string $url, string $body, string $username = null, string $password = null): Response
    {
        $response = $this->httpClient->request('PATH', $this->baseUri . $url, [
            'auth' => [$username, $password],
            'headers' => ['content-type' => 'application/json', 'accept' => 'application/json'],
            'body' => $body
        ]);
        return $response;
    }

    /**
     * @param string $url
     * @param string|null $username
     * @param string|null $password
     * @return Response
     */
    public function delete(string $url, string $username = null, string $password = null): Response
    {
        $response = $this->httpClient->request('DELETE', $this->baseUri . $url, [
            'auth' => [$username, $password]
        ]);
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
    public function setBaseUri(string $baseUri) : void
    {
        $this->baseUri = $baseUri;
    }
}

/** End of File: HttpRequest.php **/