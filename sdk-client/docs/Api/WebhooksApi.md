# mx\wire4\WebhooksApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getWebhook**](WebhooksApi.md#getwebhook) | **GET** /webhooks/{id} | Consulta de Webhook
[**getWebhooks**](WebhooksApi.md#getwebhooks) | **GET** /webhooks | Consulta de Webhooks
[**registerWebhook**](WebhooksApi.md#registerwebhook) | **POST** /webhooks | Alta de Webhook

# **getWebhook**
> \mx\wire4\client\model\WebhookResponse getWebhook($authorization, $id)

Consulta de Webhook

Obtiene un webhook registrado en la plataforma mediante su identificador.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$id = "id_example"; // string | Identificador del webhook

try {
    $result = $apiInstance->getWebhook($authorization, $id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->getWebhook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **id** | **string**| Identificador del webhook |

### Return type

[**\mx\wire4\client\model\WebhookResponse**](../Model/WebhookResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getWebhooks**
> \mx\wire4\client\model\WebhooksList getWebhooks($authorization)

Consulta de Webhooks

Obtiene los webhooks registrados en la plataforma que tengan estatus 'ACTIVE' e 'INACTIVE'.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->getWebhooks($authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->getWebhooks: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |

### Return type

[**\mx\wire4\client\model\WebhooksList**](../Model/WebhooksList.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **registerWebhook**
> \mx\wire4\client\model\WebhookResponse registerWebhook($body, $authorization)

Alta de Webhook

Registra un webhook en la plataforma para su uso como notificador de eventos cuando estos ocurran.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\WebhookRequest(); // \mx\wire4\client\model\WebhookRequest | Información para registrar un Webhook
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->registerWebhook($body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WebhooksApi->registerWebhook: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\WebhookRequest**](../Model/WebhookRequest.md)| Información para registrar un Webhook |
 **authorization** | **string**| Header para token |

### Return type

[**\mx\wire4\client\model\WebhookResponse**](../Model/WebhookResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

