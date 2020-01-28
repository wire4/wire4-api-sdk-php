<?php
/**
 * DepositantesApi
 * PHP version 5
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Wire4RestAPI
 *
 * Referencia de la API de Wire4
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.11
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace mx\wire4\client\api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use mx\wire4\ApiException;
use mx\wire4\Configuration;
use mx\wire4\HeaderSelector;
use mx\wire4\ObjectSerializer;

/**
 * DepositantesApi Class Doc Comment
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class DepositantesApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation getDepositantsUsingGET
     *
     * Consulta de cuentas de depositantes
     *
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\GetDepositants
     */
    public function getDepositantsUsingGET($subscription)
    {
        list($response) = $this->getDepositantsUsingGETWithHttpInfo($subscription);
        return $response;
    }

    /**
     * Operation getDepositantsUsingGETWithHttpInfo
     *
     * Consulta de cuentas de depositantes
     *
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\GetDepositants, HTTP status code, HTTP response headers (array of strings)
     */
    public function getDepositantsUsingGETWithHttpInfo($subscription)
    {
        $returnType = '\mx\wire4\client\model\GetDepositants';
        $request = $this->getDepositantsUsingGETRequest($subscription);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\GetDepositants',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getDepositantsUsingGETAsync
     *
     * Consulta de cuentas de depositantes
     *
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDepositantsUsingGETAsync($subscription)
    {
        return $this->getDepositantsUsingGETAsyncWithHttpInfo($subscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getDepositantsUsingGETAsyncWithHttpInfo
     *
     * Consulta de cuentas de depositantes
     *
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getDepositantsUsingGETAsyncWithHttpInfo($subscription)
    {
        $returnType = '\mx\wire4\client\model\GetDepositants';
        $request = $this->getDepositantsUsingGETRequest($subscription);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getDepositantsUsingGET'
     *
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getDepositantsUsingGETRequest($subscription)
    {
        // verify the required parameter 'subscription' is set
        if ($subscription === null || (is_array($subscription) && count($subscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription when calling getDepositantsUsingGET'
            );
        }

        $resourcePath = '/subscriptions/{subscription}/depositants';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($subscription !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription' . '}',
                ObjectSerializer::toPathValue($subscription),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation registerDepositantsUsingPOST
     *
     * Registra un nuevo depositante
     *
     * @param  \mx\wire4\client\model\DepositantsRegister $body Depositant info (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\DepositantsResponse
     */
    public function registerDepositantsUsingPOST($body, $subscription)
    {
        list($response) = $this->registerDepositantsUsingPOSTWithHttpInfo($body, $subscription);
        return $response;
    }

    /**
     * Operation registerDepositantsUsingPOSTWithHttpInfo
     *
     * Registra un nuevo depositante
     *
     * @param  \mx\wire4\client\model\DepositantsRegister $body Depositant info (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\DepositantsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function registerDepositantsUsingPOSTWithHttpInfo($body, $subscription)
    {
        $returnType = '\mx\wire4\client\model\DepositantsResponse';
        $request = $this->registerDepositantsUsingPOSTRequest($body, $subscription);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\DepositantsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation registerDepositantsUsingPOSTAsync
     *
     * Registra un nuevo depositante
     *
     * @param  \mx\wire4\client\model\DepositantsRegister $body Depositant info (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function registerDepositantsUsingPOSTAsync($body, $subscription)
    {
        return $this->registerDepositantsUsingPOSTAsyncWithHttpInfo($body, $subscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation registerDepositantsUsingPOSTAsyncWithHttpInfo
     *
     * Registra un nuevo depositante
     *
     * @param  \mx\wire4\client\model\DepositantsRegister $body Depositant info (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function registerDepositantsUsingPOSTAsyncWithHttpInfo($body, $subscription)
    {
        $returnType = '\mx\wire4\client\model\DepositantsResponse';
        $request = $this->registerDepositantsUsingPOSTRequest($body, $subscription);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'registerDepositantsUsingPOST'
     *
     * @param  \mx\wire4\client\model\DepositantsRegister $body Depositant info (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function registerDepositantsUsingPOSTRequest($body, $subscription)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling registerDepositantsUsingPOST'
            );
        }
        // verify the required parameter 'subscription' is set
        if ($subscription === null || (is_array($subscription) && count($subscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription when calling registerDepositantsUsingPOST'
            );
        }

        $resourcePath = '/subscriptions/{subscription}/depositants';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;


        // path params
        if ($subscription !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription' . '}',
                ObjectSerializer::toPathValue($subscription),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }

        // this endpoint requires OAuth (access token)
        if ($this->config->getAccessToken() !== null) {
            $headers['Authorization'] = 'Bearer ' . $this->config->getAccessToken();
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
