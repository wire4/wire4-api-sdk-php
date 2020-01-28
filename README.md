# wire4-php-client
Referencia de la API de Wire4

Cliente sdk para trabajar con el api de wire4<br>Wire4 es una API - Fintech de Banco Monex con la que podrás administrar transferencias SPEI

- API version: 1.0.0

## Requisitos

PHP 5.5 o posterior

## Instalación y uso
### Composer

Para instalar via [Composer](http://getcomposer.org/), agrega lo siguiente a `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/wire4/wire4-php-client/mx-wire4.git"
    }
  ],
  "require": {
    "wire4-php-client/mx-wire4": "*@dev"
  }
}
```

Ejecuta el siguiente comando:

`composer install`

o simplemente ejecuta desde la línea de comandos la siguiente línea:

`composer require wire4-php-client/mx-wire4`

Una vez que se instalo el cliente en tu proyecto importa el autoload.php

```php
    require_once('/path/to/wire4-php-client/vendor/autoload.php');
```

## Cómo iniciar

Por favor sigue el procedimiento de instalación (Instalacion y uso) y ejecuta el siguiente código de ejemplo reemplazando las credenciales de aplicación por tus datos. Toma en cuanta que estos son ejemplos que te servirán de referencia y que pueden cambiar pero debes crear una cuenta en wire4.mx para obtener tus datos de aplicación.

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

try {
    // Create the authenticator to obtain access token
    $oauth = new mx\wire4\OAuthWire4(
        'YOUR_OAUTH_CONSUMER_KEY', //REPLACE THIS WITH YOUR DATA
        'YOUR_OAUTH_CONSUMER_SECRET', //REPLACE THIS WITH YOUR DATA
        \mx\wire4\Environment::SANDBOX); // O \mx\wire4\Environment::PRODUCTION
    // Obtain an access token use application flow and scope "general"
    $accessToken= $oauth->obtainAccessTokenApp("general");
} catch(OAuthException $e) {
    echo "Respuesta: ". $e->lastResponse . "\n";
}

// Configure OAuth2 access token for authorization: wire4_aut_app
$config = mx\wire4\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN'); // $accessToken

$apiInstance = new mx\wire4\client\api\ComprobanteElectrnicoDePagoCEPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$body = new \mx\wire4\client\model\CepSearchBanxico(); // \mx\wire4\client\model\CepSearchBanxico | Información para buscar un CEP

try {
    $result = $apiInstance->obtainTransactionCepUsingPOST($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ComprobanteElectrnicoDePagoCEPApi->obtainTransactionCepUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

Para más detalle o la forma en como puedes utilizar cada uno de los métodos de la API te recomendamos revisar la documentación en la sección de "Referencia" en https://wire4.mx

## Documentación para los Endpoints de la API

Todos los URIs son relativos a *https://sandbox-api.wire4.mx/wire4/1.0.0* en el ambiente de sandbox o *https://api.wire4.mx/wire4/1.0.0* para el ambiente de producción.

Clase | Metodo | HTTP request | Descripción
------------ | ------------- | ------------- | -------------
*ComprobanteElectrnicoDePagoCEPApi* | [**obtainTransactionCepUsingPOST**](sdk-client/docs/Api/ComprobanteElectrnicoDePagoCEPApi.md#obtaintransactioncepusingpost) | **POST** /ceps | Consulta de CEP
*ContactoApi* | [**sendContactUsingPOST**](sdk-client/docs/Api/ContactoApi.md#sendcontactusingpost) | **POST** /contact | Solicitud de contacto
*CuentasDeBeneficiariosSPEIApi* | [**deleteAccountUsingDELETE**](sdk-client/docs/Api/CuentasDeBeneficiariosSPEIApi.md#deleteaccountusingdelete) | **DELETE** /subscriptions/{subscription}/beneficiaries/spei/{account} | Elimina la cuenta del beneficiario
*CuentasDeBeneficiariosSPEIApi* | [**getAvailableRelationshipsMonexUsingGET**](sdk-client/docs/Api/CuentasDeBeneficiariosSPEIApi.md#getavailablerelationshipsmonexusingget) | **GET** /subscriptions/{subscription}/beneficiaries/relationships | Consulta de relaciones
*CuentasDeBeneficiariosSPEIApi* | [**getBeneficiariesForAccountUsingGET**](sdk-client/docs/Api/CuentasDeBeneficiariosSPEIApi.md#getbeneficiariesforaccountusingget) | **GET** /subscriptions/{subscription}/beneficiaries/spei | Consulta los beneficiarios registrados
*CuentasDeBeneficiariosSPEIApi* | [**preRegisterAccountsUsingPOST**](sdk-client/docs/Api/CuentasDeBeneficiariosSPEIApi.md#preregisteraccountsusingpost) | **POST** /subscriptions/{subscription}/beneficiaries/spei | Pre-registro de cuentas de beneficiarios.
*CuentasDeBeneficiariosSPEIApi* | [**removeBeneficiariesPendingUsingDELETE**](sdk-client/docs/Api/CuentasDeBeneficiariosSPEIApi.md#removebeneficiariespendingusingdelete) | **DELETE** /subscriptions/{subscription}/beneficiaries/spei/request/{requestId} | Eliminación de beneficiarios SPEI® sin confirmar
*CuentasDeBeneficiariosSPEIApi* | [**updateAmountLimitAccountUsingPUT**](sdk-client/docs/Api/CuentasDeBeneficiariosSPEIApi.md#updateamountlimitaccountusingput) | **PUT** /subscriptions/{subscription}/beneficiaries/spei/{account} | Actualiza el monto límite
*CuentasDeBeneficiariosSPIDApi* | [**preRegisterAccountsUsingPOST1**](sdk-client/docs/Api/CuentasDeBeneficiariosSPIDApi.md#preregisteraccountsusingpost1) | **POST** /subscriptions/{subscription}/beneficiaries/spid | Pre-registro de cuentas de beneficiarios SPID
*DepositantesApi* | [**getDepositantsUsingGET**](sdk-client/docs/Api/DepositantesApi.md#getdepositantsusingget) | **GET** /subscriptions/{subscription}/depositants | Consulta de cuentas de depositantes
*DepositantesApi* | [**registerDepositantsUsingPOST**](sdk-client/docs/Api/DepositantesApi.md#registerdepositantsusingpost) | **POST** /subscriptions/{subscription}/depositants | Registra un nuevo depositante
*FacturasApi* | [**billingsReportByIdUsingGET**](sdk-client/docs/Api/FacturasApi.md#billingsreportbyidusingget) | **GET** /billings/{id} | Consulta de facturas por identificador
*FacturasApi* | [**billingsReportUsingGET**](sdk-client/docs/Api/FacturasApi.md#billingsreportusingget) | **GET** /billings | Consulta de facturas
*InstitucionesApi* | [**getAllInstitutionsUsingGET**](sdk-client/docs/Api/InstitucionesApi.md#getallinstitutionsusingget) | **GET** /institutions | Información de instituciones bancarias.
*SaldoApi* | [**getBalanceUsingGET**](sdk-client/docs/Api/SaldoApi.md#getbalanceusingget) | **GET** /subscriptions/{subscription}/balance | Consulta los saldo de una cuenta
*SuscripcionesApi* | [**preEnrollmentMonexUserUsingPOST**](sdk-client/docs/Api/SuscripcionesApi.md#preenrollmentmonexuserusingpost) | **POST** /subscriptions/pre-subscription | registra una pre-suscripción
*SuscripcionesApi* | [**removeEnrollmentUserUsingDELETE**](sdk-client/docs/Api/SuscripcionesApi.md#removeenrollmentuserusingdelete) | **DELETE** /subscriptions/{subscription} | Elimna una suscripción por id
*SuscripcionesApi* | [**removeSubscriptionPendingStatusUsingDELETE**](sdk-client/docs/Api/SuscripcionesApi.md#removesubscriptionpendingstatususingdelete) | **DELETE** /subscriptions/pre-subscription/{subscription} | Elimna una pre-suscripción
*TransferenciasSPEIApi* | [**dropTransactionsPendingUsingDELETE**](sdk-client/docs/Api/TransferenciasSPEIApi.md#droptransactionspendingusingdelete) | **DELETE** /subscriptions/{subscription}/transactions/outcoming/spei/request/{requestId} | Eliminación de transferencias SPEI® pendientes
*TransferenciasSPEIApi* | [**incomingSpeiTransactionsReportUsingGET**](sdk-client/docs/Api/TransferenciasSPEIApi.md#incomingspeitransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/incoming/spei | Consulta de transferencias recibidas
*TransferenciasSPEIApi* | [**outCommingSpeiRequestIdTransactionsReportUsingGET**](sdk-client/docs/Api/TransferenciasSPEIApi.md#outcommingspeirequestidtransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/outcoming/spei/{requestId} | Consulta de transferencias de salida por identificador de petición
*TransferenciasSPEIApi* | [**outgoingSpeiTransactionsReportUsingGET**](sdk-client/docs/Api/TransferenciasSPEIApi.md#outgoingspeitransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/outcoming/spei | Consulta de transferencias realizadas
*TransferenciasSPEIApi* | [**registerOutgoingSpeiTransactionUsingPOST**](sdk-client/docs/Api/TransferenciasSPEIApi.md#registeroutgoingspeitransactionusingpost) | **POST** /subscriptions/{subscription}/transactions/outcoming/spei | Registro de transferencias
*TransferenciasSPIDApi* | [**getSpidClassificationsUsingGET**](sdk-client/docs/Api/TransferenciasSPIDApi.md#getspidclassificationsusingget) | **GET** /subscriptions/{subscription}/beneficiaries/spid/classifications | Consulta las clasificaciones para operaciones con SPID
*TransferenciasSPIDApi* | [**registerOutgoingSpidTransactionUsingPOST**](sdk-client/docs/Api/TransferenciasSPIDApi.md#registeroutgoingspidtransactionusingpost) | **POST** /subscriptions/{subscription}/transactions/outcoming/spid | Registro de transferencias SPID
*WebhooksApi* | [**getWebhook**](sdk-client/docs/Api/WebhooksApi.md#getwebhook) | **GET** /webhooks/{id} | Consulta de Webhook
*WebhooksApi* | [**getWebhooks**](sdk-client/docs/Api/WebhooksApi.md#getwebhooks) | **GET** /webhooks | Consulta de Webhooks
*WebhooksApi* | [**registerWebhook**](sdk-client/docs/Api/WebhooksApi.md#registerwebhook) | **POST** /webhooks | Alta de Webhook

## Documentación para los modelos

 - [Account](sdk-client/docs/Model/Account.md)
 - [AccountRequest](sdk-client/docs/Model/AccountRequest.md)
 - [AccountResponse](sdk-client/docs/Model/AccountResponse.md)
 - [AccountSpid](sdk-client/docs/Model/AccountSpid.md)
 - [AmountRequest](sdk-client/docs/Model/AmountRequest.md)
 - [Balance](sdk-client/docs/Model/Balance.md)
 - [BalanceListResponse](sdk-client/docs/Model/BalanceListResponse.md)
 - [BeneficiariesResponse](sdk-client/docs/Model/BeneficiariesResponse.md)
 - [BeneficiaryInstitution](sdk-client/docs/Model/BeneficiaryInstitution.md)
 - [Billing](sdk-client/docs/Model/Billing.md)
 - [BillingTransaction](sdk-client/docs/Model/BillingTransaction.md)
 - [CepResponse](sdk-client/docs/Model/CepResponse.md)
 - [CepSearchBanxico](sdk-client/docs/Model/CepSearchBanxico.md)
 - [ContactRequest](sdk-client/docs/Model/ContactRequest.md)
 - [Deposit](sdk-client/docs/Model/Deposit.md)
 - [Depositant](sdk-client/docs/Model/Depositant.md)
 - [DepositantsRegister](sdk-client/docs/Model/DepositantsRegister.md)
 - [DepositantsResponse](sdk-client/docs/Model/DepositantsResponse.md)
 - [ErrorResponse](sdk-client/docs/Model/ErrorResponse.md)
 - [GetDepositants](sdk-client/docs/Model/GetDepositants.md)
 - [Institution](sdk-client/docs/Model/Institution.md)
 - [InstitutionsList](sdk-client/docs/Model/InstitutionsList.md)
 - [MessageAccountBeneficiary](sdk-client/docs/Model/MessageAccountBeneficiary.md)
 - [MessageCEP](sdk-client/docs/Model/MessageCEP.md)
 - [MessageDepositReceived](sdk-client/docs/Model/MessageDepositReceived.md)
 - [MessageInstitution](sdk-client/docs/Model/MessageInstitution.md)
 - [MessagePayment](docs/Model/MessagePayment.md)
 - [MessageSubscription](docs/Model/MessageSubscription.md)
 - [MessageWebHook](docs/Model/MessageWebHook.md)
 - [Payment](docs/Model/Payment.md)
 - [PaymentsRequestId](docs/Model/PaymentsRequestId.md)
 - [Person](docs/Model/Person.md)
 - [PreEnrollmentData](docs/Model/PreEnrollmentData.md)
 - [PreEnrollmentResponse](docs/Model/PreEnrollmentResponse.md)
 - [Relationship](docs/Model/Relationship.md)
 - [RelationshipsResponse](docs/Model/RelationshipsResponse.md)
 - [SpidClassificationDTO](docs/Model/SpidClassificationDTO.md)
 - [SpidClassificationsResponseDTO](docs/Model/SpidClassificationsResponseDTO.md)
 - [Timestamp](docs/Model/Timestamp.md)
 - [TokenRequiredResponse](docs/Model/TokenRequiredResponse.md)
 - [TransactionOutgoing](docs/Model/TransactionOutgoing.md)
 - [TransactionOutgoingSpid](docs/Model/TransactionOutgoingSpid.md)
 - [TransactionsOutgoingRegister](docs/Model/TransactionsOutgoingRegister.md)
 - [WebhookRequest](docs/Model/WebhookRequest.md)
 - [WebhookResponse](docs/Model/WebhookResponse.md)
 - [WebhooksList](docs/Model/WebhooksList.md)

## Validación de firma de webhooks

Te recomendamos revisar la documentación de Referencia de wire4 para mas detalle, no obstante te dejamos un ejemplo de validación de firmas para este cliente.

```php
    $message = "{\"id\":\"evt_641296342fdbf2db40ce674dde4881b87ada81b1695ae1c54666578272c1cd10\",\"object\":\"spid_outgoing\",\"api_version\":\"1.0.0\",\"created\":\"2019-12-05T11:55:10.058-06:00\",\"data\":{\"account\":\"8999998\",\"amount\":120.25,\"currency_code\":\"USD\",\"monex_description\":\"Nombre Receptor: BANAMEX | Monto Pago: 120.25 | Cuenta beneficiaria: 112680000189999984 | Nombre Beneficiario: notificar@wire4.mx | Clave de Rastreo:  | Referencia Numerica: 1234567 | Concepto del pago: Transfer out test 1 | Fecha Confirmacion de Liquidacion: 05-12-2019 11:55:10\",\"detention_message\":\"Cuenta de beneficiario, no existe\",\"payment_order_id\":1427991983,\"status_code\":\"FAILED\",\"transaction_id\":704814938,\"beneficiary_account\":\"112680000189999984\",\"beneficiary_bank\":{\"key\":\"40112\",\"name\":\"BMONEX\",\"company_name\":\"BANCO MONEX S.A. INSTITUCION DE BANCA MULTIPLE, MONEX GRUPO FINANCIERO\",\"rfc\":\"BMI9704113PA\"},\"beneficiary_name\":\"notificar@wire4.mx\",\"concept\":\"Transfer out test 1\",\"order_id\":\"8A736A1D-ECA6-4959-93FE-794365F53E24\",\"reference\":1234567,\"request_id\":\"7dbf528d-b395-4779-924e-b182a4de17a5\",\"cep\":{}},\"livemode\":false,\"pending_webhooks\":0,\"request\":\"8A736A1D-ECA6-4959-93FE-794365F53E24\",\"type\":\"TRANSACTION.OUTGOING.SPID.RECEIVED\"}";
    $referenceString = "7c088d16a8a25f1640e95dfdce65770cb0a31dc0e71a9749bba1e4e114201efb6e78c50bea3d8d9337b8ea63b2a8abf5b1e03d0cf9dda6f8e83a509d1ac11908";
    $key = "wh_6b5cb70ab7fd489a8bd0c9d06513008"; //Lo encontraras en la consola de administracion de wire4.mx una vez que estes registrado y hayas dado de alta un webhook, reemplaza este valor

    $signResult = \mx\wire4\webhooks\sign\UtilsCompute::toExadecimal(
        \mx\wire4\webhooks\sign\UtilsCompute::computeHmacSha512($message, $key));

    var_dump($signResult);

    if( ! \mx\wire4\webhooks\sign\UtilsCompute::compareSignatures($referenceString,$signResult) ) {
        echo "Las firmas no son iguales:";

    } else {
        echo "Las validacion de firmas es correcta";
    }

    echo "\noriginal:".$referenceString;
    echo "\nresultado:".$signResult;

```
## Documentación para la autenticación


## wire4_aut_app

- **Type**: OAuth
- **Flow**: application
- **Authorization URL Sandbox**: *https://sandbox-api.wire4.mx/token*
- **Authorization URL Producción**: *https://api.wire4.mx/token*
- **Scopes**:
 - **** `general`:

## wire4_aut_app_user_spei

- **Type**: OAuth
- **Flow**: password
- **Authorization URL Sandbox**: *https://sandbox-api.wire4.mx/token*
- **Authorization URL Producción**: *https://api.wire4.mx/token*
- **Scopes**:
- **** spei_admin:

## wire4_aut_app_user_spid

- **Type**: OAuth
- **Flow**: password
- **Authorization URL Sandbox**: *https://sandbox-api.wire4.mx/token*
- **Authorization URL Producción**: *https://api.wire4.mx/token*
- **Scopes**:
- **** spid_admin:


## Author

Wire4 Todos los derechos reservados 2019. Politicas de privacidad - Términos y condiciones  *https://wire4.mx/#/policies/use-policies*
