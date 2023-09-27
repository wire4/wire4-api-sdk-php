<?php
/**
 * LmitesDeMontosApi
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
 * Swagger Codegen version: 3.0.46
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
 * LmitesDeMontosApi Class Doc Comment
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class LmitesDeMontosApi
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
     * Operation obtainConfigurationsLimits
     *
     * Consulta de configuraciones
     *
     * @param  string $authorization Header para token (required)
     * @param  string $suscription Es el identificador de la suscripción a esta API. (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\MessageConfigurationsLimits
     */
    public function obtainConfigurationsLimits($authorization, $suscription)
    {
        list($response) = $this->obtainConfigurationsLimitsWithHttpInfo($authorization, $suscription);
        return $response;
    }

    /**
     * Operation obtainConfigurationsLimitsWithHttpInfo
     *
     * Consulta de configuraciones
     *
     * @param  string $authorization Header para token (required)
     * @param  string $suscription Es el identificador de la suscripción a esta API. (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\MessageConfigurationsLimits, HTTP status code, HTTP response headers (array of strings)
     */
    public function obtainConfigurationsLimitsWithHttpInfo($authorization, $suscription)
    {
        $returnType = '\mx\wire4\client\model\MessageConfigurationsLimits';
        $request = $this->obtainConfigurationsLimitsRequest($authorization, $suscription);

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
                        '\mx\wire4\client\model\MessageConfigurationsLimits',
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
     * Operation obtainConfigurationsLimitsAsync
     *
     * Consulta de configuraciones
     *
     * @param  string $authorization Header para token (required)
     * @param  string $suscription Es el identificador de la suscripción a esta API. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function obtainConfigurationsLimitsAsync($authorization, $suscription)
    {
        return $this->obtainConfigurationsLimitsAsyncWithHttpInfo($authorization, $suscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation obtainConfigurationsLimitsAsyncWithHttpInfo
     *
     * Consulta de configuraciones
     *
     * @param  string $authorization Header para token (required)
     * @param  string $suscription Es el identificador de la suscripción a esta API. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function obtainConfigurationsLimitsAsyncWithHttpInfo($authorization, $suscription)
    {
        $returnType = '\mx\wire4\client\model\MessageConfigurationsLimits';
        $request = $this->obtainConfigurationsLimitsRequest($authorization, $suscription);

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
     * Create request for operation 'obtainConfigurationsLimits'
     *
     * @param  string $authorization Header para token (required)
     * @param  string $suscription Es el identificador de la suscripción a esta API. (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function obtainConfigurationsLimitsRequest($authorization, $suscription)
    {
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling obtainConfigurationsLimits'
            );
        }
        // verify the required parameter 'suscription' is set
        if ($suscription === null || (is_array($suscription) && count($suscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $suscription when calling obtainConfigurationsLimits'
            );
        }

        $resourcePath = '/subscriptions/{suscription}/configurations';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($suscription !== null) {
            $resourcePath = str_replace(
                '{' . 'suscription' . '}',
                ObjectSerializer::toPathValue($suscription),
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
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
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

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateConfigurations
     *
     * Actualiza configuraciones por suscripción
     *
     * @param  \mx\wire4\client\model\UpdateConfigurationsRequestDTO $body updateConfigurationsResquestDTO (required)
     * @param  string $authorization Header para token (required)
     * @param  string $suscription suscription (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function updateConfigurations($body, $authorization, $suscription)
    {
        $this->updateConfigurationsWithHttpInfo($body, $authorization, $suscription);
    }

    /**
     * Operation updateConfigurationsWithHttpInfo
     *
     * Actualiza configuraciones por suscripción
     *
     * @param  \mx\wire4\client\model\UpdateConfigurationsRequestDTO $body updateConfigurationsResquestDTO (required)
     * @param  string $authorization Header para token (required)
     * @param  string $suscription suscription (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateConfigurationsWithHttpInfo($body, $authorization, $suscription)
    {
        $returnType = '';
        $request = $this->updateConfigurationsRequest($body, $authorization, $suscription);

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

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation updateConfigurationsAsync
     *
     * Actualiza configuraciones por suscripción
     *
     * @param  \mx\wire4\client\model\UpdateConfigurationsRequestDTO $body updateConfigurationsResquestDTO (required)
     * @param  string $authorization Header para token (required)
     * @param  string $suscription suscription (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateConfigurationsAsync($body, $authorization, $suscription)
    {
        return $this->updateConfigurationsAsyncWithHttpInfo($body, $authorization, $suscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateConfigurationsAsyncWithHttpInfo
     *
     * Actualiza configuraciones por suscripción
     *
     * @param  \mx\wire4\client\model\UpdateConfigurationsRequestDTO $body updateConfigurationsResquestDTO (required)
     * @param  string $authorization Header para token (required)
     * @param  string $suscription suscription (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateConfigurationsAsyncWithHttpInfo($body, $authorization, $suscription)
    {
        $returnType = '';
        $request = $this->updateConfigurationsRequest($body, $authorization, $suscription);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
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
     * Create request for operation 'updateConfigurations'
     *
     * @param  \mx\wire4\client\model\UpdateConfigurationsRequestDTO $body updateConfigurationsResquestDTO (required)
     * @param  string $authorization Header para token (required)
     * @param  string $suscription suscription (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateConfigurationsRequest($body, $authorization, $suscription)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling updateConfigurations'
            );
        }
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling updateConfigurations'
            );
        }
        // verify the required parameter 'suscription' is set
        if ($suscription === null || (is_array($suscription) && count($suscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $suscription when calling updateConfigurations'
            );
        }

        $resourcePath = '/subscriptions/{suscription}/configurations';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($suscription !== null) {
            $resourcePath = str_replace(
                '{' . 'suscription' . '}',
                ObjectSerializer::toPathValue($suscription),
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
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
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
                $httpBody = \GuzzleHttp\Psr7\Query::build($formParams);
            }
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

        $query = \GuzzleHttp\Psr7\Query::build($queryParams);
        return new Request(
            'PUT',
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
