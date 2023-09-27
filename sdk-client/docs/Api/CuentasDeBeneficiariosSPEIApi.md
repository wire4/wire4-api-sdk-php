# mx\wire4\CuentasDeBeneficiariosSPEIApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**authorizeAccountsPendingPUT**](CuentasDeBeneficiariosSPEIApi.md#authorizeaccountspendingput) | **PUT** /subscriptions/{subscription}/beneficiaries/pending | Solicitud para agrupar cuentas de beneficiarios SPEI/SPID en estado pendiente.
[**deleteAccountUsingDELETE**](CuentasDeBeneficiariosSPEIApi.md#deleteaccountusingdelete) | **DELETE** /subscriptions/{subscription}/beneficiaries/spei/{account} | Elimina la cuenta del beneficiario
[**getAvailableRelationshipsMonexUsingGET**](CuentasDeBeneficiariosSPEIApi.md#getavailablerelationshipsmonexusingget) | **GET** /subscriptions/{subscription}/beneficiaries/relationships | Consulta de relaciones
[**getBeneficiariesByRequestId**](CuentasDeBeneficiariosSPEIApi.md#getbeneficiariesbyrequestid) | **GET** /subscriptions/{subscription}/beneficiaries/spei/{requestId} | Consulta los beneficiarios por el identificador de la petición de registro
[**getBeneficiariesForAccountUsingGET**](CuentasDeBeneficiariosSPEIApi.md#getbeneficiariesforaccountusingget) | **GET** /subscriptions/{subscription}/beneficiaries/spei | Consulta los beneficiarios registrados
[**preRegisterAccountsUsingPOST**](CuentasDeBeneficiariosSPEIApi.md#preregisteraccountsusingpost) | **POST** /subscriptions/{subscription}/beneficiaries/spei | Pre-registro de cuentas de beneficiarios SPEI®.
[**removeBeneficiariesPendingUsingDELETE**](CuentasDeBeneficiariosSPEIApi.md#removebeneficiariespendingusingdelete) | **DELETE** /subscriptions/{subscription}/beneficiaries/spei/request/{requestId} | Eliminación de beneficiarios SPEI® sin confirmar
[**updateAmountLimitAccountUsingPUT**](CuentasDeBeneficiariosSPEIApi.md#updateamountlimitaccountusingput) | **PUT** /subscriptions/{subscription}/beneficiaries/spei/{account} | Solicitud para actualizar el monto límite de una cuenta

# **authorizeAccountsPendingPUT**
> \mx\wire4\client\model\AuthorizedBeneficiariesResponse authorizeAccountsPendingPUT($body, $authorization, $subscription)

Solicitud para agrupar cuentas de beneficiarios SPEI/SPID en estado pendiente.

Solicta la agrupación de las cuentas de beneficiarios en estado pendiente para que sean autorizadas,  para ello se crea un conjunto de éstas que puede incluir tanto de SPEI como de SPID. Además se debe indicar las urls de redirección en caso de error y éxito

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\UrlsRedirect(); // \mx\wire4\client\model\UrlsRedirect | Información de la cuenta del beneficiario
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $result = $apiInstance->authorizeAccountsPendingPUT($body, $authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->authorizeAccountsPendingPUT: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\UrlsRedirect**](../Model/UrlsRedirect.md)| Información de la cuenta del beneficiario |
 **authorization** | **string**| Header para token |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |

### Return type

[**\mx\wire4\client\model\AuthorizedBeneficiariesResponse**](../Model/AuthorizedBeneficiariesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteAccountUsingDELETE**
> deleteAccountUsingDELETE($authorization, $account, $subscription)

Elimina la cuenta del beneficiario

Elimina la cuenta de beneficiario proporcionada relacionada al contrato perteneciente a la suscripción. La cuenta a borrar debe ser una que opere con SPEI.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$account = "account_example"; // string | Es la cuenta del beneficiario que será eliminada.
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $apiInstance->deleteAccountUsingDELETE($authorization, $account, $subscription);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->deleteAccountUsingDELETE: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **account** | **string**| Es la cuenta del beneficiario que será eliminada. |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAvailableRelationshipsMonexUsingGET**
> \mx\wire4\client\model\RelationshipsResponse getAvailableRelationshipsMonexUsingGET($authorization, $subscription)

Consulta de relaciones

Obtiene las posibles relaciones existentes para registrar beneficiarios en Monex. Se debe invocar este recurso antes de pre-registrar una cuenta de beneficiario.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $result = $apiInstance->getAvailableRelationshipsMonexUsingGET($authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getAvailableRelationshipsMonexUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |

### Return type

[**\mx\wire4\client\model\RelationshipsResponse**](../Model/RelationshipsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBeneficiariesByRequestId**
> \mx\wire4\client\model\BeneficiariesResponse getBeneficiariesByRequestId($authorization, $request_id, $subscription)

Consulta los beneficiarios por el identificador de la petición de registro

Obtiene los beneficiarios enviados para registro en una petición al contrato relacionado con la suscripción, Los beneficiarios son los que actualmente se encuentran registrados en banca Monex, que pertenezcan a la petición que se solicita.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$request_id = "request_id_example"; // string | El identificador de la petición del registro de beneficiarios a esta API.
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $result = $apiInstance->getBeneficiariesByRequestId($authorization, $request_id, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getBeneficiariesByRequestId: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **request_id** | **string**| El identificador de la petición del registro de beneficiarios a esta API. |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |

### Return type

[**\mx\wire4\client\model\BeneficiariesResponse**](../Model/BeneficiariesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBeneficiariesForAccountUsingGET**
> \mx\wire4\client\model\BeneficiariesResponse getBeneficiariesForAccountUsingGET($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $page, $rfc, $size, $status)

Consulta los beneficiarios registrados

Obtiene los beneficiarios registrados al contrato relacionado con la suscripción, Los beneficiarios son los que actualmente se encuentran registrados en banca Monex.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.
$account = "account_example"; // string | Es la cuenta del beneficiario, podría ser teléfono celular (es de 10 dígitos), Tarjeta de débito (TDD, es de 16 dígitos) o cuenta CLABE (es de 18 dígitos). <br/><br/>Por ejemplo Teléfono celular: 5525072600, TDD: 4323 1234 5678 9123, CLABE: 032180000118359719.
$beneficiary_bank = "beneficiary_bank_example"; // string | Es la clave del banco beneficiario. Se puede obtener del recurso de las <a href=\"#operation/getAllInstitutionsUsingGET\">instituciones.</a>
$beneficiary_name = "beneficiary_name_example"; // string | Es el nombre del beneficiario.
$end_date = "end_date_example"; // string | Es la fecha de inicio del perido a filtrar en formato dd-mm-yyyy.
$init_date = "init_date_example"; // string | Es la fºecha de inicio del perido a filtrar en formato dd-mm-yyyy.
$page = "0"; // string | Es el número de página.
$rfc = "rfc_example"; // string | Es el Registro Federal de Controbuyentes (RFC) del beneficiario.
$size = "20"; // string | Es el tamaño de página.
$status = "status_example"; // string | Es el estado (estatus) de la cuenta. Los valores pueden ser <b>PENDING</b> y <b>REGISTERED</b>.

try {
    $result = $apiInstance->getBeneficiariesForAccountUsingGET($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $page, $rfc, $size, $status);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->getBeneficiariesForAccountUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |
 **account** | **string**| Es la cuenta del beneficiario, podría ser teléfono celular (es de 10 dígitos), Tarjeta de débito (TDD, es de 16 dígitos) o cuenta CLABE (es de 18 dígitos). &lt;br/&gt;&lt;br/&gt;Por ejemplo Teléfono celular: 5525072600, TDD: 4323 1234 5678 9123, CLABE: 032180000118359719. | [optional]
 **beneficiary_bank** | **string**| Es la clave del banco beneficiario. Se puede obtener del recurso de las &lt;a href&#x3D;\&quot;#operation/getAllInstitutionsUsingGET\&quot;&gt;instituciones.&lt;/a&gt; | [optional]
 **beneficiary_name** | **string**| Es el nombre del beneficiario. | [optional]
 **end_date** | **string**| Es la fecha de inicio del perido a filtrar en formato dd-mm-yyyy. | [optional]
 **init_date** | **string**| Es la fºecha de inicio del perido a filtrar en formato dd-mm-yyyy. | [optional]
 **page** | **string**| Es el número de página. | [optional] [default to 0]
 **rfc** | **string**| Es el Registro Federal de Controbuyentes (RFC) del beneficiario. | [optional]
 **size** | **string**| Es el tamaño de página. | [optional] [default to 20]
 **status** | **string**| Es el estado (estatus) de la cuenta. Los valores pueden ser &lt;b&gt;PENDING&lt;/b&gt; y &lt;b&gt;REGISTERED&lt;/b&gt;. | [optional]

### Return type

[**\mx\wire4\client\model\BeneficiariesResponse**](../Model/BeneficiariesResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **preRegisterAccountsUsingPOST**
> \mx\wire4\client\model\TokenRequiredResponse preRegisterAccountsUsingPOST($body, $authorization, $subscription)

Pre-registro de cuentas de beneficiarios SPEI®.

Pre-registra una o más cuentas de beneficiario en la plataforma de Wire4, ésta le proporcionará una URL donde lo llevará al centro de autorización para que el cuentahabiente Monex ingrese su llave digital para confirmar el alta de las cuentas de beneficiarios.<br/> Los posibles valores de <em>relationship</em> y <em>kind_of_relationship</em> se deben  obtener de <a href=\"#operation/getAvailableRelationshipsMonexUsingGET\">/subscriptions/{subscription}/beneficiaries/relationships.</a><br/><br/>La confirmación de registro en Monex se realizará a través de una notificación a los webhooks registrados con el evento de tipo <a href=\"#section/Eventos/Tipos-de-Eventos\">ACCOUNT.CREATED.</a>

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\AccountRequest(); // \mx\wire4\client\model\AccountRequest | Información de la cuenta del beneficiario
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $result = $apiInstance->preRegisterAccountsUsingPOST($body, $authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->preRegisterAccountsUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\AccountRequest**](../Model/AccountRequest.md)| Información de la cuenta del beneficiario |
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

# **removeBeneficiariesPendingUsingDELETE**
> removeBeneficiariesPendingUsingDELETE($authorization, $request_id, $subscription)

Eliminación de beneficiarios SPEI® sin confirmar

Elimina uno o más beneficiarios que se encuentran en estado pendiente de confirmar (autorizar) de la cuenta del cliente Monex relacionada a la suscripción.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$request_id = "request_id_example"; // string | Es el identificador con el que se dió de alta a los beneficiarios (viene en el cuerpo de la respuesta del <a href=\"#operation/getAvailableRelationshipsMonexUsingGET\">pre-registro de beneficiarios</a>), los registros bajo éste campo van a ser eliminados.
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $apiInstance->removeBeneficiariesPendingUsingDELETE($authorization, $request_id, $subscription);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->removeBeneficiariesPendingUsingDELETE: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **request_id** | **string**| Es el identificador con el que se dió de alta a los beneficiarios (viene en el cuerpo de la respuesta del &lt;a href&#x3D;\&quot;#operation/getAvailableRelationshipsMonexUsingGET\&quot;&gt;pre-registro de beneficiarios&lt;/a&gt;), los registros bajo éste campo van a ser eliminados. |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateAmountLimitAccountUsingPUT**
> \mx\wire4\client\model\TokenRequiredResponse updateAmountLimitAccountUsingPUT($body, $authorization, $account, $subscription)

Solicitud para actualizar el monto límite de una cuenta

Se crea una solicitud para actualizar el monto límite a la cuenta de beneficiario proporcionada y relacionada al contrato perteneciente a la subscripción. Una vez enviada la solicitud se retornará una URl que lo llevará al centro de autorización para que el cuentahabiente Monex ingrese su llave digital para confirmar la actualización del monto límite.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\CuentasDeBeneficiariosSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\AmountRequest(); // \mx\wire4\client\model\AmountRequest | Información de la cuenta y el monto límite a actualizar.
$authorization = "authorization_example"; // string | Header para token
$account = "account_example"; // string | Es la cuenta que va a ser actualizada.
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $result = $apiInstance->updateAmountLimitAccountUsingPUT($body, $authorization, $account, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CuentasDeBeneficiariosSPEIApi->updateAmountLimitAccountUsingPUT: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\AmountRequest**](../Model/AmountRequest.md)| Información de la cuenta y el monto límite a actualizar. |
 **authorization** | **string**| Header para token |
 **account** | **string**| Es la cuenta que va a ser actualizada. |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

