# ./
# Referencia de API La API de Wire4 está organizada en torno a REST. Nuestra API tiene URLs predecibles orientadas a los recursos, acepta peticiones en formato JSON, y las respuestas devueltas son formato JSON y utiliza códigos de respuesta HTTP, autenticación y verbos estándares.  Puede usar la API de Wire4 en nuestro entorno de prueba, que no afecta sus productivos ni interactúa con la red bancaria. La URL de conexión que se usa para invocar los servicios determina si la solicitud es en modo en de prueba o en modo producción.    # Autenticación La API de Wire4 utiliza el protocolo OAuth 2.0 para autenticación y autorización.   Para comenzar, es necesario que registre una cuenta en nuestro ambiente de pruebas en [registro](https://app-sndbx.wire4.mx/#/register) y obtenga las credenciales de cliente OAuth 2.0 desde la [consola de administración](https://app-sndbx.wire4.mx/#/dashboard/api-keys).   Esta página ofrece una descripción general de los escenarios de autorización de OAuth 2.0 que admite Wire4.   Después de crear su aplicación con Wire4, asegúrese de tener a la mano su `client_id` y `client_secret`. El siguiente paso es descubrir qué flujo de OAuth2 es el adecuado para sus propósitos.   ## URLS La siguiente tabla muestra las urls de los recursos de autenticación para el ambiente de pruebas.  URL                  | Descripción ------------------------------------ | ------------- https://sandbox-api.wire4.mx/token   | Obtener token de autorización llaves de API (*client_id*, *client_secret*), datos de suscripción (*client_id*, *client_secret*, *user_key*, *user_secret*) o (*refresh_token*) https://sandbox-api.wire4.mx/revoke  | Revocación de token  **Nota:** De acuerdo con el RFC 6749, la URL del token sólo acepta el tipo de contenido x-www-form-urlencoded. El contenido JSON no está permitido y devolverá un error.  ## Scopes Los `scopes` limitan el acceso de una aplicación a los recursos de Wire4. Se ofrecen los siguientes scopes:   Scope                    | Descripción ------------------------------------ | ------------- general                              | Permite llamar a operaciones que no requieren a un cliente Monex suscrito en Wire4, los recursos que se pueden consumir con este scope son: consulta de Instituciones, CEP y generación de una presuscripción. spei_admin                           | Permite llamar a operaciones que requieren de un cliente Monex suscrito en Wire4, ya que se proporciona información de saldos, administración de transacciones, cuentas de beneficiarios y cuentas de depositantes. spid_admin                           | Permite llamar sólo a operaciones SPID, se requiere de un cliente Monex suscrito en Wire4. codi_admin                           | Permite llamar sólo a operaciones CoDi. codi_report                          | Permite generar reportes de operaciones CoDi.  ## Tipos de autenticación   Wire4 cuenta con dos tipos de autenticación: Autenticación de Aplicación (OAuth 2.0  Client Credentials Grant)  y Autenticación de Usuario de Aplicación (OAuth 2.0 Password Grant).  ### Autenticación de Aplicación  Esta autenticación se obtiene proporcionando únicamente las llaves de API las cuales se pueden consultar en [Llaves de API](https://app-sndbx.wire4.mx/#/dashboard/api-keys) de la consola de administración.  La autenticación de aplicación sólo permite acceso a los recursos que no requieren una suscripción activa de un cliente Monex en Wire4.  Para este tipo de autenticación se sigue el flujo OAuth 2.0 Client Credentials Grant, que se describe más adelante en **Obtener el token de acceso de aplicación**, con este token se tiene acceso a los siguientes recursos:   * [/subscriptions/pre-subscription](link) * [/institutions](link>) * [/ceps](<link>)   ### Autenticación de Usuario de Aplicación  Esta autenticación se obtiene proporcionando las llaves de API las cuales se pueden consultar en [Llaves de API](https://app-sndbx.wire4.mx/#/dashboard/api-keys) más el ***user_key*** y ***user_secret*** que se proporcionan al momento de crear una suscripción, para más información puedes consultar la guía [creación de suscripción](https://www.wire4.mx/#/guides/subscriptions).  Con este tipo de autenticación se puede acceder a los recursos que proporcionan información de una cuenta Monex como saldos y administración de transacciones, cuentas de beneficiarios y cuentas de depositantes.    ## Obtener token de acceso Antes de que su aplicación pueda acceder a los datos mediante la API de Wire4, debe obtener un token de acceso ***(access_token)*** que le otorgue acceso a la API. En las siguientes secciones se muestra como obtener un token para cada una de las autenticaciones.     ### Obtener el token de acceso para autenticación de aplicación  El primer paso es crear la solicitud de token de acceso (*access_token*), con los parámetros que identifican su aplicación, el siguiente código muestra cómo obtener un `token`.  ``` curl -k -d \"grant_type= client_credentials&scope=general\"  -u \"<client id>:<client secret>\" https://sandbox-api.wire4.mx/token ``` **Ejemplo:**   ``` curl -k -d \"grant_type=client_credentials&scope=general\"  -u \"8e59YqaFW_Yo5dwWNxEY8Lid0u0a:AXahn79hfKWBXKzQfj011x8cvcQa\"  https://sandbox-api.wire4.mx /token ``` Obtendrá una respuesta como la que se muestra  a continuación, donde se debe obtener el *access_token* para realizar llamadas posteriores a la API.   ``` {     \"access_token\":\"eyJ4NXQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJraWQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJpc21hZWwuZXNjYW1pbGxhQHRjcGlwLnRlY2hAc2FuZGJveC5zcGVpb2suY29tIiwiYXVkIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsIm5iZiI6MTU3MTMyMDg3NywiYXpwIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsInNjb3BlIjoiYW1fYXBwbGljYXRpb25fc2NvcGUgZ2VuZXJhbCIsImlzcyI6ImFwaW0taWRwIiwiZXhwIjoxNTcxMzI0NDc3LCJpYXQiOjE1NzEzMjA4NzcsImp0aSI6ImJkMTdjMjcyLTg4MGQtNDk0ZS1iMTMwLTBiYTkwMjYyN2M4NCJ9.AjngGylkd_Chs5zlIjyLRPu9xPGyz4dfCd_aax2_ts653xrnNMoLpVHUDmaxIDFF2XyBJKH2IAbKxjo6VsFM07QkoPhlysO1PLoAF-Vkt4xYkh-f7nJRl0oOe2utDWFlUdgiAOmx5tPcStrdCEftgNNrjwJ50LXysFjXVshpoST-zIJPLgXknM3esGrkAsLcZRM7XUB187jxLHbtefVYPMvSO31T9pd5_Co9UXdeHpuA98sk_wZknASM1phxXQZAMLRLHz3LYvjCWCr_v80oVCM9SWTzf0vrMI6xphoIfirfWloADKPTTSUpIGBw9ePF_WbEPvbMm_BZaApJcEH2w\",    \"scope\":\"am_application_scope general\",    \"token_type\":\"Bearer\",    \"expires_in\":3600 }  ```  Es posible generar tokens con mas de un scope, en caso que sea necesario utilizar dicho token para hacer mas de una operación. Para generarlo basta con agregarlo a la petición separado por un espacio.     ``` curl -k -d \"grant_type=client_credentials&scope=codi_general codi_report\"  -u \"8e59YqaFW_Yo5dwWNxEY8Lid0u0a:AXahn79hfKWBXKzQfj011x8cvcQa\"  https://sandbox-api.wire4.mx /token ```  ### Obtener el token de acceso para autenticación usuario de aplicación   Antes de que su aplicación pueda acceder a los datos de una cuenta Monex mediante la API de Wire4, debe obtener un token de acceso  (*access_token*) que le otorgue acceso a la API y contar con el  *user_key* y *user_secret* que se proporcionan al momento de crear  una suscripción para más información puedes consultar [creación de suscripción](https://wire4.mx/#/guides/subscriptions) .   El primer paso es crear la solicitud de token de acceso con los parámetros que identifican su aplicación y la suscripción y con `scope` `spei_admin`  ```   curl -k -d \"grant_type=password&scope=spei_admin&username=<user_key>&password=<user_secret>\"  -u \"<client_id>:<client_secret>\" https://sandbox-api.wire4.mx/token ``` **Ejemplo**  ``` curl -k -d \"grant_type=password&scope=spei_admin&username=6 nbC5e99tTO@sandbox.wire4com&password= Nz7IqJGe9h\" -u \" zgMlQbqmOr:plkMJoPXCI\" https://sandbox-api.wire4.mx /token  ```  ``` {     \"access_token\":\"eyJ4NXQiOiJPR1EyTURFM00yTmpObVZoTnpFeE5EWXlObUV4TURKa01qUTJaVEU0TWpGaE1tVmlZakV5TkEiLCJraWQiOiJPR1EyTURFM00yTmpObVZoTnpFeE5EWXlObUV4TURKa01qUTJaVEU0TWpGaE1tVmlZakV5TkEiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiIzMzE0ODRlZTdjZDRkYWU5MzRmMjY2Zjc5YmY1YWFAZGV2LWllc2NhbWlsbGEuc3BlaW9rLmNvbSIsImF1ZCI6IkJVR0xjNWw1bW5CZXlPeGxtamNUZ0JoS19WTWEiLCJuYmYiOjE1NzEzNDk4ODMsImF6cCI6IkJVR0xjNWw1bW5CZXlPeGxtamNUZ0JoS19WTWEiLCJzY29wZSI6InNwZWlfYWRtaW4iLCJpc3MiOiJhcGltLWlkcCIsImV4cCI6MTU3MTM1MzQ4MywiaWF0IjoxNTcxMzQ5ODgzLCJqdGkiOiJiOWQ1M2Q0MC0xN2MwLTQxOTItYjUwNy0wZWFhN2ZkNDA1MGYifQ.hLTk8AFoIce1GpLcgch-U5aLLgiiFTo49wfBErD8D6VF-H9sG13ZyfAx9T-vQkk2m1zPapYVQjwibz3GRAJMN0Vczs6flV1mUJwFDQbEE-AELPdRcaRFOMBCfF6H9TVLfhFsGb9U2pVR9TLJcKqR57DyO_dIcc9I6d0tIkxqn2VcqypLVi5YQf36WzBbPeG-iPHYpMA-bhr4rwfjKA-O6jm1NSSxNHF4sHS0YHDPoO_x6cCc677MQEe0_CozfnQhoEWNfG8tcWUqhPtmcfjqon1p7PdQoXxriq_R85d06pVO9Se7Q6ok0V8Qgz0MOJ6z3ku6mtZSuba7niMAOt2TyA\",    \"refresh_token\":\"f962d5c6-0d99-3809-8275-11c7aa0aa020\",    \"scope\":\"spei_admin\",    \"token_type\":\"Bearer\",    \"expires_in\":3600 } ```  **Nota:** Los ejemplos anteriores se presentan considerando que se realiza una implementación desde cero,  esto se puede simplificar a sólo configurar sus llaves (*client_id*, *client_secret*),  datos de suscripción (*client_id*, *client_secret*, *user_key*, *user_secret*) si utiliza nuestros sdks.      ## Caducidad del token El token de acceso es válido durante 60 minutos (una hora), después de transcurrido este tiempo se debe solicitar un nuevo token,  cuando el token caduca se obtendrá un error ***401 Unauthorized*** con mensaje ***“Invalid Credentials”.***   El nuevo token se puede solicitar  utilizando el último token de actualización (***refresh_token***) que se devolvió en la solicitud del token,   esto sólo aplica para el token de tipo password (Autenticación de Usuario de Aplicación). El siguiente ejemplo muestra cómo obtener un toke con el token de actualización.  ``` curl -k -d \"grant_type=refresh_token&refresh_token=<refresh_token>\" -u \" Client_Id:Client_Secret\" -H \"Content-Type: application/x-www-form-urlencoded\" https://sandbox-api.wire4.mx/oauth2/token ```  **Ejemplo:**  ``` curl -k -d \"grant_type=refresh_token&refresh_token=f932d5c6-0d39-3809-8275-11c7ax0aa020\" -u \"zgMlQbqmOr:plkMJoPXCI\" -H \"Content-Type: application/x-www-form-urlencoded\" https://sandbox-api.wire4.mx/token ```  El token de actualización (***refresh_token***) tiene una duración de hasta 23 horas. Si en este periodo no se utiliza, se tienen que solicitar un nuevo token.  Un token de acceso podría dejar de funcionar por uno de estos motivos:  * El usuario ha revocado el acceso a su aplicación, si un usuario ha solicitado la baja de su aplicación de WIre4. * El token de acceso ha caducado: si el token de acceso ha pasado de una hora, recibirá un error ***401 Unauthorized*** mientras realiza una llamada a la API de Wire4. Cuando esto sucede, debe solicitar un nuevo token utilizando el token de actualización que recibió por última al solicitar un token, sólo aplica si el token en cuestión es de autenticación de usuario de aplicación, en caso contrario solicitar un nuevo token.   ## Revocar token Su aplicación puede revocar mediante programación el token de acceso, una vez revocado el token no podrá hacer uso de él para acceder a la API. El siguiente código muestra un ejemplo de cómo revocar el token:    ```  curl -X POST --basic -u \"<client id>:<client secret>\" -H \"Content-Type: application/x-www-form-urlencoded;charset=UTF-8\" -k -d \"token=<token to revoke>&token_type_hint=access_token\" https://sandbox-api.wire4.mx/revoke ```      **Ejemplo:**  ```   curl -X POST --basic -u \"8e59YqaFW_Yo5dwWNxEY8Lid0u0a:AXahn79hfKWBXKzQfj011x8cvcQa\" -H \"Content-Type: application/x-www-form-urlencoded;charset=UTF-8\" -k -d \"token=eyJ4NXQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJraWQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJpc21hZWwuZXNjYW1pbGxhQHRjcGlwLnRlY2hAc2FuZGJveC5zcGVpb2suY29tIiwiYXVkIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsIm5iZiI6MTU3MTMyMDg3NywiYXpwIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsInNjb3BlIjoiYW1fYXBwbGljYXRpb25fc2NvcGUgZ2VuZXJhbCIsImlzcyI6ImFwaW0taWRwIiwiZXhwIjoxNTcxMzI0NDc3LCJpYXQiOjE1NzEzMjA4NzcsImp0aSI6ImJkMTdjMjcyLTg4MGQtNDk0ZS1iMTMwLTBiYTkwMjYyN2M4NCJ9.AjngGylkd_Chs5zlIjyLRPu9xPGyz4dfCd_aax2_ts653xrnNMoLpVHUDmaxIDFF2XyBJKH2IAbKxjo6VsFM07QkoPhlysO1PLoAF-Vkt4xYkh-f7nJRl0oOe2utDWFlUdgiAOmx5tPcStrdCEftgNNrjwJ50LXysFjXVshpoST-zIJPLgXknM3esGrkAsLcZRM7XUB187jxLHbtefVYPMvSO31T9pd5_Co9UXdeHpuA98sk_wZknASM1phxXQZAMLRLHz3LYvjCWCr_v80oVCM9SWTzf0vrMI6xphoIfirfWloADKPTTSUpIGBw9ePF_WbEPvbMm_BZaApJcEH2w&token_type_hint=access_token\"  https://sandbox-api.wire4.mx/revoke ```  # Ambientes  Wire4 cuentas con dos ambientes Pruebas (Sandbox) y Producción, son dos ambientes separados los cuales se pueden utilizar simultáneamente. Los usuarios que han sido creados en cada uno de los ambientes no son intercambiables.   Las ligas de acceso a la `api` para cada uno de los ambientes son:  * Pruebas  https://sandbox-api.wire4.mx * Producción https://api.wire4.mx     # Eventos  Los eventos son nuestra forma de informarle cuando algo  sucede en su cuenta. Cuando ocurre un evento se crea un objeto  [Evento](#tag/Webhook-Message). Por ejemplo, cuando se recibe un depósito, se crea un evento TRANSACTION.INCOMING.UPDATED.   Los eventos ocurren cuando cambia el estado de un recurso. El recurso se encuentra dentro del objeto [Evento](#tag/Webhook-Message) en el campo data.  Por ejemplo, un evento TRANSACTION.INCOMING.UPDATED contendrá un depósito y un evento ACCOUNT.CREATED contendrá una cuenta.   Wire4 puede agregar más campos en un futuro, o agregar nuevos valores a campos existentes, por lo que es recomendado que tu endpoint pueda manejar datos adicionales desconocidos. En esta [liga](#tag/Webhook-Message) se encuentra  la definición del objeto [Evento](#tag/Webhook-Message).  ## Tipos de Eventos  Wire4 cuenta con los siguientes tipos de eventos*   | Evento                     | Tipo                               | Objeto                                        | | -------------------------- |----------------------------------- | --------------------------------------------- | | Suscripción                | ENROLLMENT.CREATED                 | [suscription](#tag/subscription)              | | Cuenta de beneficiario     | ACCOUNT.CREATED                    | [beneficiary](#tag/BeneficiaryAccount)        | | Depósito recibido          | TRANSACTION.INCOMING.UPDATED       | [spei_incoming](#tag/deposit)                 | | Transferencia realizada    | TRANSACTION.OUTGOING.RECEIVED      | [spei_outgoing](#tag/transfer)                | | Transferencia SPID enviada | TRANSACTION.OUTGOING.SPID.RECEIVED | [spid_outgoing](#tag/transfer)                | | Transferencias Autorizadas | REQUEST.OUTGOING.CHANGED           | [request_outgoing](#tag/requestOutMsg)        | | Punto de venta CoDi        | SALE.POINT.CREATED                 |

This PHP package is automatically generated by the [Swagger Codegen](https://github.com/swagger-api/swagger-codegen) project:

- API version: 1.0.0
- Build package: io.swagger.codegen.v3.generators.php.PhpClientCodegen

## Requirements

PHP 5.5 and later

## Installation & Usage
### Composer

To install the bindings via [Composer](http://getcomposer.org/), add the following to `composer.json`:

```
{
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/wire4/sdk-client.git"
    }
  ],
  "require": {
    "wire4/sdk-client": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
    require_once('/path/to/.//vendor/autoload.php');
```

## Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new mx\wire4\client\api\ComprobanteElectrnicoDePagoCEPApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \mx\wire4\client\model\CepSearchBanxico(); // \mx\wire4\client\model\CepSearchBanxico | Información para buscar un CEP
$authorization = "authorization_example"; // string | Header para token

try {
    $result = $apiInstance->obtainTransactionCepUsingPOST($body, $authorization);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ComprobanteElectrnicoDePagoCEPApi->obtainTransactionCepUsingPOST: ', $e->getMessage(), PHP_EOL;
}
?>
```

## Documentation for API Endpoints

All URIs are relative to *https://sandbox-api.wire4.mx/wire4/1.0.0*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ComprobanteElectrnicoDePagoCEPApi* | [**obtainTransactionCepUsingPOST**](docs/Api/ComprobanteElectrnicoDePagoCEPApi.md#obtaintransactioncepusingpost) | **POST** /ceps | Consulta de CEP
*ContactoApi* | [**sendContactUsingPOST**](docs/Api/ContactoApi.md#sendcontactusingpost) | **POST** /contact | Solicitud de contacto
*ContractsDetailsApi* | [**createAuthorization**](docs/Api/ContractsDetailsApi.md#createauthorization) | **POST** /onboarding/accounts/authorize | Devuelve la URL para autorización del usuario Monex
*ContractsDetailsApi* | [**obtainAuthorizedUsers**](docs/Api/ContractsDetailsApi.md#obtainauthorizedusers) | **GET** /onboarding/accounts/{requestId}/authorized-users | Obtiene los usuarios autorizados
*ContractsDetailsApi* | [**obtainContractDetails**](docs/Api/ContractsDetailsApi.md#obtaincontractdetails) | **POST** /onboarding/accounts/details | Obtiene los detalles de la empresa del contrato
*CuentasDeBeneficiariosSPEIApi* | [**authorizeAccountsPendingPUT**](docs/Api/CuentasDeBeneficiariosSPEIApi.md#authorizeaccountspendingput) | **PUT** /subscriptions/{subscription}/beneficiaries/pending | Recibe la solicitud para agrupar las cuentas SPEI/SPID de beneficiarios en estado pendiente que deben ser autorizadas
*CuentasDeBeneficiariosSPEIApi* | [**deleteAccountUsingDELETE**](docs/Api/CuentasDeBeneficiariosSPEIApi.md#deleteaccountusingdelete) | **DELETE** /subscriptions/{subscription}/beneficiaries/spei/{account} | Elimina la cuenta del beneficiario
*CuentasDeBeneficiariosSPEIApi* | [**getAvailableRelationshipsMonexUsingGET**](docs/Api/CuentasDeBeneficiariosSPEIApi.md#getavailablerelationshipsmonexusingget) | **GET** /subscriptions/{subscription}/beneficiaries/relationships | Consulta de relaciones
*CuentasDeBeneficiariosSPEIApi* | [**getBeneficiariesByRequestId**](docs/Api/CuentasDeBeneficiariosSPEIApi.md#getbeneficiariesbyrequestid) | **GET** /subscriptions/{subscription}/beneficiaries/spei/{requestId} | Consulta los beneficiarios por el identificador de la petición de registro
*CuentasDeBeneficiariosSPEIApi* | [**getBeneficiariesForAccountUsingGET**](docs/Api/CuentasDeBeneficiariosSPEIApi.md#getbeneficiariesforaccountusingget) | **GET** /subscriptions/{subscription}/beneficiaries/spei | Consulta los beneficiarios registrados
*CuentasDeBeneficiariosSPEIApi* | [**preRegisterAccountsUsingPOST**](docs/Api/CuentasDeBeneficiariosSPEIApi.md#preregisteraccountsusingpost) | **POST** /subscriptions/{subscription}/beneficiaries/spei | Pre-registro de cuentas de beneficiarios.
*CuentasDeBeneficiariosSPEIApi* | [**removeBeneficiariesPendingUsingDELETE**](docs/Api/CuentasDeBeneficiariosSPEIApi.md#removebeneficiariespendingusingdelete) | **DELETE** /subscriptions/{subscription}/beneficiaries/spei/request/{requestId} | Eliminación de beneficiarios SPEI® sin confirmar
*CuentasDeBeneficiariosSPEIApi* | [**updateAmountLimitAccountUsingPUT**](docs/Api/CuentasDeBeneficiariosSPEIApi.md#updateamountlimitaccountusingput) | **PUT** /subscriptions/{subscription}/beneficiaries/spei/{account} | Actualiza el monto límite
*CuentasDeBeneficiariosSPIDApi* | [**getSpidBeneficiariesForAccount**](docs/Api/CuentasDeBeneficiariosSPIDApi.md#getspidbeneficiariesforaccount) | **GET** /subscriptions/{subscription}/beneficiaries/spid | Consulta los beneficiarios SPID registrados
*CuentasDeBeneficiariosSPIDApi* | [**preRegisterAccountsUsingPOST1**](docs/Api/CuentasDeBeneficiariosSPIDApi.md#preregisteraccountsusingpost1) | **POST** /subscriptions/{subscription}/beneficiaries/spid | Pre-registro de cuentas de beneficiarios SPID
*DepositantesApi* | [**getDepositantsUsingGET**](docs/Api/DepositantesApi.md#getdepositantsusingget) | **GET** /subscriptions/{subscription}/depositants | Consulta de cuentas de depositantes
*DepositantesApi* | [**registerDepositantsUsingPOST**](docs/Api/DepositantesApi.md#registerdepositantsusingpost) | **POST** /subscriptions/{subscription}/depositants | Registra un nuevo depositante
*EmpresasCoDiApi* | [**obtainCompanies**](docs/Api/EmpresasCoDiApi.md#obtaincompanies) | **GET** /codi/companies | Consulta de empresas CODI
*EmpresasCoDiApi* | [**registerCompanyUsingPOST**](docs/Api/EmpresasCoDiApi.md#registercompanyusingpost) | **POST** /codi/companies | Registro de empresas CODI
*FacturasApi* | [**billingsReportByIdUsingGET**](docs/Api/FacturasApi.md#billingsreportbyidusingget) | **GET** /billings/{id} | Consulta de facturas por identificador
*FacturasApi* | [**billingsReportUsingGET**](docs/Api/FacturasApi.md#billingsreportusingget) | **GET** /billings | Consulta de facturas
*InstitucionesApi* | [**getAllInstitutionsUsingGET**](docs/Api/InstitucionesApi.md#getallinstitutionsusingget) | **GET** /institutions | Información de instituciones bancarias.
*OperacionesCoDiApi* | [**consultCodiOperations**](docs/Api/OperacionesCoDiApi.md#consultcodioperations) | **POST** /codi/charges | Obtiene las operaciones generadas a partir de peticiones de pago CoDi® de forma paginada, pudiendo aplicar filtros
*PeticionesDePagoPorCoDiApi* | [**consultCodiRequestByOrderId**](docs/Api/PeticionesDePagoPorCoDiApi.md#consultcodirequestbyorderid) | **GET** /codi/sales-point/{sales_point_id}/charges/{order_id} | Obtiene la información de una petición de pago CODI® por orderId para un punto de venta
*PeticionesDePagoPorCoDiApi* | [**generateCodiCodeQR**](docs/Api/PeticionesDePagoPorCoDiApi.md#generatecodicodeqr) | **POST** /codi/sales-point/{salesPointId}/charges | Genera un código QR para un pago mediante CODI®
*PuntosDeVentaCoDiApi* | [**createSalesPoint**](docs/Api/PuntosDeVentaCoDiApi.md#createsalespoint) | **POST** /codi/companies/{company_id}/salespoint | Registra un punto de venta asociado a una empresa
*PuntosDeVentaCoDiApi* | [**obtainSalePoints**](docs/Api/PuntosDeVentaCoDiApi.md#obtainsalepoints) | **GET** /codi/companies/{company_id}/salespoint | Obtiene los puntos de venta asociados a una empresa
*SaldoApi* | [**getBalanceUsingGET**](docs/Api/SaldoApi.md#getbalanceusingget) | **GET** /subscriptions/{subscription}/balance | Consulta los saldo de una cuenta
*SuscripcionesApi* | [**preEnrollmentMonexUserUsingPOST**](docs/Api/SuscripcionesApi.md#preenrollmentmonexuserusingpost) | **POST** /subscriptions/pre-subscription | Registra una pre-suscripción
*SuscripcionesApi* | [**removeEnrollmentUserUsingDELETE**](docs/Api/SuscripcionesApi.md#removeenrollmentuserusingdelete) | **DELETE** /subscriptions/{subscription} | Elimina una suscripción por el identificador de la suscripción
*SuscripcionesApi* | [**removeSubscriptionPendingStatusUsingDELETE**](docs/Api/SuscripcionesApi.md#removesubscriptionpendingstatususingdelete) | **DELETE** /subscriptions/pre-subscription/{subscription} | Elimina una pre-suscripción
*TransferenciasSPEIApi* | [**createAuthorizationTransactionsGroup**](docs/Api/TransferenciasSPEIApi.md#createauthorizationtransactionsgroup) | **POST** /subscriptions/{subscription}/transactions/group | Agrupa un conjunto de transacciones bajo un mismo request_id para autorizar
*TransferenciasSPEIApi* | [**dropTransactionsPendingUsingDELETE**](docs/Api/TransferenciasSPEIApi.md#droptransactionspendingusingdelete) | **DELETE** /subscriptions/{subscription}/transactions/outcoming/spei/request/{requestId} | Eliminación de transferencias SPEI® pendientes
*TransferenciasSPEIApi* | [**incomingSpeiTransactionsReportUsingGET**](docs/Api/TransferenciasSPEIApi.md#incomingspeitransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/incoming/spei | Consulta de transferencias recibidas
*TransferenciasSPEIApi* | [**outCommingSpeiRequestIdTransactionsReportUsingGET**](docs/Api/TransferenciasSPEIApi.md#outcommingspeirequestidtransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/outcoming/spei/{requestId} | Consulta de transferencias de salida por identificador de petición
*TransferenciasSPEIApi* | [**outgoingSpeiTransactionsReportUsingGET**](docs/Api/TransferenciasSPEIApi.md#outgoingspeitransactionsreportusingget) | **GET** /subscriptions/{subscription}/transactions/outcoming/spei | Consulta de transferencias realizadas
*TransferenciasSPEIApi* | [**registerOutgoingSpeiTransactionUsingPOST**](docs/Api/TransferenciasSPEIApi.md#registeroutgoingspeitransactionusingpost) | **POST** /subscriptions/{subscription}/transactions/outcoming/spei | Registro de transferencias
*TransferenciasSPIDApi* | [**getSpidClassificationsUsingGET**](docs/Api/TransferenciasSPIDApi.md#getspidclassificationsusingget) | **GET** /subscriptions/{subscription}/beneficiaries/spid/classifications | Consulta las clasificaciones para operaciones con SPID
*TransferenciasSPIDApi* | [**registerOutgoingSpidTransactionUsingPOST**](docs/Api/TransferenciasSPIDApi.md#registeroutgoingspidtransactionusingpost) | **POST** /subscriptions/{subscription}/transactions/outcoming/spid | Registro de transferencias SPID
*WebhooksApi* | [**getWebhook**](docs/Api/WebhooksApi.md#getwebhook) | **GET** /webhooks/{id} | Consulta de Webhook
*WebhooksApi* | [**getWebhooks**](docs/Api/WebhooksApi.md#getwebhooks) | **GET** /webhooks | Consulta de Webhooks
*WebhooksApi* | [**registerWebhook**](docs/Api/WebhooksApi.md#registerwebhook) | **POST** /webhooks | Alta de Webhook

## Documentation For Models

 - [Account](docs/Model/Account.md)
 - [AccountDetail](docs/Model/AccountDetail.md)
 - [AccountReassigned](docs/Model/AccountReassigned.md)
 - [AccountRequest](docs/Model/AccountRequest.md)
 - [AccountResponse](docs/Model/AccountResponse.md)
 - [AccountSpid](docs/Model/AccountSpid.md)
 - [AddressCompany](docs/Model/AddressCompany.md)
 - [AmountRequest](docs/Model/AmountRequest.md)
 - [AuthorizationTransactionGroup](docs/Model/AuthorizationTransactionGroup.md)
 - [AuthorizedBeneficiariesResponse](docs/Model/AuthorizedBeneficiariesResponse.md)
 - [AuthorizedUsers](docs/Model/AuthorizedUsers.md)
 - [Balance](docs/Model/Balance.md)
 - [BalanceListResponse](docs/Model/BalanceListResponse.md)
 - [BeneficiariesQueryRegisterStatus](docs/Model/BeneficiariesQueryRegisterStatus.md)
 - [BeneficiariesResponse](docs/Model/BeneficiariesResponse.md)
 - [BeneficiaryInstitution](docs/Model/BeneficiaryInstitution.md)
 - [Billing](docs/Model/Billing.md)
 - [BillingTransaction](docs/Model/BillingTransaction.md)
 - [CepResponse](docs/Model/CepResponse.md)
 - [CepSearchBanxico](docs/Model/CepSearchBanxico.md)
 - [CertificateRequest](docs/Model/CertificateRequest.md)
 - [CodiCodeQrResponseDTO](docs/Model/CodiCodeQrResponseDTO.md)
 - [CodiCodeRequestDTO](docs/Model/CodiCodeRequestDTO.md)
 - [CodiOperationsFiltersRequestDTO](docs/Model/CodiOperationsFiltersRequestDTO.md)
 - [CompanyRegistered](docs/Model/CompanyRegistered.md)
 - [CompanyRequested](docs/Model/CompanyRequested.md)
 - [Compay](docs/Model/Compay.md)
 - [ContactRequest](docs/Model/ContactRequest.md)
 - [ContractDetailRequest](docs/Model/ContractDetailRequest.md)
 - [ContractDetailResponse](docs/Model/ContractDetailResponse.md)
 - [Deposit](docs/Model/Deposit.md)
 - [Depositant](docs/Model/Depositant.md)
 - [DepositantsRegister](docs/Model/DepositantsRegister.md)
 - [DepositantsResponse](docs/Model/DepositantsResponse.md)
 - [ErrorResponse](docs/Model/ErrorResponse.md)
 - [GetDepositants](docs/Model/GetDepositants.md)
 - [Institution](docs/Model/Institution.md)
 - [InstitutionsList](docs/Model/InstitutionsList.md)
 - [MessageAccountBeneficiary](docs/Model/MessageAccountBeneficiary.md)
 - [MessageCEP](docs/Model/MessageCEP.md)
 - [MessageDepositReceived](docs/Model/MessageDepositReceived.md)
 - [MessageInstitution](docs/Model/MessageInstitution.md)
 - [MessagePayment](docs/Model/MessagePayment.md)
 - [MessagePaymentStatePending](docs/Model/MessagePaymentStatePending.md)
 - [MessageRequestChanged](docs/Model/MessageRequestChanged.md)
 - [MessageSubscription](docs/Model/MessageSubscription.md)
 - [MessageWebHook](docs/Model/MessageWebHook.md)
 - [Operations](docs/Model/Operations.md)
 - [PagerResponseDto](docs/Model/PagerResponseDto.md)
 - [Payment](docs/Model/Payment.md)
 - [PaymentRequestCodiResponseDTO](docs/Model/PaymentRequestCodiResponseDTO.md)
 - [PaymentsRequestId](docs/Model/PaymentsRequestId.md)
 - [Person](docs/Model/Person.md)
 - [PreEnrollmentData](docs/Model/PreEnrollmentData.md)
 - [PreEnrollmentResponse](docs/Model/PreEnrollmentResponse.md)
 - [PreMonexAuthorization](docs/Model/PreMonexAuthorization.md)
 - [Relationship](docs/Model/Relationship.md)
 - [RelationshipsResponse](docs/Model/RelationshipsResponse.md)
 - [SalesPoint](docs/Model/SalesPoint.md)
 - [SalesPointFound](docs/Model/SalesPointFound.md)
 - [SalesPointRequest](docs/Model/SalesPointRequest.md)
 - [SalesPointRespose](docs/Model/SalesPointRespose.md)
 - [SpidBeneficiariesResponse](docs/Model/SpidBeneficiariesResponse.md)
 - [SpidBeneficiaryResponse](docs/Model/SpidBeneficiaryResponse.md)
 - [SpidClassificationDTO](docs/Model/SpidClassificationDTO.md)
 - [SpidClassificationsResponseDTO](docs/Model/SpidClassificationsResponseDTO.md)
 - [Timestamp](docs/Model/Timestamp.md)
 - [TokenRequiredResponse](docs/Model/TokenRequiredResponse.md)
 - [TransactionOutgoing](docs/Model/TransactionOutgoing.md)
 - [TransactionOutgoingSpid](docs/Model/TransactionOutgoingSpid.md)
 - [TransactionsOutgoingRegister](docs/Model/TransactionsOutgoingRegister.md)
 - [UrlsRedirect](docs/Model/UrlsRedirect.md)
 - [UserCompany](docs/Model/UserCompany.md)
 - [Webhook](docs/Model/Webhook.md)
 - [WebhookRequest](docs/Model/WebhookRequest.md)
 - [WebhookResponse](docs/Model/WebhookResponse.md)
 - [WebhooksList](docs/Model/WebhooksList.md)

## Documentation For Authorization

 All endpoints do not require authorization.


## Author



