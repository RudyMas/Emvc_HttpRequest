<?php

namespace EasyMVC;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class HttpRequest (PHP version 5.6)
 *
 * @author Rudy Mas <rudy.mas@rmsoft.be>
 * @copyright 2016-2021, rmsoft.be. (http://www.rmsoft.be/)
 * @license https://opensource.org/licenses/GPL-3.0 GNU General Public License, version 3 (GPL-3.0)
 * @version 5.6.1.0
 * @package EasyMVC
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
     * @param $url
     * @param null $username
     * @param null $password
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function get($url, $username = null, $password = null)
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
     * @param $url
     * @param $body
     * @param null $username
     * @param null $password
     * @param string $contentType
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function post($url, $body, $username = null, $password = null, $contentType = 'application/json')
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
     * @param $url
     * @param $body
     * @param null $username
     * @param null $password
     * @param string $contentType
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function put($url, $body, $username = null, $password = null, $contentType = 'application/json')
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
     * @param $url
     * @param $body
     * @param null $username
     * @param null $password
     * @param string $contentType
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function patch($url, $body, $username = null, $password = null, $contentType = 'application/json')
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
     * @param $url
     * @param null $username
     * @param null $password
     * @return \Psr\Http\Message\ResponseInterface
     * @throws GuzzleException
     */
    public function delete($url, $username = null, $password = null)
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
    public function getBaseUri()
    {
        return $this->baseUri;
    }

    /**
     * @param string $baseUri
     */
    public function setBaseUri($baseUri)
    {
        $this->baseUri = $baseUri;
    }
}
