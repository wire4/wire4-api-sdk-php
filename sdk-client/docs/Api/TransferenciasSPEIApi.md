# mx\wire4\TransferenciasSPEIApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**dropTransactionsPendingUsingDELETE**](TransferenciasSPEIApi.md#droptransactionspendingusingdelete) | **DELETE** /subscriptions/{subscription}/transactions/outcoming/spei/request/{requestId} | Eliminación de transferencias SPEI® pendientes
[**incomingSpeiTransactionsReportUsingGET**](TransferenciasSPEIApi.md#incomingspeitransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/incoming/spei | Consulta de transferencias recibidas
[**outCommingSpeiRequestIdTransactionsReportUsingGET**](TransferenciasSPEIApi.md#outcommingspeirequestidtransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/outcoming/spei/{requestId} | Consulta de transferencias de salida por identificador de petición
[**outgoingSpeiTransactionsReportUsingGET**](TransferenciasSPEIApi.md#outgoingspeitransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/outcoming/spei | Consulta de transferencias realizadas
[**registerOutgoingSpeiTransactionUsingPOST**](TransferenciasSPEIApi.md#registeroutgoingspeitransactionusingpost) | **POST** /subscriptions/{subscription}/transactions/outcoming/spei | Registro de transferencias

# **dropTransactionsPendingUsingDELETE**
> dropTransactionsPendingUsingDELETE($request_id, $subscription)

Eliminación de transferencias SPEI® pendientes

Elimina un conjunto de transferencias a realizar en la cuenta del cliente Monex relacionada a la suscripción, las transferencias no deben haber sido confirmadas por el cliente.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try{
        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "spei_admin"
        $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
            "spei_admin");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $request_id = "209648a5-2ff2-46f6-bfe8-2645e60104b7"; // string | Identificador de las transferencias a eliminar //REPLACE THIS WITH YOUR DATA
    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

    try {
        $apiInstance->dropTransactionsPendingUsingDELETE($request_id, $subscription);
    } catch (Exception $e) {
        echo 'Exception when calling TransferenciasSPEIApi->dropTransactionsPendingUsingDELETE: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **request_id** | **string**| Identificador de las transferencias a eliminar |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

void (empty response body)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **incomingSpeiTransactionsReportUsingGET**
> \mx\wire4\client\model\Deposit[] incomingSpeiTransactionsReportUsingGET($subscription)

Consulta de transferencias recibidas

Realiza una consulta de las transferencias recibidas (depósitos) en la cuenta del cliente Monex relacionada a la suscripción, las transferencias que regresa este recuso son únicamente las transferencias  recibidas durante el día en el que se realiza la consulta.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try{
    // Create the authenticator to obtain access token

    $oauth = new mx\wire4\OAuthWire4(
        Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
        Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
        \mx\wire4\Environment::SANDBOX);

    // Obtain an access token use application flow and scope "spei_admin"
    $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
        Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
        "spei_admin");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );

    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

    try {
        $result = $apiInstance->incomingSpeiTransactionsReportUsingGET($subscription);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling TransferenciasSPEIApi->incomingSpeiTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\Deposit[]**](../Model/Deposit.md)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **outCommingSpeiRequestIdTransactionsReportUsingGET**
> \mx\wire4\client\model\PaymentsRequestId outCommingSpeiRequestIdTransactionsReportUsingGET($request_id, $subscription)

Consulta de transferencias de salida por identificador de petición

Consulta las transferencias de salida registradas en una petición, las transferencias que regresa este recuso son únicamente las transferencias  de salida agrupadas al identificador de la petición que se generó al hacer el registro de las transacciones el cual se debe especificar como parte del path de este endpoint.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

try{
    // Create the authenticator to obtain access token

    $oauth = new mx\wire4\OAuthWire4(
        Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
        Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
        \mx\wire4\Environment::SANDBOX);

    // Obtain an access token use application flow and scope "spei_admin"
    $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
        Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
        "spei_admin");

} catch(OAuthException $e) {
    echo "Respuesta: ". $e->lastResponse . "\n";
}
// Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
$config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

$apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$request_id = "request_id_example"; // string | Identificador de la petición a buscar //REPLACE THIS WITH YOUR DATA
$subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

try {
    $result = $apiInstance->outCommingSpeiRequestIdTransactionsReportUsingGET($request_id, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPEIApi->outCommingSpeiRequestIdTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **request_id** | **string**| Identificador de la petición a buscar |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\PaymentsRequestId**](../Model/PaymentsRequestId.md)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **outgoingSpeiTransactionsReportUsingGET**
> \mx\wire4\client\model\Payment[] outgoingSpeiTransactionsReportUsingGET($subscription, $order_id)

Consulta de transferencias realizadas

Consulta las transferencias realizadas en la cuenta del cliente Monex relacionada a la suscripción, las transferencias que regresa este recuso son únicamente las transferencias recibidas en el día en el que se realiza la consulta.<br>Se pueden realizar consultas por <strong>order_id</strong> al realizar este tipo de consultas no importa el día en el que se realizó la transferencia

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

    try{
        // Create the authenticator to obtain access token

        $oauth = new mx\wire4\OAuthWire4(
            Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
            \mx\wire4\Environment::SANDBOX);

        // Obtain an access token use application flow and scope "spei_admin"
        $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
            "spei_admin");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA
    $order_id = "C71D144B-652E-447A-978E-AEA6F67C8ECB"; // string | Identificador de la orden a buscar //REPLACE THIS WITH YOUR DATA

    try {
        $result = $apiInstance->outgoingSpeiTransactionsReportUsingGET($subscription, $order_id);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling TransferenciasSPEIApi->outgoingSpeiTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
    }
        
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscription** | **string**| El identificador de la suscripción a esta API |
 **order_id** | **string**| Identificador de la orden a buscar | [optional]

### Return type

[**\mx\wire4\client\model\Payment[]**](../Model/Payment.md)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **registerOutgoingSpeiTransactionUsingPOST**
> \mx\wire4\client\model\TokenRequiredResponse registerOutgoingSpeiTransactionUsingPOST($body, $subscription)

Registro de transferencias

Registra un conjunto de transferencias a realizar en la cuenta del cliente Monex relacionada a la suscripción, las transferencias deben ser confirmadas por el cliente para que se efectuen.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

        try{
            // Create the authenticator to obtain access token

            $oauth = new mx\wire4\OAuthWire4(
                Wire4ApiTest::OAUTH_CONSUMER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::OAUTH_CONSUMER_SECRET, //REPLACE THIS WITH YOUR DATA
                \mx\wire4\Environment::SANDBOX);

            // Obtain an access token use application flow and scope "spei_admin"
            $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
                Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
                "spei_admin");

        } catch(OAuthException $e) {
            echo "Respuesta: ". $e->lastResponse . "\n";
        }

        // Configure OAuth2 access token for authorization: wire4_aut_app_user_spei
        $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

        $apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
        // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
        // This is optional, `GuzzleHttp\Client` will be used as default.
            new GuzzleHttp\Client(),
            $config
        );
        $body = new \mx\wire4\client\model\TransactionsOutgoingRegister(); // \mx\wire4\client\model\TransactionsOutgoingRegister | Información de las transferencias SPEI de salida


        $body->setReturnUrl("https://your-app-url.mx/return");
        $body->setCancelReturnUrl("https://your-app-url.mx/cancel");

        $transaction = new \mx\wire4\client\model\TransactionOutgoing();
        $transaction->setOrderId("33fd6a2a-abeb-4072-8405-348b0850f657");
        $transaction->setAmount(120.25);
        $transaction->setBeneficiaryAccount("112680000189999984");
        $transaction->setCurrencyCode("MXP");
        $transaction->setEmail(array("notificar@wire4.mx"));
        $transaction->setConcept("Transfer out test 1");
        $transaction->setReference(1234567);

        $body->setTransactions(array($transaction));

        $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

        try {
            $result = $apiInstance->registerOutgoingSpeiTransactionUsingPOST($body, $subscription);
            print_r($result);
        } catch (Exception $e) {
            echo 'Exception when calling TransferenciasSPEIApi->registerOutgoingSpeiTransactionUsingPOST: ', $e->getMessage(), PHP_EOL;
        }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\TransactionsOutgoingRegister**](../Model/TransactionsOutgoingRegister.md)| Información de las transferencias SPEI de salida |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

[wire4_aut_app_user_spei](../../README.md#wire4_aut_app_user_spei)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)
