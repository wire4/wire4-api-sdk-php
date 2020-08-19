# mx\wire4\PuntosDeVentaCoDiApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createSalesPoint**](PuntosDeVentaCoDiApi.md#createsalespoint) | **POST** /codi/companies/salespoint | Registra un punto de venta asociado a una empresa
[**obtainSalePoints**](PuntosDeVentaCoDiApi.md#obtainsalepoints) | **GET** /codi/companies/salespoint | Obtiene los puntos de venta asociados a una empresa

# **createSalesPoint**
> \mx\wire4\client\model\SalesPointRespose createSalesPoint($body, $authorization, $company_id)

Registra un punto de venta asociado a una empresa

Registra un punto de venta desde donde se emitaran los cobros CODI®, el punto de venta se debe asociar a un cuenta cableregistrada previamente ante Banxico para realizar cobros con CODI®

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\PuntosDeVentaCoDiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\SalesPointRequest(); // \mx\wire4\client\model\SalesPointRequest | Información del punto de venta CODI®
$authorization = "authorization_example"; // string | Header para token
$company_id = "company_id_example"; // string | El identificador de la empresa

try {
    $result = $apiInstance->createSalesPoint($body, $authorization, $company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PuntosDeVentaCoDiApi->createSalesPoint: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\SalesPointRequest**](../Model/SalesPointRequest.md)| Información del punto de venta CODI® |
 **authorization** | **string**| Header para token |
 **company_id** | **string**| El identificador de la empresa |

### Return type

[**\mx\wire4\client\model\SalesPointRespose**](../Model/SalesPointRespose.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **obtainSalePoints**
> \mx\wire4\client\model\SalesPointFound[] obtainSalePoints($authorization, $company_id)

Obtiene los puntos de venta asociados a una empresa

Obtiene los puntos de venta asociados a una empresa en las cuales se hacen operaciones CODI®

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\PuntosDeVentaCoDiApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$company_id = "company_id_example"; // string | El identificador de la empresa

try {
    $result = $apiInstance->obtainSalePoints($authorization, $company_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling PuntosDeVentaCoDiApi->obtainSalePoints: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **company_id** | **string**| El identificador de la empresa |

### Return type

[**\mx\wire4\client\model\SalesPointFound[]**](../Model/SalesPointFound.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

