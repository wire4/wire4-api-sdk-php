# mx\wire4\CuentasDeBeneficiariosSPIDApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**preRegisterAccountsUsingPOST1**](CuentasDeBeneficiariosSPIDApi.md#preregisteraccountsusingpost1) | **POST** /subscriptions/{subscription}/beneficiaries/spid | Pre-registro de cuentas de beneficiarios SPID

# **preRegisterAccountsUsingPOST1**
> \mx\wire4\client\model\TokenRequiredResponse preRegisterAccountsUsingPOST1($body, $subscription)

Pre-registro de cuentas de beneficiarios SPID

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

        // Obtain an access token use application flow and scope "spid_admin"
        $accessToken = $oauth->obtainAccessTokenAppUser(Wire4ApiTest::USER_KEY, //REPLACE THIS WITH YOUR DATA
            Wire4ApiTest::SECRET_KEY, //REPLACE THIS WITH YOUR DATA
            "spid_admin"); //Se debe tener el scope de spid

    } catch(OAuthException $e) {
        echo "Respuesta: ". $e->lastResponse . "\n";
    }

    // Configure OAuth2 access token for authorization: wire4_aut_app_user_spid
    $config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken($accessToken);

    $apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPIDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
        new GuzzleHttp\Client(),
        $config
    );
    $body = new \mx\wire4\client\model\AccountSpid(); // \mx\wire4\client\model\AccountSpid | Información de la cuenta del beneficiario
    $beneficiaryInstitution = new \mx\wire4\client\model\BeneficiaryInstitution();
    $beneficiaryInstitution->setName("BMONEX"); //Nombre de la institucion bancaria de acuerdo al catalogo de wire4

    $body->setReturnUrl("https://your-app-url.mx/return");
    $body->setCancelReturnUrl("https://your-app-url.mx/cancel");
    $body->setAmountLimit(1000.00);
    $body->setBeneficiaryAccount("112680000156896531");
    $body->setInstitution( $beneficiaryInstitution);
    $body->setEmail(array("beneficiary.spid@wire4.mx"));
    $body->setKindOfRelationship("RECURRENTE");
    $body->setNumericReference("1234567");
    $body->setPaymentConcept("concept spid");
    $body->setRelationship("ACREEDOR");
    $body->setRfc("SJBA920125AB1");
    $subscription = Wire4ApiTest::SUBSCRIPTION; // string | El identificador de la suscripción a esta API

    try {
        $result = $apiInstance->preRegisterAccountsUsingPOST1($body, $subscription);
        print_r($result);
    } catch (Exception $e) {
        echo 'Exception when calling CuentasDeBeneficiariosSPIDApi->preRegisterAccountsUsingPOST1: ', $e->getMessage(), PHP_EOL;
    }
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\AccountSpid**](../Model/AccountSpid.md)| Información de la cuenta del beneficiario |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

[wire4_aut_app_user_spid](../../README.md#wire4_aut_app_user_spid)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

