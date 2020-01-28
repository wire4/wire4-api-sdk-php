# mx\wire4\TransferenciasSPIDApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getSpidClassificationsUsingGET**](TransferenciasSPIDApi.md#getspidclassificationsusingget) | **GET** /subscriptions/{subscription}/beneficiaries/spid/classifications | Consulta las clasificaciones para operaciones con SPID
[**registerOutgoingSpidTransactionUsingPOST**](TransferenciasSPIDApi.md#registeroutgoingspidtransactionusingpost) | **POST** /subscriptions/{subscription}/transactions/outcoming/spid | Registro de transferencias SPID

# **getSpidClassificationsUsingGET**
> \mx\wire4\client\model\SpidClassificationsResponseDTO getSpidClassificationsUsingGET($subscription)

Consulta las clasificaciones para operaciones con SPID

Obtiene las clasificaciones para operaciones con dólares (SPID) de Monex.<br/>Este recurso se debe invocar previo al realizar una operación SPID.<br/>Se requiere que el token de autenticación se genere con scope spid_admin.

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

        // Obtain an access token use application flow and scope "spid_admin"
        $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
            "spid_admin");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spid
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\TransferenciasSPIDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

    try {
        $result = $apiInstance->getSpidClassificationsUsingGET($subscription);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling TransferenciasSPIDApi->getSpidClassificationsUsingGET: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\SpidClassificationsResponseDTO**](../Model/SpidClassificationsResponseDTO.md)

### Authorization

[wire4_aut_app_user_spid](../../README.md#wire4_aut_app_user_spid)

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **registerOutgoingSpidTransactionUsingPOST**
> \mx\wire4\client\model\TokenRequiredResponse registerOutgoingSpidTransactionUsingPOST($body, $subscription)

Registro de transferencias SPID

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

        // Obtain an access token use application flow and scope "spid_admin"
        $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
            "spid_admin");

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spid
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\TransferenciasSPIDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $body = new \mx\wire4\client\model\TransactionOutgoingSpid(); // \mx\wire4\client\model\TransactionOutgoingSpid | Información de las transferencias SPID de salida

    $body->setReturnUrl("https://your-app-url.mx/return");
    $body->setCancelReturnUrl("https://your-app-url.mx/cancel");
    $body->setOrderId("8A736A1D-ECA6-4959-93FE-794365F53E24");
    $body->setAmount(120.25);
    $body->setBeneficiaryAccount("112680000189999984");
    $body->setCurrencyCode("USD");
    $body->setEmail(array("notificar@wire4.mx"));
    $body->setClassificationId("01");
    $body->setNumericReferenceSpid(1234567);
    $body->setPaymentConceptSpid("Transfer out test 1");

    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API //REPLACE THIS WITH YOUR DATA

    try {
        $result = $apiInstance->registerOutgoingSpidTransactionUsingPOST($body, $subscription);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling TransferenciasSPIDApi->registerOutgoingSpidTransactionUsingPOST: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\TransactionOutgoingSpid**](../Model/TransactionOutgoingSpid.md)| Información de las transferencias SPID de salida |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

[wire4_aut_app_user_spid](../../README.md#wire4_aut_app_user_spid)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

