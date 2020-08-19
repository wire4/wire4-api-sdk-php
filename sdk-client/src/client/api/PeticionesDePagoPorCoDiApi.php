<?php
/**
 * PeticionesDePagoPorCoDiApi
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
 * PeticionesDePagoPorCoDiApi Class Doc Comment
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PeticionesDePagoPorCoDiApi
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
     * Operation consultCodiRequestByOrderId
     *
     * Obtiene la información de una petición de pago CODI® por orderId para un punto de venta
     *
     * @param  string $authorization Header para token (required)
     * @param  string $order_id Identificador del pago CODI® (required)
     * @param  string $sales_point_id Identificador del punto de venta (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\PaymentRequestCodiResponseDTO
     */
    public function consultCodiRequestByOrderId($authorization, $order_id, $sales_point_id)
    {
        list($response) = $this->consultCodiRequestByOrderIdWithHttpInfo($authorization, $order_id, $sales_point_id);
        return $response;
    }

    /**
     * Operation consultCodiRequestByOrderIdWithHttpInfo
     *
     * Obtiene la información de una petición de pago CODI® por orderId para un punto de venta
     *
     * @param  string $authorization Header para token (required)
     * @param  string $order_id Identificador del pago CODI® (required)
     * @param  string $sales_point_id Identificador del punto de venta (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\PaymentRequestCodiResponseDTO, HTTP status code, HTTP response headers (array of strings)
     */
    public function consultCodiRequestByOrderIdWithHttpInfo($authorization, $order_id, $sales_point_id)
    {
        $returnType = '\mx\wire4\client\model\PaymentRequestCodiResponseDTO';
        $request = $this->consultCodiRequestByOrderIdRequest($authorization, $order_id, $sales_point_id);

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
                        '\mx\wire4\client\model\PaymentRequestCodiResponseDTO',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 204:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\PaymentRequestCodiResponseDTO',
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
     * Operation consultCodiRequestByOrderIdAsync
     *
     * Obtiene la información de una petición de pago CODI® por orderId para un punto de venta
     *
     * @param  string $authorization Header para token (required)
     * @param  string $order_id Identificador del pago CODI® (required)
     * @param  string $sales_point_id Identificador del punto de venta (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function consultCodiRequestByOrderIdAsync($authorization, $order_id, $sales_point_id)
    {
        return $this->consultCodiRequestByOrderIdAsyncWithHttpInfo($authorization, $order_id, $sales_point_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation consultCodiRequestByOrderIdAsyncWithHttpInfo
     *
     * Obtiene la información de una petición de pago CODI® por orderId para un punto de venta
     *
     * @param  string $authorization Header para token (required)
     * @param  string $order_id Identificador del pago CODI® (required)
     * @param  string $sales_point_id Identificador del punto de venta (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function consultCodiRequestByOrderIdAsyncWithHttpInfo($authorization, $order_id, $sales_point_id)
    {
        $returnType = '\mx\wire4\client\model\PaymentRequestCodiResponseDTO';
        $request = $this->consultCodiRequestByOrderIdRequest($authorization, $order_id, $sales_point_id);

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
     * Create request for operation 'consultCodiRequestByOrderId'
     *
     * @param  string $authorization Header para token (required)
     * @param  string $order_id Identificador del pago CODI® (required)
     * @param  string $sales_point_id Identificador del punto de venta (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function consultCodiRequestByOrderIdRequest($authorization, $order_id, $sales_point_id)
    {
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling consultCodiRequestByOrderId'
            );
        }
        // verify the required parameter 'order_id' is set
        if ($order_id === null || (is_array($order_id) && count($order_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $order_id when calling consultCodiRequestByOrderId'
            );
        }
        // verify the required parameter 'sales_point_id' is set
        if ($sales_point_id === null || (is_array($sales_point_id) && count($sales_point_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $sales_point_id when calling consultCodiRequestByOrderId'
            );
        }

        $resourcePath = '/codi/sales-point/charges';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($order_id !== null) {
            $queryParams['orderId'] = ObjectSerializer::toQueryValue($order_id);
        }
        // query params
        if ($sales_point_id !== null) {
            $queryParams['salesPointId'] = ObjectSerializer::toQueryValue($sales_point_id);
        }
        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
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
     * Operation generateCodiCodeQR
     *
     * Genera un código QR para un pago mediante CODI®
     *
     * @param  \mx\wire4\client\model\CodiCodeRequestDTO $body Información del pago CODI® (required)
     * @param  string $authorization Header para token (required)
     * @param  string $sales_point_id Identificador del punto de venta (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\CodiCodeQrResponseDTO
     */
    public function generateCodiCodeQR($body, $authorization, $sales_point_id)
    {
        list($response) = $this->generateCodiCodeQRWithHttpInfo($body, $authorization, $sales_point_id);
        return $response;
    }

    /**
     * Operation generateCodiCodeQRWithHttpInfo
     *
     * Genera un código QR para un pago mediante CODI®
     *
     * @param  \mx\wire4\client\model\CodiCodeRequestDTO $body Información del pago CODI® (required)
     * @param  string $authorization Header para token (required)
     * @param  string $sales_point_id Identificador del punto de venta (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\CodiCodeQrResponseDTO, HTTP status code, HTTP response headers (array of strings)
     */
    public function generateCodiCodeQRWithHttpInfo($body, $authorization, $sales_point_id)
    {
        $returnType = '\mx\wire4\client\model\CodiCodeQrResponseDTO';
        $request = $this->generateCodiCodeQRRequest($body, $authorization, $sales_point_id);

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
                        '\mx\wire4\client\model\CodiCodeQrResponseDTO',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 201:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\CodiCodeQrResponseDTO',
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
     * Operation generateCodiCodeQRAsync
     *
     * Genera un código QR para un pago mediante CODI®
     *
     * @param  \mx\wire4\client\model\CodiCodeRequestDTO $body Información del pago CODI® (required)
     * @param  string $authorization Header para token (required)
     * @param  string $sales_point_id Identificador del punto de venta (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function generateCodiCodeQRAsync($body, $authorization, $sales_point_id)
    {
        return $this->generateCodiCodeQRAsyncWithHttpInfo($body, $authorization, $sales_point_id)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation generateCodiCodeQRAsyncWithHttpInfo
     *
     * Genera un código QR para un pago mediante CODI®
     *
     * @param  \mx\wire4\client\model\CodiCodeRequestDTO $body Información del pago CODI® (required)
     * @param  string $authorization Header para token (required)
     * @param  string $sales_point_id Identificador del punto de venta (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function generateCodiCodeQRAsyncWithHttpInfo($body, $authorization, $sales_point_id)
    {
        $returnType = '\mx\wire4\client\model\CodiCodeQrResponseDTO';
        $request = $this->generateCodiCodeQRRequest($body, $authorization, $sales_point_id);

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
     * Create request for operation 'generateCodiCodeQR'
     *
     * @param  \mx\wire4\client\model\CodiCodeRequestDTO $body Información del pago CODI® (required)
     * @param  string $authorization Header para token (required)
     * @param  string $sales_point_id Identificador del punto de venta (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function generateCodiCodeQRRequest($body, $authorization, $sales_point_id)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling generateCodiCodeQR'
            );
        }
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling generateCodiCodeQR'
            );
        }
        // verify the required parameter 'sales_point_id' is set
        if ($sales_point_id === null || (is_array($sales_point_id) && count($sales_point_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $sales_point_id when calling generateCodiCodeQR'
            );
        }

        $resourcePath = '/codi/sales-point/charges';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($sales_point_id !== null) {
            $queryParams['salesPointId'] = ObjectSerializer::toQueryValue($sales_point_id);
        }
        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
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
