<?php
/**
 * CuentasDeBeneficiariosSPEIApi
 * PHP version 5
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Wire4RestAPI
 *
 * # Referencia de API La API de Wire4 está organizada en torno a REST. Nuestra API tiene URLs predecibles orientadas a los recursos, acepta peticiones en formato JSON, y las respuestas devueltas son formato JSON y utiliza códigos de respuesta HTTP, autenticación y verbos estándares.  Puede usar la API de Wire4 en nuestro entorno de prueba, que no afecta sus productivos ni interactúa con la red bancaria. La URL de conexión que se usa para invocar los servicios determina si la solicitud es en modo en de prueba o en modo producción.    # Autenticación La API de Wire4 utiliza el protocolo OAuth 2.0 para autenticación y autorización.   Para comenzar, es necesario que registre una cuenta en nuestro ambiente de pruebas en [registro](https://app-sndbx.wire4.mx/#/register) y obtenga las credenciales de cliente OAuth 2.0 desde la [consola de administración](https://app-sndbx.wire4.mx/#/dashboard/api-keys).   Esta página ofrece una descripción general de los escenarios de autorización de OAuth 2.0 que admite Wire4.   Después de crear su aplicación con Wire4, asegúrese de tener a la mano su `client_id` y `client_secret`. El siguiente paso es descubrir qué flujo de OAuth2 es el adecuado para sus propósitos.   ## URLS La siguiente tabla muestra las urls de los recursos de autenticación para el ambiente de pruebas.  URL                  | Descripción ------------------------------------ | ------------- https://sandbox-api.wire4.mx/token   | Obtener token de autorización llaves de API (*client_id*, *client_secret*), datos de suscripción (*client_id*, *client_secret*, *user_key*, *user_secret*) o (*refresh_token*) https://sandbox-api.wire4.mx/revoke  | Revocación de token  **Nota:** De acuerdo con el RFC 6749, la URL del token sólo acepta el tipo de contenido x-www-form-urlencoded. El contenido JSON no está permitido y devolverá un error.  ## Scopes Los `scopes` limitan el acceso de una aplicación a los recursos de Wire4. Se ofrecen los siguientes scopes de acuerdo al producto:  Producto                             |Scope                      | Descripción -------------------------------------|------------------------------------ | ------------- SPEI-SPID                            |general                              | Permite llamar a operaciones que no requieren a un cliente Monex suscrito en Wire4, los recursos que se pueden consumir con este scope son: consulta de Instituciones, CEP y generación de una presuscripción. SPEI-SPID                            |spei_admin                           | Permite llamar a operaciones que requieren de un cliente Monex suscrito en Wire4, ya que se proporciona información de saldos, administración de transacciones, cuentas de beneficiarios y cuentas de depositantes. SPEI-SPID                            |spid_admin                           | Permite llamar sólo a operaciones SPID, se requiere de un cliente Monex suscrito en Wire4. CODI                                 |codi_general                         | Permite llamar a operaciones de administración sobre el producto CoDi, como creación y listado de empresas  CODI                                 |codi_admin                           | Permite llamar sólo a operaciones CoDi dentro de un punto de venta, las operaciones incluyen creación, consulta, listado, etc de peticiones de pago CODI                                 |codi_report                          | Permite generar reportes de operaciones CoDi. TODOS                                |device_[dispositivo]                 | Se debe especificar cuando se gestionan token's desde distintos dispositivos.  ## Tipos de autenticación   Wire4 cuenta con dos tipos de autenticación: Autenticación de Aplicación (OAuth 2.0  Client Credentials Grant)  y Autenticación de Usuario de Aplicación (OAuth 2.0 Password Grant).  ### Autenticación de Aplicación  Esta autenticación se obtiene proporcionando únicamente las llaves de API las cuales se pueden consultar en [Llaves de API](https://app-sndbx.wire4.mx/#/dashboard/api-keys) de la consola de administración.  La autenticación de aplicación permite accesso a recursos generales y de administración que dependeran del scope.  Para este tipo de autenticación se sigue el flujo OAuth 2.0 Client Credentials Grant, que se describe más adelante en **Obtener el token de acceso de aplicación**, algunos de los recursos que requieren este tipo de autenticación son:   * [/subscriptions/pre-subscription](link) * [/institutions](link>) * [/ceps](<link>) * [/codi/compaies](<link>)  ### Autenticación de Usuario de Aplicación  Esta autenticación se obtiene proporcionando las llaves de API las cuales se pueden consultar en [Llaves de API](https://app-sndbx.wire4.mx/#/dashboard/api-keys) más el ***user_key*** y ***user_secret*** que se proporcionan al momento de crear una suscripción o un punto de venta, para más información puedes consultar las guías [creación de suscripción](https://www.wire4.mx/#/guides/subscriptions), [creación de punto de venta](https://www.wire4.mx/#/guides/salespoint).  Con este tipo de autenticación se puede acceder a los recursos especificos que requieren configuraciones y acceso mas puntual como información de una cuentas, saldos y administración de transacciones SPEID-SPID o CODI.    ## Obtener token de acceso Antes de que su aplicación pueda acceder a los datos mediante la API de Wire4, debe obtener un token de acceso ***(access_token)*** que le otorgue acceso a la API. En las siguientes secciones se muestra como obtener un token para cada una de las autenticaciones.     ### Obtener el token de acceso para autenticación de aplicación  El primer paso es crear la solicitud de token de acceso (*access_token*), con los parámetros que identifican su aplicación, el siguiente código muestra cómo obtener un `token`.  ``` curl -k -d \"grant_type= client_credentials&scope=general\"  -u \"<client id>:<client secret>\" https://sandbox-api.wire4.mx/token ``` **Ejemplo:**   ``` curl -k -d \"grant_type=client_credentials&scope=general\"  -u \"8e59YqaFW_Yo5dwWNxEY8Lid0u0a:AXahn79hfKWBXKzQfj011x8cvcQa\"  https://sandbox-api.wire4.mx /token ``` Obtendrá una respuesta como la que se muestra  a continuación, donde se debe obtener el *access_token* para realizar llamadas posteriores a la API.   ``` {     \"access_token\":\"eyJ4NXQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJraWQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJpc21hZWwuZXNjYW1pbGxhQHRjcGlwLnRlY2hAc2FuZGJveC5zcGVpb2suY29tIiwiYXVkIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsIm5iZiI6MTU3MTMyMDg3NywiYXpwIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsInNjb3BlIjoiYW1fYXBwbGljYXRpb25fc2NvcGUgZ2VuZXJhbCIsImlzcyI6ImFwaW0taWRwIiwiZXhwIjoxNTcxMzI0NDc3LCJpYXQiOjE1NzEzMjA4NzcsImp0aSI6ImJkMTdjMjcyLTg4MGQtNDk0ZS1iMTMwLTBiYTkwMjYyN2M4NCJ9.AjngGylkd_Chs5zlIjyLRPu9xPGyz4dfCd_aax2_ts653xrnNMoLpVHUDmaxIDFF2XyBJKH2IAbKxjo6VsFM07QkoPhlysO1PLoAF-Vkt4xYkh-f7nJRl0oOe2utDWFlUdgiAOmx5tPcStrdCEftgNNrjwJ50LXysFjXVshpoST-zIJPLgXknM3esGrkAsLcZRM7XUB187jxLHbtefVYPMvSO31T9pd5_Co9UXdeHpuA98sk_wZknASM1phxXQZAMLRLHz3LYvjCWCr_v80oVCM9SWTzf0vrMI6xphoIfirfWloADKPTTSUpIGBw9ePF_WbEPvbMm_BZaApJcEH2w\",    \"scope\":\"am_application_scope general\",    \"token_type\":\"Bearer\",    \"expires_in\":3600 }  ```  Es posible generar tokens con mas de un scope, en caso que sea necesario utilizar dicho token para hacer mas de una operación. Para generarlo basta con agregarlo a la petición separado por un espacio.     ``` curl -k -d \"grant_type=client_credentials&scope=codi_general codi_report\"  -u \"8e59YqaFW_Yo5dwWNxEY8Lid0u0a:AXahn79hfKWBXKzQfj011x8cvcQa\"  https://sandbox-api.wire4.mx /token ```  ### Obtener el token de acceso para autenticación usuario de aplicación   Antes de que su aplicación pueda acceder a los datos de una cuenta Monex mediante la API de Wire4, debe obtener un token de acceso  (*access_token*) que le otorgue acceso a la API y contar con el  *user_key* y *user_secret* que se proporcionan al momento de crear  una suscripción para más información puedes consultar [creación de suscripción](https://wire4.mx/#/guides/subscriptions) .   El primer paso es crear la solicitud de token de acceso con los parámetros que identifican su aplicación y la suscripción y con `scope` `spei_admin`  ```   curl -k -d \"grant_type=password&scope=spei_admin&username=<user_key>&password=<user_secret>\"  -u \"<client_id>:<client_secret>\" https://sandbox-api.wire4.mx/token ``` **Ejemplo**  ``` curl -k -d \"grant_type=password&scope=spei_admin&username=6 nbC5e99tTO@sandbox.wire4com&password= Nz7IqJGe9h\" -u \" zgMlQbqmOr:plkMJoPXCI\" https://sandbox-api.wire4.mx /token  ```  ``` {     \"access_token\":\"eyJ4NXQiOiJPR1EyTURFM00yTmpObVZoTnpFeE5EWXlObUV4TURKa01qUTJaVEU0TWpGaE1tVmlZakV5TkEiLCJraWQiOiJPR1EyTURFM00yTmpObVZoTnpFeE5EWXlObUV4TURKa01qUTJaVEU0TWpGaE1tVmlZakV5TkEiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiIzMzE0ODRlZTdjZDRkYWU5MzRmMjY2Zjc5YmY1YWFAZGV2LWllc2NhbWlsbGEuc3BlaW9rLmNvbSIsImF1ZCI6IkJVR0xjNWw1bW5CZXlPeGxtamNUZ0JoS19WTWEiLCJuYmYiOjE1NzEzNDk4ODMsImF6cCI6IkJVR0xjNWw1bW5CZXlPeGxtamNUZ0JoS19WTWEiLCJzY29wZSI6InNwZWlfYWRtaW4iLCJpc3MiOiJhcGltLWlkcCIsImV4cCI6MTU3MTM1MzQ4MywiaWF0IjoxNTcxMzQ5ODgzLCJqdGkiOiJiOWQ1M2Q0MC0xN2MwLTQxOTItYjUwNy0wZWFhN2ZkNDA1MGYifQ.hLTk8AFoIce1GpLcgch-U5aLLgiiFTo49wfBErD8D6VF-H9sG13ZyfAx9T-vQkk2m1zPapYVQjwibz3GRAJMN0Vczs6flV1mUJwFDQbEE-AELPdRcaRFOMBCfF6H9TVLfhFsGb9U2pVR9TLJcKqR57DyO_dIcc9I6d0tIkxqn2VcqypLVi5YQf36WzBbPeG-iPHYpMA-bhr4rwfjKA-O6jm1NSSxNHF4sHS0YHDPoO_x6cCc677MQEe0_CozfnQhoEWNfG8tcWUqhPtmcfjqon1p7PdQoXxriq_R85d06pVO9Se7Q6ok0V8Qgz0MOJ6z3ku6mtZSuba7niMAOt2TyA\",    \"refresh_token\":\"f962d5c6-0d99-3809-8275-11c7aa0aa020\",    \"scope\":\"spei_admin\",    \"token_type\":\"Bearer\",    \"expires_in\":3600 } ```  **Nota:** Los ejemplos anteriores se presentan considerando que se realiza una implementación desde cero,  esto se puede simplificar a sólo configurar sus llaves (*client_id*, *client_secret*),  datos de suscripción (*client_id*, *client_secret*, *user_key*, *user_secret*) si utiliza nuestros sdks.      **Consideraci&oacute;n:** Si la aplicaci&oacute;n en la que implementar&aacute; Wire4 estar&aacute; desplegada en mas de una instancia o servidor en cada solicitud de token debe especificar un scope adicional. La forma de hacer esto es que cuando se solicita un token se debe especificar un scope adicional con el prefijo \"device_\" +  el dispositivo, por ejemplo:                                                                                                                                                                                                                     device_server1<br> device_server2  en consecuencia cada instancia debe operar con el token gestionado. ***Si se opera con el mismo token en instancias diferentes encontrará problemas de Credenciales Inv&aacute;lidas.***  **Ejemplo de solicitud de token para instancias diferentes:**  ``` curl -k -d \"grant_type=password&username=0883b97333046abb76367698b57d9e@sandbox.wire4.mx&password=9e0d81f95705079b9fe1e129315c25&scope=device_server1 codi_admin\" -H \"Authorization: Basic dmZSeURpTHdFbVZqd2VIclp0OWRMbXFmb3YwYTpJQJBuamBac3V6SllLWlJHUkJEYUZrN1BhRmNh\" https://sandbox-api.wire4.mx/token  curl -k -d \"grant_type=password&username=0883b97333046abb76367698b57d9e@sandbox.wire4.mx&password=9e0d81f95705079b9fe1e129315c25&scope=device_server2 codi_admin\" -H \"Authorization: Basic dmZSeURpTHdFbVZqd2VIclp0OWRMbXFmb3YwYTpJQJBuamBac3V6SllLWlJHUkJEYUZrN1BhRmNh\" https://sandbox-api.wire4.mx/token ```  ## Caducidad del token El token de acceso es válido durante 60 minutos (una hora), después de transcurrido este tiempo se debe solicitar un nuevo token,  cuando el token caduca se obtendrá un error ***401 Unauthorized*** con mensaje ***“Invalid Credentials”.***   El nuevo token se puede solicitar  utilizando el último token de actualización (***refresh_token***) que se devolvió en la solicitud del token,   esto sólo aplica para el token de tipo password (Autenticación de Usuario de Aplicación). El siguiente ejemplo muestra cómo obtener un toke con el token de actualización.  ``` curl -k -d \"grant_type=refresh_token&refresh_token=<refresh_token>\" -u \" Client_Id:Client_Secret\" -H \"Content-Type: application/x-www-form-urlencoded\" https://sandbox-api.wire4.mx/oauth2/token ```  **Ejemplo:**  ``` curl -k -d \"grant_type=refresh_token&refresh_token=f932d5c6-0d39-3809-8275-11c7ax0aa020\" -u \"zgMlQbqmOr:plkMJoPXCI\" -H \"Content-Type: application/x-www-form-urlencoded\" https://sandbox-api.wire4.mx/token ```  El token de actualización (***refresh_token***) tiene una duración de hasta 23 horas. Si en este periodo no se utiliza, se tienen que solicitar un nuevo token.  Un token de acceso podría dejar de funcionar por uno de estos motivos:  * El usuario ha revocado el acceso a su aplicación, si un usuario ha solicitado la baja de su aplicación de WIre4. * El token de acceso ha caducado: si el token de acceso ha pasado de una hora, recibirá un error ***401 Unauthorized*** mientras realiza una llamada a la API de Wire4. Cuando esto sucede, debe solicitar un nuevo token utilizando el token de actualización que recibió por última al solicitar un token, sólo aplica si el token en cuestión es de autenticación de usuario de aplicación, en caso contrario solicitar un nuevo token.   ## Revocar token Su aplicación puede revocar mediante programación el token de acceso, una vez revocado el token no podrá hacer uso de él para acceder a la API. El siguiente código muestra un ejemplo de cómo revocar el token:    ```  curl -X POST --basic -u \"<client id>:<client secret>\" -H \"Content-Type: application/x-www-form-urlencoded;charset=UTF-8\" -k -d \"token=<token to revoke>&token_type_hint=access_token\" https://sandbox-api.wire4.mx/revoke ```      **Ejemplo:**  ```   curl -X POST --basic -u \"8e59YqaFW_Yo5dwWNxEY8Lid0u0a:AXahn79hfKWBXKzQfj011x8cvcQa\" -H \"Content-Type: application/x-www-form-urlencoded;charset=UTF-8\" -k -d \"token=eyJ4NXQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJraWQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJpc21hZWwuZXNjYW1pbGxhQHRjcGlwLnRlY2hAc2FuZGJveC5zcGVpb2suY29tIiwiYXVkIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsIm5iZiI6MTU3MTMyMDg3NywiYXpwIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsInNjb3BlIjoiYW1fYXBwbGljYXRpb25fc2NvcGUgZ2VuZXJhbCIsImlzcyI6ImFwaW0taWRwIiwiZXhwIjoxNTcxMzI0NDc3LCJpYXQiOjE1NzEzMjA4NzcsImp0aSI6ImJkMTdjMjcyLTg4MGQtNDk0ZS1iMTMwLTBiYTkwMjYyN2M4NCJ9.AjngGylkd_Chs5zlIjyLRPu9xPGyz4dfCd_aax2_ts653xrnNMoLpVHUDmaxIDFF2XyBJKH2IAbKxjo6VsFM07QkoPhlysO1PLoAF-Vkt4xYkh-f7nJRl0oOe2utDWFlUdgiAOmx5tPcStrdCEftgNNrjwJ50LXysFjXVshpoST-zIJPLgXknM3esGrkAsLcZRM7XUB187jxLHbtefVYPMvSO31T9pd5_Co9UXdeHpuA98sk_wZknASM1phxXQZAMLRLHz3LYvjCWCr_v80oVCM9SWTzf0vrMI6xphoIfirfWloADKPTTSUpIGBw9ePF_WbEPvbMm_BZaApJcEH2w&token_type_hint=access_token\"  https://sandbox-api.wire4.mx/revoke ```  # Ambientes  Wire4 cuentas con dos ambientes Pruebas (Sandbox) y Producción, son dos ambientes separados los cuales se pueden utilizar simultáneamente. Los usuarios que han sido creados en cada uno de los ambientes no son intercambiables.   Las ligas de acceso a la `api` para cada uno de los ambientes son:  * Pruebas  https://sandbox-api.wire4.mx * Producción https://api.wire4.mx     # Eventos  Los eventos son nuestra forma de informarle cuando algo  sucede en su cuenta. Cuando ocurre un evento se crea un objeto  [Evento](#tag/Webhook-Message). Por ejemplo, cuando se recibe un depósito, se crea un evento TRANSACTION.INCOMING.UPDATED.   Los eventos ocurren cuando cambia el estado de un recurso. El recurso se encuentra dentro del objeto [Evento](#tag/Webhook-Message) en el campo data.  Por ejemplo, un evento TRANSACTION.INCOMING.UPDATED contendrá un depósito y un evento ACCOUNT.CREATED contendrá una cuenta.   Wire4 puede agregar más campos en un futuro, o agregar nuevos valores a campos existentes, por lo que es recomendado que tu endpoint pueda manejar datos adicionales desconocidos. En esta [liga](#tag/Webhook-Message) se encuentra  la definición del objeto [Evento](#tag/Webhook-Message).  ## Tipos de Eventos  Wire4 cuenta con los siguientes tipos de eventos*   | Evento                     | Tipo                               | Objeto                                        | | -------------------------- |----------------------------------- | --------------------------------------------- | | Suscripción                | ENROLLMENT.CREATED                 | [suscription](#tag/subscription)              | | Cuenta de beneficiario     | ACCOUNT.CREATED                    | [beneficiary](#tag/BeneficiaryAccount)           | | Depósito recibido          | TRANSACTION.INCOMING.UPDATED       | [spei_incoming](#tag/deposit)                 | | Transferencia realizada    | TRANSACTION.OUTGOING.RECEIVED      | [spei_outgoing](#tag/transfer)                | | Transferencia SPID enviada | TRANSACTION.OUTGOING.SPID.RECEIVED | [spid_outgoing](#tag/transfer)                | | Transferencias Autorizadas | REQUEST.OUTGOING.CHANGED           | [request_outgoing](#tag/requestOutMsg)        | | Operación CoDi             | CODI.ACTIONS                       |[codi_actions](#tag/codiActions)               | | Punto de venta CoDi        | SALE.POINT.CREATED                 |[codi_sales_point](#tag/codiSalesPoint)        |
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.11
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace mx\wire4\client\api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use mx\wire4\ApiException;
use mx\wire4\Configuration;
use mx\wire4\HeaderSelector;
use mx\wire4\ObjectSerializer;

/**
 * CuentasDeBeneficiariosSPEIApi Class Doc Comment
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CuentasDeBeneficiariosSPEIApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation authorizeAccountsPendingPUT
     *
     * Recibe la solicitud para agrupar las cuentas SPEI/SPID de beneficiarios en estado pendiente que deben ser autorizadas
     *
     * @param  \mx\wire4\client\model\UrlsRedirect $body Información de la cuenta del beneficiario (required)
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\AuthorizedBeneficiariesResponse
     */
    public function authorizeAccountsPendingPUT($body, $authorization, $subscription)
    {
        list($response) = $this->authorizeAccountsPendingPUTWithHttpInfo($body, $authorization, $subscription);
        return $response;
    }

    /**
     * Operation authorizeAccountsPendingPUTWithHttpInfo
     *
     * Recibe la solicitud para agrupar las cuentas SPEI/SPID de beneficiarios en estado pendiente que deben ser autorizadas
     *
     * @param  \mx\wire4\client\model\UrlsRedirect $body Información de la cuenta del beneficiario (required)
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\AuthorizedBeneficiariesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function authorizeAccountsPendingPUTWithHttpInfo($body, $authorization, $subscription)
    {
        $returnType = '\mx\wire4\client\model\AuthorizedBeneficiariesResponse';
        $request = $this->authorizeAccountsPendingPUTRequest($body, $authorization, $subscription);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\AuthorizedBeneficiariesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 204:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\AuthorizedBeneficiariesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation authorizeAccountsPendingPUTAsync
     *
     * Recibe la solicitud para agrupar las cuentas SPEI/SPID de beneficiarios en estado pendiente que deben ser autorizadas
     *
     * @param  \mx\wire4\client\model\UrlsRedirect $body Información de la cuenta del beneficiario (required)
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function authorizeAccountsPendingPUTAsync($body, $authorization, $subscription)
    {
        return $this->authorizeAccountsPendingPUTAsyncWithHttpInfo($body, $authorization, $subscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation authorizeAccountsPendingPUTAsyncWithHttpInfo
     *
     * Recibe la solicitud para agrupar las cuentas SPEI/SPID de beneficiarios en estado pendiente que deben ser autorizadas
     *
     * @param  \mx\wire4\client\model\UrlsRedirect $body Información de la cuenta del beneficiario (required)
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function authorizeAccountsPendingPUTAsyncWithHttpInfo($body, $authorization, $subscription)
    {
        $returnType = '\mx\wire4\client\model\AuthorizedBeneficiariesResponse';
        $request = $this->authorizeAccountsPendingPUTRequest($body, $authorization, $subscription);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'authorizeAccountsPendingPUT'
     *
     * @param  \mx\wire4\client\model\UrlsRedirect $body Información de la cuenta del beneficiario (required)
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function authorizeAccountsPendingPUTRequest($body, $authorization, $subscription)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling authorizeAccountsPendingPUT'
            );
        }
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling authorizeAccountsPendingPUT'
            );
        }
        // verify the required parameter 'subscription' is set
        if ($subscription === null || (is_array($subscription) && count($subscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription when calling authorizeAccountsPendingPUT'
            );
        }

        $resourcePath = '/subscriptions/{subscription}/beneficiaries/pending';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($subscription !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription' . '}',
                ObjectSerializer::toPathValue($subscription),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation deleteAccountUsingDELETE
     *
     * Elimina la cuenta del beneficiario
     *
     * @param  string $authorization Header para token (required)
     * @param  string $account La cuenta del beneciario que será eliminada (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteAccountUsingDELETE($authorization, $account, $subscription)
    {
        $this->deleteAccountUsingDELETEWithHttpInfo($authorization, $account, $subscription);
    }

    /**
     * Operation deleteAccountUsingDELETEWithHttpInfo
     *
     * Elimina la cuenta del beneficiario
     *
     * @param  string $authorization Header para token (required)
     * @param  string $account La cuenta del beneciario que será eliminada (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function deleteAccountUsingDELETEWithHttpInfo($authorization, $account, $subscription)
    {
        $returnType = '';
        $request = $this->deleteAccountUsingDELETERequest($authorization, $account, $subscription);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation deleteAccountUsingDELETEAsync
     *
     * Elimina la cuenta del beneficiario
     *
     * @param  string $authorization Header para token (required)
     * @param  string $account La cuenta del beneciario que será eliminada (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAccountUsingDELETEAsync($authorization, $account, $subscription)
    {
        return $this->deleteAccountUsingDELETEAsyncWithHttpInfo($authorization, $account, $subscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation deleteAccountUsingDELETEAsyncWithHttpInfo
     *
     * Elimina la cuenta del beneficiario
     *
     * @param  string $authorization Header para token (required)
     * @param  string $account La cuenta del beneciario que será eliminada (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function deleteAccountUsingDELETEAsyncWithHttpInfo($authorization, $account, $subscription)
    {
        $returnType = '';
        $request = $this->deleteAccountUsingDELETERequest($authorization, $account, $subscription);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'deleteAccountUsingDELETE'
     *
     * @param  string $authorization Header para token (required)
     * @param  string $account La cuenta del beneciario que será eliminada (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function deleteAccountUsingDELETERequest($authorization, $account, $subscription)
    {
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling deleteAccountUsingDELETE'
            );
        }
        // verify the required parameter 'account' is set
        if ($account === null || (is_array($account) && count($account) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $account when calling deleteAccountUsingDELETE'
            );
        }
        // verify the required parameter 'subscription' is set
        if ($subscription === null || (is_array($subscription) && count($subscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription when calling deleteAccountUsingDELETE'
            );
        }

        $resourcePath = '/subscriptions/{subscription}/beneficiaries/spei/{account}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($account !== null) {
            $resourcePath = str_replace(
                '{' . 'account' . '}',
                ObjectSerializer::toPathValue($account),
                $resourcePath
            );
        }
        // path params
        if ($subscription !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription' . '}',
                ObjectSerializer::toPathValue($subscription),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getAvailableRelationshipsMonexUsingGET
     *
     * Consulta de relaciones
     *
     * @param  string $authorization Header para token (required)
     * @param  string $subscription Identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\RelationshipsResponse
     */
    public function getAvailableRelationshipsMonexUsingGET($authorization, $subscription)
    {
        list($response) = $this->getAvailableRelationshipsMonexUsingGETWithHttpInfo($authorization, $subscription);
        return $response;
    }

    /**
     * Operation getAvailableRelationshipsMonexUsingGETWithHttpInfo
     *
     * Consulta de relaciones
     *
     * @param  string $authorization Header para token (required)
     * @param  string $subscription Identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\RelationshipsResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getAvailableRelationshipsMonexUsingGETWithHttpInfo($authorization, $subscription)
    {
        $returnType = '\mx\wire4\client\model\RelationshipsResponse';
        $request = $this->getAvailableRelationshipsMonexUsingGETRequest($authorization, $subscription);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\RelationshipsResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAvailableRelationshipsMonexUsingGETAsync
     *
     * Consulta de relaciones
     *
     * @param  string $authorization Header para token (required)
     * @param  string $subscription Identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAvailableRelationshipsMonexUsingGETAsync($authorization, $subscription)
    {
        return $this->getAvailableRelationshipsMonexUsingGETAsyncWithHttpInfo($authorization, $subscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAvailableRelationshipsMonexUsingGETAsyncWithHttpInfo
     *
     * Consulta de relaciones
     *
     * @param  string $authorization Header para token (required)
     * @param  string $subscription Identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getAvailableRelationshipsMonexUsingGETAsyncWithHttpInfo($authorization, $subscription)
    {
        $returnType = '\mx\wire4\client\model\RelationshipsResponse';
        $request = $this->getAvailableRelationshipsMonexUsingGETRequest($authorization, $subscription);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getAvailableRelationshipsMonexUsingGET'
     *
     * @param  string $authorization Header para token (required)
     * @param  string $subscription Identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getAvailableRelationshipsMonexUsingGETRequest($authorization, $subscription)
    {
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling getAvailableRelationshipsMonexUsingGET'
            );
        }
        // verify the required parameter 'subscription' is set
        if ($subscription === null || (is_array($subscription) && count($subscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription when calling getAvailableRelationshipsMonexUsingGET'
            );
        }

        $resourcePath = '/subscriptions/{subscription}/beneficiaries/relationships';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($subscription !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription' . '}',
                ObjectSerializer::toPathValue($subscription),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBeneficiariesByRequestId
     *
     * Consulta los beneficiarios por el identificador de la petición de registro
     *
     * @param  string $authorization Header para token (required)
     * @param  string $request_id El identificador de la petición del registro de beneficiarios a esta API (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\BeneficiariesResponse
     */
    public function getBeneficiariesByRequestId($authorization, $request_id, $subscription)
    {
        list($response) = $this->getBeneficiariesByRequestIdWithHttpInfo($authorization, $request_id, $subscription);
        return $response;
    }

    /**
     * Operation getBeneficiariesByRequestIdWithHttpInfo
     *
     * Consulta los beneficiarios por el identificador de la petición de registro
     *
     * @param  string $authorization Header para token (required)
     * @param  string $request_id El identificador de la petición del registro de beneficiarios a esta API (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\BeneficiariesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBeneficiariesByRequestIdWithHttpInfo($authorization, $request_id, $subscription)
    {
        $returnType = '\mx\wire4\client\model\BeneficiariesResponse';
        $request = $this->getBeneficiariesByRequestIdRequest($authorization, $request_id, $subscription);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\BeneficiariesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 204:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\BeneficiariesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBeneficiariesByRequestIdAsync
     *
     * Consulta los beneficiarios por el identificador de la petición de registro
     *
     * @param  string $authorization Header para token (required)
     * @param  string $request_id El identificador de la petición del registro de beneficiarios a esta API (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBeneficiariesByRequestIdAsync($authorization, $request_id, $subscription)
    {
        return $this->getBeneficiariesByRequestIdAsyncWithHttpInfo($authorization, $request_id, $subscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBeneficiariesByRequestIdAsyncWithHttpInfo
     *
     * Consulta los beneficiarios por el identificador de la petición de registro
     *
     * @param  string $authorization Header para token (required)
     * @param  string $request_id El identificador de la petición del registro de beneficiarios a esta API (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBeneficiariesByRequestIdAsyncWithHttpInfo($authorization, $request_id, $subscription)
    {
        $returnType = '\mx\wire4\client\model\BeneficiariesResponse';
        $request = $this->getBeneficiariesByRequestIdRequest($authorization, $request_id, $subscription);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getBeneficiariesByRequestId'
     *
     * @param  string $authorization Header para token (required)
     * @param  string $request_id El identificador de la petición del registro de beneficiarios a esta API (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getBeneficiariesByRequestIdRequest($authorization, $request_id, $subscription)
    {
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling getBeneficiariesByRequestId'
            );
        }
        // verify the required parameter 'request_id' is set
        if ($request_id === null || (is_array($request_id) && count($request_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_id when calling getBeneficiariesByRequestId'
            );
        }
        // verify the required parameter 'subscription' is set
        if ($subscription === null || (is_array($subscription) && count($subscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription when calling getBeneficiariesByRequestId'
            );
        }

        $resourcePath = '/subscriptions/{subscription}/beneficiaries/spei/{requestId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($request_id !== null) {
            $resourcePath = str_replace(
                '{' . 'requestId' . '}',
                ObjectSerializer::toPathValue($request_id),
                $resourcePath
            );
        }
        // path params
        if ($subscription !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription' . '}',
                ObjectSerializer::toPathValue($subscription),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBeneficiariesForAccountUsingGET
     *
     * Consulta los beneficiarios registrados
     *
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     * @param  string $account Cuenta del beneficiario, puede ser Clabe, TDD o Celular (optional)
     * @param  string $beneficiary_bank Clave del banco beneficiario (optional)
     * @param  string $beneficiary_name Nombre del beneficiario (optional)
     * @param  string $end_date Fecha de inicio del perido a filtrar en formato dd-mm-yyyy (optional)
     * @param  string $init_date Fecha de inicio del perido a filtrar en formato dd-mm-yyyy (optional)
     * @param  string $rfc RFC del beneficiario (optional)
     * @param  string $status Estatus de la cuenta (optional)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\BeneficiariesResponse
     */
    public function getBeneficiariesForAccountUsingGET($authorization, $subscription, $account = null, $beneficiary_bank = null, $beneficiary_name = null, $end_date = null, $init_date = null, $rfc = null, $status = null)
    {
        list($response) = $this->getBeneficiariesForAccountUsingGETWithHttpInfo($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $rfc, $status);
        return $response;
    }

    /**
     * Operation getBeneficiariesForAccountUsingGETWithHttpInfo
     *
     * Consulta los beneficiarios registrados
     *
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     * @param  string $account Cuenta del beneficiario, puede ser Clabe, TDD o Celular (optional)
     * @param  string $beneficiary_bank Clave del banco beneficiario (optional)
     * @param  string $beneficiary_name Nombre del beneficiario (optional)
     * @param  string $end_date Fecha de inicio del perido a filtrar en formato dd-mm-yyyy (optional)
     * @param  string $init_date Fecha de inicio del perido a filtrar en formato dd-mm-yyyy (optional)
     * @param  string $rfc RFC del beneficiario (optional)
     * @param  string $status Estatus de la cuenta (optional)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\BeneficiariesResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function getBeneficiariesForAccountUsingGETWithHttpInfo($authorization, $subscription, $account = null, $beneficiary_bank = null, $beneficiary_name = null, $end_date = null, $init_date = null, $rfc = null, $status = null)
    {
        $returnType = '\mx\wire4\client\model\BeneficiariesResponse';
        $request = $this->getBeneficiariesForAccountUsingGETRequest($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $rfc, $status);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\BeneficiariesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 204:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\BeneficiariesResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBeneficiariesForAccountUsingGETAsync
     *
     * Consulta los beneficiarios registrados
     *
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     * @param  string $account Cuenta del beneficiario, puede ser Clabe, TDD o Celular (optional)
     * @param  string $beneficiary_bank Clave del banco beneficiario (optional)
     * @param  string $beneficiary_name Nombre del beneficiario (optional)
     * @param  string $end_date Fecha de inicio del perido a filtrar en formato dd-mm-yyyy (optional)
     * @param  string $init_date Fecha de inicio del perido a filtrar en formato dd-mm-yyyy (optional)
     * @param  string $rfc RFC del beneficiario (optional)
     * @param  string $status Estatus de la cuenta (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBeneficiariesForAccountUsingGETAsync($authorization, $subscription, $account = null, $beneficiary_bank = null, $beneficiary_name = null, $end_date = null, $init_date = null, $rfc = null, $status = null)
    {
        return $this->getBeneficiariesForAccountUsingGETAsyncWithHttpInfo($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $rfc, $status)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBeneficiariesForAccountUsingGETAsyncWithHttpInfo
     *
     * Consulta los beneficiarios registrados
     *
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     * @param  string $account Cuenta del beneficiario, puede ser Clabe, TDD o Celular (optional)
     * @param  string $beneficiary_bank Clave del banco beneficiario (optional)
     * @param  string $beneficiary_name Nombre del beneficiario (optional)
     * @param  string $end_date Fecha de inicio del perido a filtrar en formato dd-mm-yyyy (optional)
     * @param  string $init_date Fecha de inicio del perido a filtrar en formato dd-mm-yyyy (optional)
     * @param  string $rfc RFC del beneficiario (optional)
     * @param  string $status Estatus de la cuenta (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function getBeneficiariesForAccountUsingGETAsyncWithHttpInfo($authorization, $subscription, $account = null, $beneficiary_bank = null, $beneficiary_name = null, $end_date = null, $init_date = null, $rfc = null, $status = null)
    {
        $returnType = '\mx\wire4\client\model\BeneficiariesResponse';
        $request = $this->getBeneficiariesForAccountUsingGETRequest($authorization, $subscription, $account, $beneficiary_bank, $beneficiary_name, $end_date, $init_date, $rfc, $status);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'getBeneficiariesForAccountUsingGET'
     *
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     * @param  string $account Cuenta del beneficiario, puede ser Clabe, TDD o Celular (optional)
     * @param  string $beneficiary_bank Clave del banco beneficiario (optional)
     * @param  string $beneficiary_name Nombre del beneficiario (optional)
     * @param  string $end_date Fecha de inicio del perido a filtrar en formato dd-mm-yyyy (optional)
     * @param  string $init_date Fecha de inicio del perido a filtrar en formato dd-mm-yyyy (optional)
     * @param  string $rfc RFC del beneficiario (optional)
     * @param  string $status Estatus de la cuenta (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function getBeneficiariesForAccountUsingGETRequest($authorization, $subscription, $account = null, $beneficiary_bank = null, $beneficiary_name = null, $end_date = null, $init_date = null, $rfc = null, $status = null)
    {
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling getBeneficiariesForAccountUsingGET'
            );
        }
        // verify the required parameter 'subscription' is set
        if ($subscription === null || (is_array($subscription) && count($subscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription when calling getBeneficiariesForAccountUsingGET'
            );
        }

        $resourcePath = '/subscriptions/{subscription}/beneficiaries/spei';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($account !== null) {
            $queryParams['account'] = ObjectSerializer::toQueryValue($account);
        }
        // query params
        if ($beneficiary_bank !== null) {
            $queryParams['beneficiary_bank'] = ObjectSerializer::toQueryValue($beneficiary_bank);
        }
        // query params
        if ($beneficiary_name !== null) {
            $queryParams['beneficiary_name'] = ObjectSerializer::toQueryValue($beneficiary_name);
        }
        // query params
        if ($end_date !== null) {
            $queryParams['end_date'] = ObjectSerializer::toQueryValue($end_date);
        }
        // query params
        if ($init_date !== null) {
            $queryParams['init_date'] = ObjectSerializer::toQueryValue($init_date);
        }
        // query params
        if ($rfc !== null) {
            $queryParams['rfc'] = ObjectSerializer::toQueryValue($rfc);
        }
        // query params
        if ($status !== null) {
            $queryParams['status'] = ObjectSerializer::toQueryValue($status);
        }
        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($subscription !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription' . '}',
                ObjectSerializer::toPathValue($subscription),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation preRegisterAccountsUsingPOST
     *
     * Pre-registro de cuentas de beneficiarios.
     *
     * @param  \mx\wire4\client\model\AccountRequest $body Información de la cuenta del beneficiario (required)
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\TokenRequiredResponse
     */
    public function preRegisterAccountsUsingPOST($body, $authorization, $subscription)
    {
        list($response) = $this->preRegisterAccountsUsingPOSTWithHttpInfo($body, $authorization, $subscription);
        return $response;
    }

    /**
     * Operation preRegisterAccountsUsingPOSTWithHttpInfo
     *
     * Pre-registro de cuentas de beneficiarios.
     *
     * @param  \mx\wire4\client\model\AccountRequest $body Información de la cuenta del beneficiario (required)
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\TokenRequiredResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function preRegisterAccountsUsingPOSTWithHttpInfo($body, $authorization, $subscription)
    {
        $returnType = '\mx\wire4\client\model\TokenRequiredResponse';
        $request = $this->preRegisterAccountsUsingPOSTRequest($body, $authorization, $subscription);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 202:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\TokenRequiredResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 401:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 403:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 500:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\ErrorResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation preRegisterAccountsUsingPOSTAsync
     *
     * Pre-registro de cuentas de beneficiarios.
     *
     * @param  \mx\wire4\client\model\AccountRequest $body Información de la cuenta del beneficiario (required)
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function preRegisterAccountsUsingPOSTAsync($body, $authorization, $subscription)
    {
        return $this->preRegisterAccountsUsingPOSTAsyncWithHttpInfo($body, $authorization, $subscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation preRegisterAccountsUsingPOSTAsyncWithHttpInfo
     *
     * Pre-registro de cuentas de beneficiarios.
     *
     * @param  \mx\wire4\client\model\AccountRequest $body Información de la cuenta del beneficiario (required)
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function preRegisterAccountsUsingPOSTAsyncWithHttpInfo($body, $authorization, $subscription)
    {
        $returnType = '\mx\wire4\client\model\TokenRequiredResponse';
        $request = $this->preRegisterAccountsUsingPOSTRequest($body, $authorization, $subscription);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'preRegisterAccountsUsingPOST'
     *
     * @param  \mx\wire4\client\model\AccountRequest $body Información de la cuenta del beneficiario (required)
     * @param  string $authorization Header para token (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function preRegisterAccountsUsingPOSTRequest($body, $authorization, $subscription)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling preRegisterAccountsUsingPOST'
            );
        }
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling preRegisterAccountsUsingPOST'
            );
        }
        // verify the required parameter 'subscription' is set
        if ($subscription === null || (is_array($subscription) && count($subscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription when calling preRegisterAccountsUsingPOST'
            );
        }

        $resourcePath = '/subscriptions/{subscription}/beneficiaries/spei';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($subscription !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription' . '}',
                ObjectSerializer::toPathValue($subscription),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'POST',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation removeBeneficiariesPendingUsingDELETE
     *
     * Eliminación de beneficiarios SPEI® sin confirmar
     *
     * @param  string $authorization Header para token (required)
     * @param  string $request_id Identificador de los beneficiarios a eliminar (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function removeBeneficiariesPendingUsingDELETE($authorization, $request_id, $subscription)
    {
        $this->removeBeneficiariesPendingUsingDELETEWithHttpInfo($authorization, $request_id, $subscription);
    }

    /**
     * Operation removeBeneficiariesPendingUsingDELETEWithHttpInfo
     *
     * Eliminación de beneficiarios SPEI® sin confirmar
     *
     * @param  string $authorization Header para token (required)
     * @param  string $request_id Identificador de los beneficiarios a eliminar (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     */
    public function removeBeneficiariesPendingUsingDELETEWithHttpInfo($authorization, $request_id, $subscription)
    {
        $returnType = '';
        $request = $this->removeBeneficiariesPendingUsingDELETERequest($authorization, $request_id, $subscription);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            return [null, $statusCode, $response->getHeaders()];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation removeBeneficiariesPendingUsingDELETEAsync
     *
     * Eliminación de beneficiarios SPEI® sin confirmar
     *
     * @param  string $authorization Header para token (required)
     * @param  string $request_id Identificador de los beneficiarios a eliminar (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeBeneficiariesPendingUsingDELETEAsync($authorization, $request_id, $subscription)
    {
        return $this->removeBeneficiariesPendingUsingDELETEAsyncWithHttpInfo($authorization, $request_id, $subscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation removeBeneficiariesPendingUsingDELETEAsyncWithHttpInfo
     *
     * Eliminación de beneficiarios SPEI® sin confirmar
     *
     * @param  string $authorization Header para token (required)
     * @param  string $request_id Identificador de los beneficiarios a eliminar (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function removeBeneficiariesPendingUsingDELETEAsyncWithHttpInfo($authorization, $request_id, $subscription)
    {
        $returnType = '';
        $request = $this->removeBeneficiariesPendingUsingDELETERequest($authorization, $request_id, $subscription);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'removeBeneficiariesPendingUsingDELETE'
     *
     * @param  string $authorization Header para token (required)
     * @param  string $request_id Identificador de los beneficiarios a eliminar (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function removeBeneficiariesPendingUsingDELETERequest($authorization, $request_id, $subscription)
    {
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling removeBeneficiariesPendingUsingDELETE'
            );
        }
        // verify the required parameter 'request_id' is set
        if ($request_id === null || (is_array($request_id) && count($request_id) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $request_id when calling removeBeneficiariesPendingUsingDELETE'
            );
        }
        // verify the required parameter 'subscription' is set
        if ($subscription === null || (is_array($subscription) && count($subscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription when calling removeBeneficiariesPendingUsingDELETE'
            );
        }

        $resourcePath = '/subscriptions/{subscription}/beneficiaries/spei/request/{requestId}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($request_id !== null) {
            $resourcePath = str_replace(
                '{' . 'requestId' . '}',
                ObjectSerializer::toPathValue($request_id),
                $resourcePath
            );
        }
        // path params
        if ($subscription !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription' . '}',
                ObjectSerializer::toPathValue($subscription),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                []
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                [],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'DELETE',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateAmountLimitAccountUsingPUT
     *
     * Solicitud para actualizar el monto límite
     *
     * @param  \mx\wire4\client\model\AmountRequest $body Información de la cuenta y el monto límite a actualizar (required)
     * @param  string $authorization Header para token (required)
     * @param  string $account Cuenta a actualizar (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \mx\wire4\client\model\TokenRequiredResponse
     */
    public function updateAmountLimitAccountUsingPUT($body, $authorization, $account, $subscription)
    {
        list($response) = $this->updateAmountLimitAccountUsingPUTWithHttpInfo($body, $authorization, $account, $subscription);
        return $response;
    }

    /**
     * Operation updateAmountLimitAccountUsingPUTWithHttpInfo
     *
     * Solicitud para actualizar el monto límite
     *
     * @param  \mx\wire4\client\model\AmountRequest $body Información de la cuenta y el monto límite a actualizar (required)
     * @param  string $authorization Header para token (required)
     * @param  string $account Cuenta a actualizar (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \mx\wire4\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \mx\wire4\client\model\TokenRequiredResponse, HTTP status code, HTTP response headers (array of strings)
     */
    public function updateAmountLimitAccountUsingPUTWithHttpInfo($body, $authorization, $account, $subscription)
    {
        $returnType = '\mx\wire4\client\model\TokenRequiredResponse';
        $request = $this->updateAmountLimitAccountUsingPUTRequest($body, $authorization, $account, $subscription);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
                if (!in_array($returnType, ['string','integer','bool'])) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\mx\wire4\client\model\TokenRequiredResponse',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateAmountLimitAccountUsingPUTAsync
     *
     * Solicitud para actualizar el monto límite
     *
     * @param  \mx\wire4\client\model\AmountRequest $body Información de la cuenta y el monto límite a actualizar (required)
     * @param  string $authorization Header para token (required)
     * @param  string $account Cuenta a actualizar (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateAmountLimitAccountUsingPUTAsync($body, $authorization, $account, $subscription)
    {
        return $this->updateAmountLimitAccountUsingPUTAsyncWithHttpInfo($body, $authorization, $account, $subscription)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateAmountLimitAccountUsingPUTAsyncWithHttpInfo
     *
     * Solicitud para actualizar el monto límite
     *
     * @param  \mx\wire4\client\model\AmountRequest $body Información de la cuenta y el monto límite a actualizar (required)
     * @param  string $authorization Header para token (required)
     * @param  string $account Cuenta a actualizar (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function updateAmountLimitAccountUsingPUTAsyncWithHttpInfo($body, $authorization, $account, $subscription)
    {
        $returnType = '\mx\wire4\client\model\TokenRequiredResponse';
        $request = $this->updateAmountLimitAccountUsingPUTRequest($body, $authorization, $account, $subscription);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                        if ($returnType !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'updateAmountLimitAccountUsingPUT'
     *
     * @param  \mx\wire4\client\model\AmountRequest $body Información de la cuenta y el monto límite a actualizar (required)
     * @param  string $authorization Header para token (required)
     * @param  string $account Cuenta a actualizar (required)
     * @param  string $subscription El identificador de la suscripción a esta API (required)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function updateAmountLimitAccountUsingPUTRequest($body, $authorization, $account, $subscription)
    {
        // verify the required parameter 'body' is set
        if ($body === null || (is_array($body) && count($body) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $body when calling updateAmountLimitAccountUsingPUT'
            );
        }
        // verify the required parameter 'authorization' is set
        if ($authorization === null || (is_array($authorization) && count($authorization) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $authorization when calling updateAmountLimitAccountUsingPUT'
            );
        }
        // verify the required parameter 'account' is set
        if ($account === null || (is_array($account) && count($account) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $account when calling updateAmountLimitAccountUsingPUT'
            );
        }
        // verify the required parameter 'subscription' is set
        if ($subscription === null || (is_array($subscription) && count($subscription) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $subscription when calling updateAmountLimitAccountUsingPUT'
            );
        }

        $resourcePath = '/subscriptions/{subscription}/beneficiaries/spei/{account}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($account !== null) {
            $resourcePath = str_replace(
                '{' . 'account' . '}',
                ObjectSerializer::toPathValue($account),
                $resourcePath
            );
        }
        // path params
        if ($subscription !== null) {
            $resourcePath = str_replace(
                '{' . 'subscription' . '}',
                ObjectSerializer::toPathValue($subscription),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;
        if (isset($body)) {
            $_tempBody = $body;
        }

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json'],
                ['application/json']
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            $httpBody = $_tempBody;
            // \stdClass has no __toString(), so we should encode it manually
            if ($httpBody instanceof \stdClass && $headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($httpBody);
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'PUT',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
