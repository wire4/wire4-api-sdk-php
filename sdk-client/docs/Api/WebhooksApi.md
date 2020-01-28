# mx\wire4\WebhooksApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getWebhook**](WebhooksApi.md#getwebhook) | **GET** /webhooks/{id} | Consulta de Webhook
[**getWebhooks**](WebhooksApi.md#getwebhooks) | **GET** /webhooks | Consulta de Webhooks
[**registerWebhook**](WebhooksApi.md#registerwebhook) | **POST** /webhooks | Alta de Webhook

# **getWebhook**
> \mx\wire4\client\model\WebhookResponse getWebhook($id)

Consulta de Webhook

Obtiene un webhook registrado en la plataforma mediante su identificador.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "general"
        $accessToken = $oauth->obtainAccessTokenApp("general");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $id = "wh_3838229e10774e428c037d39c2cb167b"; // string | Identificador del webhook //REPLACE THIS WITH YOUR DATA

    try {
        $result = $apiInstance->getWebhook($id);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling WebhooksApi->getWebhook: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Identificador del webhook |

### Return type

[**\mx\wire4\client\model\WebhookResponse**](../Model/WebhookResponse.md)

### Authorization

[wire4_aut_app](../../README.md#wire4_aut_app)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getWebhooks**
> \mx\wire4\client\model\WebhooksList getWebhooks()

Consulta de Webhooks

Obtiene los webhooks registrados en la plataforma que tengan estatus 'ACTIVE' e 'INACTIVE'.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "general"
        $accessToken = $oauth->obtainAccessTokenApp("general");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );

    try {
        $result = $apiInstance->getWebhooks();
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling WebhooksApi->getWebhooks: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\mx\wire4\client\model\WebhooksList**](../Model/WebhooksList.md)

### Authorization

[wire4_aut_app](../../README.md#wire4_aut_app)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **registerWebhook**
> \mx\wire4\client\model\WebhookResponse registerWebhook($body)

Alta de Webhook

Registra un webhook en la plataforma para su uso como notificador de eventos cuando estos ocurran.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try {

        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "general"
        $accessToken = $oauth->obtainAccessTokenApp("general");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\WebhooksApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $body = new \mx\wire4\client\model\WebhookRequest(); // \mx\wire4\client\model\WebhookRequest | Información para registrar un Webhook


    $body->setName("TEST-SDK-WEBHOOK-REGISTER");
    $body->setUrl("https://en0fpu357pjff.x.pipedream.net");
    $body->setEvents(array(
            "ACCOUNT.CREATED",
            "TRANSACTION.OUTGOING.RECEIVED",
            "ENROLLMENT.CREATED"));

    try {
        $result = $apiInstance->registerWebhook($body);
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

### Return type

[**\mx\wire4\client\model\WebhookResponse**](../Model/WebhookResponse.md)

### Authorization

[wire4_aut_app](../../README.md#wire4_aut_app)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

