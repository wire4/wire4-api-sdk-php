# mx\wire4\CuentasDeBeneficiariosSPIDApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getSpidBeneficiariesForAccount**](CuentasDeBeneficiariosSPIDApi.md#getspidbeneficiariesforaccount) | **GET** /subscriptions/{subscription}/beneficiaries/spid | Consulta los beneficiarios SPID registrados
[**preRegisterAccountsUsingPOST1**](CuentasDeBeneficiariosSPIDApi.md#preregisteraccountsusingpost1) | **POST** /subscriptions/{subscription}/beneficiaries/spid | Pre-registro de cuentas de beneficiarios SPID®

# **getSpidBeneficiariesForAccount**
> \mx\wire4\client\model\SpidBeneficiariesResponse getSpidBeneficiariesForAccount($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $page, $rfc, $size, $status)

Consulta los beneficiarios SPID registrados

Obtiene los beneficiarios SPID registrados al contrato relacionado con la suscripción. Los beneficiarios son los que actualmente se encuentran registrados en banca Monex.

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
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.
$account = "account_example"; // string | Cuenta del beneficiario, puede ser CLABE (18 dígitos), Tarjeta de débito  (TDD, 16 dígitos) o número de celular (10 dígitos).
$beneficiary_bank = "beneficiary_bank_example"; // string | Es la clave del banco beneficiario. Se puede obtener del catalogo de <a href=\"#operation/getAllInstitutionsUsingGET\">instituciones.</a>
$beneficiary_name = "beneficiary_name_example"; // string | Es el nombre del beneficiario.
$end_date = "end_date_example"; // string | Es la fecha de inicio del periodo a filtrar en formato dd-mm-yyyy.
$init_date = "init_date_example"; // string | Es la fecha de inicio del periodo a filtrar en formato dd-mm-yyyy.
$page = "0"; // string | Es el número de página.
$rfc = "rfc_example"; // string | Es el Registro Federal de Contribuyentes (RFC) del beneficiario.
$size = "20"; // string | Es el tamaño de página.
$status = "status_example"; // string | Es el estado (estatus) de la cuenta, Los valores pueden ser <b>PENDING</b> y <b>REGISTERED</b>.

try {
    $result = $apiInstance->getSpidBeneficiariesForAccount($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $page, $rfc, $size, $status);
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
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |
 **account** | **string**| Cuenta del beneficiario, puede ser CLABE (18 dígitos), Tarjeta de débito  (TDD, 16 dígitos) o número de celular (10 dígitos). | [optional]
 **beneficiary_bank** | **string**| Es la clave del banco beneficiario. Se puede obtener del catalogo de &lt;a href&#x3D;\&quot;#operation/getAllInstitutionsUsingGET\&quot;&gt;instituciones.&lt;/a&gt; | [optional]
 **beneficiary_name** | **string**| Es el nombre del beneficiario. | [optional]
 **end_date** | **string**| Es la fecha de inicio del periodo a filtrar en formato dd-mm-yyyy. | [optional]
 **init_date** | **string**| Es la fecha de inicio del periodo a filtrar en formato dd-mm-yyyy. | [optional]
 **page** | **string**| Es el número de página. | [optional] [default to 0]
 **rfc** | **string**| Es el Registro Federal de Contribuyentes (RFC) del beneficiario. | [optional]
 **size** | **string**| Es el tamaño de página. | [optional] [default to 20]
 **status** | **string**| Es el estado (estatus) de la cuenta, Los valores pueden ser &lt;b&gt;PENDING&lt;/b&gt; y &lt;b&gt;REGISTERED&lt;/b&gt;. | [optional]

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

Pre-registro de cuentas de beneficiarios SPID®

Pre-registra una o más cuentas de beneficiario SPID® en la plataforma de Wire4, ésta le proporcionaará una URL donde lo llevará al centro de autorización para que el cuentahabiente Monex ingrese su llave digital para confirmar el alta de las cuentas de beneficiarios.<br/> Los posibles valores de <em>relationship</em> y <em>kind_of_relationship</em> se deben  obtener de <a href=\"#operation/getAvailableRelationshipsMonexUsingGET\">/subscriptions/{subscription}/beneficiaries/relationships.</a><br/><br/>La confirmación de registro en Monex se realizará a través de una notificación a los webhooks registrados con el evento de tipo <a href=\"#section/Eventos/Tipos-de-Eventos\">ACCOUNT.CREATED.</a>

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
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

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
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

