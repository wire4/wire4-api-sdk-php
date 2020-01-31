# mx\wire4\ContactoApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**sendContactUsingPOST**](ContactoApi.md#sendcontactusingpost) | **POST** /contact | Solicitud de contacto

# **sendContactUsingPOST**
> sendContactUsingPOST($body, $authorization)

Solicitud de contacto

Notifica a un asesor Monex para que se ponga en contacto con un posible cliente.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\ContactoApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\ContactRequest(); // \mx\wire4\client\model\ContactRequest | Información del contacto
$authorization = "authorization_example"; // string | Header para token

try {
    $apiInstance->sendContactUsingPOST($body, $authorization);
} catch (Exception $e) {
    echo 'Exception when calling ContactoApi->sendContactUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\ContactRequest**](../Model/ContactRequest.md)| Información del contacto |
 **authorization** | **string**| Header para token |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

