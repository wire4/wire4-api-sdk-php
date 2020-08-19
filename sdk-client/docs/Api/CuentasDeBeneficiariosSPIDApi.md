# mx\wire4\CuentasDeBeneficiariosSPIDApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getSpidBeneficiariesForAccount**](CuentasDeBeneficiariosSPIDApi.md#getspidbeneficiariesforaccount) | **GET** /subscriptions/{subscription}/beneficiaries/spid | Consulta los beneficiarios SPID registrados
[**preRegisterAccountsUsingPOST1**](CuentasDeBeneficiariosSPIDApi.md#preregisteraccountsusingpost1) | **POST** /subscriptions/{subscription}/beneficiaries/spid | Pre-registro de cuentas de beneficiarios SPID

# **getSpidBeneficiariesForAccount**
> \mx\wire4\client\model\SpidBeneficiariesResponse getSpidBeneficiariesForAccount($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $rfc, $status)

Consulta los beneficiarios SPID registrados

Obtiene los beneficiarios SPID registrados al contrato relacionado con la suscripción, Los beneficiarios son los que actualmente se encuentran registrados en banca Monex.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPIDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API
$account = "account_example"; // string | Cuenta del beneficiario, puede ser Clabe, TDD o Celular
$beneficiary_bank = "beneficiary_bank_example"; // string | Clave del banco beneficiario
$beneficiary_name = "beneficiary_name_example"; // string | Nombre del beneficiario
$end_date = "end_date_example"; // string | Fecha de inicio del perido a filtrar en formato dd-mm-yyyy
$init_date = "init_date_example"; // string | Fecha de inicio del perido a filtrar en formato dd-mm-yyyy
$rfc = "rfc_example"; // string | RFC del beneficiario
$status = "status_example"; // string | Estatus de la cuenta

try {
    $result = $apiInstance->getSpidBeneficiariesForAccount($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $rfc, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPIDApi->getSpidBeneficiariesForAccount: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |
 **account** | **string**| Cuenta del beneficiario, puede ser Clabe, TDD o Celular | [optional]
 **beneficiary_bank** | **string**| Clave del banco beneficiario | [optional]
 **beneficiary_name** | **string**| Nombre del beneficiario | [optional]
 **end_date** | **string**| Fecha de inicio del perido a filtrar en formato dd-mm-yyyy | [optional]
 **init_date** | **string**| Fecha de inicio del perido a filtrar en formato dd-mm-yyyy | [optional]
 **rfc** | **string**| RFC del beneficiario | [optional]
 **status** | **string**| Estatus de la cuenta | [optional]

### Return type

[**\mx\wire4\client\model\SpidBeneficiariesResponse**](../Model/SpidBeneficiariesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **preRegisterAccountsUsingPOST1**
> \mx\wire4\client\model\TokenRequiredResponse preRegisterAccountsUsingPOST1($body, $authorization, $subscription)

Pre-registro de cuentas de beneficiarios SPID

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPIDApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\AccountSpid(); // \mx\wire4\client\model\AccountSpid | Información de la cuenta del beneficiario
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | El identificador de la suscripción a esta API

try {
    $result = $apiInstance->preRegisterAccountsUsingPOST1($body, $authorization, $subscription);
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
 **authorization** | **string**| Header para token |
 **subscription** | **string**| El identificador de la suscripción a esta API |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

