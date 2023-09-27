# mx\wire4\TransferenciasSPEIApi

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createAuthorizationTransactionsGroup**](TransferenciasSPEIApi.md#createauthorizationtransactionsgroup) | **POST** /subscriptions/{subscription}/transactions/group | Agrupa transacciones bajo un request_id
[**dropTransactionsPendingUsingDELETE**](TransferenciasSPEIApi.md#droptransactionspendingusingdelete) | **DELETE** /subscriptions/{subscription}/transactions/outcoming/spei/request/{requestId} | Eliminación de transferencias SPEI® pendientes
[**incomingSpeiTransactionsReportUsingGET**](TransferenciasSPEIApi.md#incomingspeitransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/incoming/spei | Consulta de transferencias recibidas
[**outCommingSpeiRequestIdTransactionsReportUsingGET**](TransferenciasSPEIApi.md#outcommingspeirequestidtransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/outcoming/spei/{requestId} | Consulta de transferencias de salida por identificador de petición
[**outCommingSpeiSpidOrderIdTransactionReportUsingGET**](TransferenciasSPEIApi.md#outcommingspeispidorderidtransactionreportusingget) | **GET** /subscriptions/{subscription}/transactions/outcoming | Consulta de transferencias realizadas por order_id
[**outCommingSpeiSpidRequestIdTransactionsReportUsingGET**](TransferenciasSPEIApi.md#outcommingspeispidrequestidtransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/outcoming/{requestId} | Consulta de transferencias de salida por identificador de petición
[**outgoingSpeiTransactionsReportUsingGET**](TransferenciasSPEIApi.md#outgoingspeitransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/outcoming/spei | Consulta de transferencias realizadas
[**registerOutgoingSpeiTransactionUsingPOST**](TransferenciasSPEIApi.md#registeroutgoingspeitransactionusingpost) | **POST** /subscriptions/{subscription}/transactions/outcoming/spei | Registro de transferencias
[**registerSpeiSpidOutgoingTransactionsUsingPOST**](TransferenciasSPEIApi.md#registerspeispidoutgoingtransactionsusingpost) | **POST** /subscriptions/{subscription}/transactions/outcoming | Registro de transferencias SPEI y SPID

# **createAuthorizationTransactionsGroup**
> \mx\wire4\client\model\TokenRequiredResponse createAuthorizationTransactionsGroup($body, $authorization, $subscription)

Agrupa transacciones bajo un request_id

Agrupa transacciones SPEI/SPID en un mismo transaction_id, posteriormente genera la dirección URL del centro de autorización para la confirmación de las transacciones. <br><br>Las transacciones deben estar en estatus PENDING y pertenecer a un mismo contrato.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\AuthorizationTransactionGroup(); // \mx\wire4\client\model\AuthorizationTransactionGroup | Objeto con la información para agrupar transacciones existentes y autorizarlas de forma conjunta.
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el Identificador de la suscripción.

try {
    $result = $apiInstance->createAuthorizationTransactionsGroup($body, $authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPEIApi->createAuthorizationTransactionsGroup: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\AuthorizationTransactionGroup**](../Model/AuthorizationTransactionGroup.md)| Objeto con la información para agrupar transacciones existentes y autorizarlas de forma conjunta. |
 **authorization** | **string**| Header para token |
 **subscription** | **string**| Es el Identificador de la suscripción. |

### Return type

[**\mx\wire4\client\model\TokenRequiredResponse**](../Model/TokenRequiredResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: */*

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **dropTransactionsPendingUsingDELETE**
> dropTransactionsPendingUsingDELETE($authorization, $request_id, $subscription, $order_id)

Eliminación de transferencias SPEI® pendientes

Elimina un conjunto de transferencias en estado pendiente de confirmar o autorizar, en la cuenta del cliente Monex relacionada a la suscripción.<br><br><b>Nota:</b> Las transferencias no deben haber sido confirmadas o autorizadas por el cliente.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$request_id = "request_id_example"; // string | Identificador de las transferencias a eliminar.
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.
$order_id = "order_id_example"; // string | Listado de identificadores dentro del request_id para eliminar.

try {
    $apiInstance->dropTransactionsPendingUsingDELETE($authorization, $request_id, $subscription, $order_id);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPEIApi->dropTransactionsPendingUsingDELETE: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **request_id** | **string**| Identificador de las transferencias a eliminar. |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |
 **order_id** | **string**| Listado de identificadores dentro del request_id para eliminar. | [optional]

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **incomingSpeiTransactionsReportUsingGET**
> \mx\wire4\client\model\Deposit[] incomingSpeiTransactionsReportUsingGET($authorization, $subscription, $begin_date, $end_date)

Consulta de transferencias recibidas

Realiza una consulta de las transferencias recibidas (depósitos) en la cuenta del cliente Monex relacionada a la suscripción, las transferencias que regresa este recuso son únicamente las transferencias  recibidas durante el día en el que se realiza la consulta. Para consultar transacciones que se encuentran en otras fechas se debe utilizar los parámetros de fecha inicial (beginDate) y fecha final (endDate), siempre deben de ir las dos ya que en caso de que falte una marcará error la consulta, si faltan las dos la consulta lanzará solo las del día, como se describe al inicio. El formato para las fechas es \"yyyy-MM-dd\"

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.
$begin_date = "begin_date_example"; // string | Fecha inicial para filtrar los depósitos, se espera en formato 'yyyy-MM-dd'
$end_date = "end_date_example"; // string | Fecha final para filtrar los depósitos, se espera en formato 'yyyy-MM-dd'

try {
    $result = $apiInstance->incomingSpeiTransactionsReportUsingGET($authorization, $subscription, $begin_date, $end_date);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPEIApi->incomingSpeiTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |
 **begin_date** | **string**| Fecha inicial para filtrar los depósitos, se espera en formato &#x27;yyyy-MM-dd&#x27; | [optional]
 **end_date** | **string**| Fecha final para filtrar los depósitos, se espera en formato &#x27;yyyy-MM-dd&#x27; | [optional]

### Return type

[**\mx\wire4\client\model\Deposit[]**](../Model/Deposit.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **outCommingSpeiRequestIdTransactionsReportUsingGET**
> \mx\wire4\client\model\PaymentsRequestId outCommingSpeiRequestIdTransactionsReportUsingGET($authorization, $request_id, $subscription)

Consulta de transferencias de salida por identificador de petición

Consulta las transferencias de salida registradas en una petición, las transferencias que regresa este recuso son únicamente las transferencias de salida agrupadas al identificador de la petición que se generó al hacer el registro de las transacciones el cuál se debe especificar como parte del path de este endpoint.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$request_id = "request_id_example"; // string | Identificador de la petición a buscar.
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $result = $apiInstance->outCommingSpeiRequestIdTransactionsReportUsingGET($authorization, $request_id, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPEIApi->outCommingSpeiRequestIdTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **request_id** | **string**| Identificador de la petición a buscar. |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |

### Return type

[**\mx\wire4\client\model\PaymentsRequestId**](../Model/PaymentsRequestId.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **outCommingSpeiSpidOrderIdTransactionReportUsingGET**
> \mx\wire4\client\model\PaymentsSpeiAndSpidOrderId outCommingSpeiSpidOrderIdTransactionReportUsingGET($authorization, $subscription, $order_id)

Consulta de transferencias realizadas por order_id

Consulta las transferencias que regresa este recuso son únicamente las transferencias recibidas en el día en el que se realiza la consulta o las transferencias identificadas con el <strong>order_id</strong> proporcionado, para este tipo de consultas no importa el día en el que se realizó la transferencia. <br> Es importante que conozca que la respuesta puede dar como resultado un objeto con una lista spei o una lista spid con el/los elementos ya que un identificador order_id solo puede pertenecer a una transacción sea spei o spid.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.
$order_id = "order_id_example"; // string | Es el identificador de la orden a buscar.

try {
    $result = $apiInstance->outCommingSpeiSpidOrderIdTransactionReportUsingGET($authorization, $subscription, $order_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPEIApi->outCommingSpeiSpidOrderIdTransactionReportUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |
 **order_id** | **string**| Es el identificador de la orden a buscar. | [optional]

### Return type

[**\mx\wire4\client\model\PaymentsSpeiAndSpidOrderId**](../Model/PaymentsSpeiAndSpidOrderId.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **outCommingSpeiSpidRequestIdTransactionsReportUsingGET**
> \mx\wire4\client\model\PaymentsSpeiAndSpidRequestId outCommingSpeiSpidRequestIdTransactionsReportUsingGET($authorization, $request_id, $subscription)

Consulta de transferencias de salida por identificador de petición

Consulta las transferencias de salida registradas en una petición, las transferencias que regresa este recuso son únicamente las transferencias de salida agrupadas al identificador de la petición que se generó al hacer el registro de las transacciones el cuál se debe especificar como parte del path de este endpoint.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$request_id = "request_id_example"; // string | Identificador de la petición a buscar.
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $result = $apiInstance->outCommingSpeiSpidRequestIdTransactionsReportUsingGET($authorization, $request_id, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPEIApi->outCommingSpeiSpidRequestIdTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **request_id** | **string**| Identificador de la petición a buscar. |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |

### Return type

[**\mx\wire4\client\model\PaymentsSpeiAndSpidRequestId**](../Model/PaymentsSpeiAndSpidRequestId.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **outgoingSpeiTransactionsReportUsingGET**
> \mx\wire4\client\model\Payment[] outgoingSpeiTransactionsReportUsingGET($authorization, $subscription, $order_id)

Consulta de transferencias realizadas

Consulta las transferencias realizadas en la cuenta del cliente Monex relacionada a la suscripción, las transferencias que regresa este recuso son únicamente las transferencias recibidas en el día en el que se realiza la consulta.<br>Se pueden realizar consultas por <strong>order_id</strong> al realizar este tipo de consultas no importa el día en el que se realizó la transferencia

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.
$order_id = "order_id_example"; // string | Es el identificador de la orden a buscar.

try {
    $result = $apiInstance->outgoingSpeiTransactionsReportUsingGET($authorization, $subscription, $order_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPEIApi->outgoingSpeiTransactionsReportUsingGET: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **authorization** | **string**| Header para token |
 **subscription** | **string**| Es el identificador de la suscripción a esta API. |
 **order_id** | **string**| Es el identificador de la orden a buscar. | [optional]

### Return type

[**\mx\wire4\client\model\Payment[]**](../Model/Payment.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **registerOutgoingSpeiTransactionUsingPOST**
> \mx\wire4\client\model\TokenRequiredResponse registerOutgoingSpeiTransactionUsingPOST($body, $authorization, $subscription)

Registro de transferencias

Se registra un conjunto de transferencias (una o más) a realizar en la cuenta del cliente Monex relacionada a la suscripción. En la respuesta se proporcionará una dirección URL que lo llevará al centro de autorización para que las transferencias sean confirmadas (autorizadas) por el cliente para que se efectúen, para ello debe ingresar la llave electrónica (Token).<br>  Nota: Debe considerar que el concepto de cada una de las transacciones solo debe contener caracteres alfanuméricos por lo que en caso de que se reciban caracteres como ñ o acentos serán sustituidos por n o en su caso por la letra sin acento. Los caracteres no alfanuméricos como pueden ser caracteres especiales serán eliminados.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\TransactionsOutgoingRegister(); // \mx\wire4\client\model\TransactionsOutgoingRegister | Información de las transferencias SPEI de salida
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $result = $apiInstance->registerOutgoingSpeiTransactionUsingPOST($body, $authorization, $subscription);
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

# **registerSpeiSpidOutgoingTransactionsUsingPOST**
> \mx\wire4\client\model\TokenRequiredResponse registerSpeiSpidOutgoingTransactionsUsingPOST($body, $authorization, $subscription)

Registro de transferencias SPEI y SPID

Se registra un conjunto de transferencias (una o más) tanto SPEI como SPID en una sola petición en la cuenta del cliente Monex relacionada a la suscripción. En la respuesta se proporcionará una dirección URL que lo llevará al centro de autorización para que las transferencias sean confirmadas (autorizadas) por el cliente para que se efectúen, para ello debe ingresar la llave electrónica (Token).<br>  Nota: Debe considerar que el concepto de cada una de las transacciones solo debe contener caracteres alfanuméricos por lo que en caso de que se reciban caracteres como ñ o acentos serán sustituidos por n o en su caso por la letra sin acento. Los caracteres no alfanuméricos como pueden ser caracteres especiales serán eliminados.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\TransferenciasSPEIApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\TransactionsRegister(); // \mx\wire4\client\model\TransactionsRegister | Información de las transferencias SPEI y SPID de salida
$authorization = "authorization_example"; // string | Header para token
$subscription = "subscription_example"; // string | Es el identificador de la suscripción a esta API.

try {
    $result = $apiInstance->registerSpeiSpidOutgoingTransactionsUsingPOST($body, $authorization, $subscription);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransferenciasSPEIApi->registerSpeiSpidOutgoingTransactionsUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\mx\wire4\client\model\TransactionsRegister**](../Model/TransactionsRegister.md)| Información de las transferencias SPEI y SPID de salida |
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

