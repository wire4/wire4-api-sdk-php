<?php
/**
 * Payment
 *
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
 * # Referencia de API La API de Wire4 está organizada en torno a REST. Nuestra API tiene URLs predecibles orientadas a los recursos, acepta peticiones en formato JSON, y las respuestas devueltas son formato JSON y utiliza códigos de respuesta HTTP, autenticación y verbos estándares.  Puede usar la API de Wire4 en nuestro entorno de prueba, que no afecta sus productivos ni interactúa con la red bancaria. La URL de conexión que se usa para invocar los servicios determina si la solicitud es en modo en de prueba o en modo producción.    # Autenticación La API de Wire4 utiliza el protocolo OAuth 2.0 para autenticación y autorización.   Para comenzar, es necesario que registre una cuenta en nuestro ambiente de pruebas en [registro](https://app-sndbx.wire4.mx/#/register) y obtenga las credenciales de cliente OAuth 2.0 desde la [consola de administración](https://app-sndbx.wire4.mx/#/dashboard/api-keys).   Esta página ofrece una descripción general de los escenarios de autorización de OAuth 2.0 que admite Wire4.   Después de crear su aplicación con Wire4, asegúrese de tener a la mano su `client_id` y `client_secret`. El siguiente paso es descubrir qué flujo de OAuth2 es el adecuado para sus propósitos.   ## URLS La siguiente tabla muestra las urls de los recursos de autenticación para el ambiente de pruebas.  URL                  | Descripción ------------------------------------ | ------------- https://sandbox-api.wire4.mx/token   | Obtener token de autorización llaves de API (*client_id*, *client_secret*), datos de suscripción (*client_id*, *client_secret*, *user_key*, *user_secret*) o (*refresh_token*) https://sandbox-api.wire4.mx/revoke  | Revocación de token  **Nota:** De acuerdo con el RFC 6749, la URL del token sólo acepta el tipo de contenido x-www-form-urlencoded. El contenido JSON no está permitido y devolverá un error.  ## Scopes Los `scopes` limitan el acceso de una aplicación a los recursos de Wire4. Se ofrecen los siguientes scopes de acuerdo al producto:  Producto                             |Scope                      | Descripción -------------------------------------|------------------------------------ | ------------- SPEI-SPID                            |general                              | Permite llamar a operaciones que no requieren a un cliente Monex suscrito en Wire4, los recursos que se pueden consumir con este scope son: consulta de Instituciones, CEP y generación de una presuscripción. SPEI-SPID                            |spei_admin                           | Permite llamar a operaciones que requieren de un cliente Monex suscrito en Wire4, ya que se proporciona información de saldos, administración de transacciones, cuentas de beneficiarios y cuentas de depositantes. SPEI-SPID                            |spid_admin                           | Permite llamar sólo a operaciones SPID, se requiere de un cliente Monex suscrito en Wire4. CODI                                 |codi_general                         | Permite llamar a operaciones de administración sobre el producto CoDi, como creación y listado de empresas  CODI                                 |codi_admin                           | Permite llamar sólo a operaciones CoDi dentro de un punto de venta, las operaciones incluyen creación, consulta, listado, etc de peticiones de pago CODI                                 |codi_report                          | Permite generar reportes de operaciones CoDi. TODOS                                |device_[dispositivo]                 | Se debe especificar cuándo se gestionan token's desde distintos dispositivos.  ## Tipos de autenticación   Wire4 cuenta con dos tipos de autenticación: Autenticación de Aplicación (OAuth 2.0  Client Credentials Grant)  y Autenticación de Usuario de Aplicación (OAuth 2.0 Password Grant).  ### Autenticación de Aplicación  Esta autenticación se obtiene proporcionando únicamente las llaves de API las cuáles se pueden consultar en [Llaves de API](https://app-sndbx.wire4.mx/#/dashboard/api-keys) de la consola de administración.  La autenticación de aplicación permite accesso a recursos generales y de administración que dependeran del scope.  Para este tipo de autenticación se sigue el flujo OAuth 2.0 Client Credentials Grant, que se describe más adelante en **Obtener el token de acceso de aplicación**, algunos de los recursos que requieren este tipo de autenticación son:   * [/subscriptions/pre-subscription](link) * [/institutions](link>) * [/ceps](<link>) * [/codi/compaies](<link>)  ### Autenticación de Usuario de Aplicación  Esta autenticación se obtiene proporcionando las llaves de API las cuáles se pueden consultar en [Llaves de API](https://app-sndbx.wire4.mx/#/dashboard/api-keys) más el ***user_key*** y ***user_secret*** que se proporcionan al momento de crear una suscripción o un punto de venta, para más información puedes consultar las guías [creación de suscripción](https://www.wire4.mx/#/guides/subscriptions), [creación de punto de venta](https://www.wire4.mx/#/guides/salespoint).  Con este tipo de autenticación se puede acceder a los recursos especificos que requieren configuraciones y acceso más puntual como información de una cuentas, saldos y administración de transacciones SPEID-SPID o CODI.    ## Obtener token de acceso Antes de que su aplicación pueda acceder a los datos mediante la API de Wire4, debe obtener un token de acceso ***(access_token)*** que le otorgue acceso a la API. En las siguientes secciones se muestra como obtener un token para cada una de las autenticaciones.     ### Obtener el token de acceso para autenticación de aplicación  El primer paso es crear la solicitud de token de acceso (*access_token*), con los parámetros que identifican su aplicación, el siguiente código muestra cómo obtener un `token`.  ``` curl -k -d \"grant_type= client_credentials&scope=general\"  -u \"<client id>:<client secret>\" https://sandbox-api.wire4.mx/token ``` **Ejemplo:**   ``` curl -k -d \"grant_type=client_credentials&scope=general\"  -u \"8e59YqaFW_Yo5dwWNxEY8Lid0u0a:AXahn79hfKWBXKzQfj011x8cvcQa\"  https://sandbox-api.wire4.mx /token ``` Obtendrá una respuesta como la que se muestra a continuación, donde se debe obtener el *access_token* para realizar llamadas posteriores a la API.   ``` {     \"access_token\":\"eyJ4NXQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJraWQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJpc21hZWwuZXNjYW1pbGxhQHRjcGlwLnRlY2hAc2FuZGJveC5zcGVpb2suY29tIiwiYXVkIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsIm5iZiI6MTU3MTMyMDg3NywiYXpwIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsInNjb3BlIjoiYW1fYXBwbGljYXRpb25fc2NvcGUgZ2VuZXJhbCIsImlzcyI6ImFwaW0taWRwIiwiZXhwIjoxNTcxMzI0NDc3LCJpYXQiOjE1NzEzMjA4NzcsImp0aSI6ImJkMTdjMjcyLTg4MGQtNDk0ZS1iMTMwLTBiYTkwMjYyN2M4NCJ9.AjngGylkd_Chs5zlIjyLRPu9xPGyz4dfCd_aax2_ts653xrnNMoLpVHUDmaxIDFF2XyBJKH2IAbKxjo6VsFM07QkoPhlysO1PLoAF-Vkt4xYkh-f7nJRl0oOe2utDWFlUdgiAOmx5tPcStrdCEftgNNrjwJ50LXysFjXVshpoST-zIJPLgXknM3esGrkAsLcZRM7XUB187jxLHbtefVYPMvSO31T9pd5_Co9UXdeHpuA98sk_wZknASM1phxXQZAMLRLHz3LYvjCWCr_v80oVCM9SWTzf0vrMI6xphoIfirfWloADKPTTSUpIGBw9ePF_WbEPvbMm_BZaApJcEH2w\",    \"scope\":\"am_application_scope general\",    \"token_type\":\"Bearer\",    \"expires_in\":3600 }  ```  Es posible generar tokens con más de un scope, en caso que sea necesario utilizar dicho token para hacer más de una operación. Para generarlo basta con agregarlo a la petición separado por un espacio.     ``` curl -k -d \"grant_type=client_credentials&scope=codi_general codi_report\"  -u \"8e59YqaFW_Yo5dwWNxEY8Lid0u0a:AXahn79hfKWBXKzQfj011x8cvcQa\"  https://sandbox-api.wire4.mx /token ```  ### Obtener el token de acceso para autenticación usuario de aplicación   Antes de que su aplicación pueda acceder a los datos de una cuenta Monex mediante la API de Wire4, debe obtener un token de acceso  (*access_token*) que le otorgue acceso a la API y contar con el  *user_key* y *user_secret* que se proporcionan al momento de crear  una suscripción para más información puedes consultar [creación de suscripción](https://wire4.mx/#/guides/subscriptions) .   El primer paso es crear la solicitud de token de acceso con los parámetros que identifican su aplicación y la suscripción y con `scope` `spei_admin`  ```   curl -k -d \"grant_type=password&scope=spei_admin&username=<user_key>&password=<user_secret>\"  -u \"<client_id>:<client_secret>\" https://sandbox-api.wire4.mx/token ``` **Ejemplo**  ``` curl -k -d \"grant_type=password&scope=spei_admin&username=6 nbC5e99tTO@sandbox.wire4com&password= Nz7IqJGe9h\" -u \" zgMlQbqmOr:plkMJoPXCI\" https://sandbox-api.wire4.mx /token  ```  ``` {     \"access_token\":\"eyJ4NXQiOiJPR1EyTURFM00yTmpObVZoTnpFeE5EWXlObUV4TURKa01qUTJaVEU0TWpGaE1tVmlZakV5TkEiLCJraWQiOiJPR1EyTURFM00yTmpObVZoTnpFeE5EWXlObUV4TURKa01qUTJaVEU0TWpGaE1tVmlZakV5TkEiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiIzMzE0ODRlZTdjZDRkYWU5MzRmMjY2Zjc5YmY1YWFAZGV2LWllc2NhbWlsbGEuc3BlaW9rLmNvbSIsImF1ZCI6IkJVR0xjNWw1bW5CZXlPeGxtamNUZ0JoS19WTWEiLCJuYmYiOjE1NzEzNDk4ODMsImF6cCI6IkJVR0xjNWw1bW5CZXlPeGxtamNUZ0JoS19WTWEiLCJzY29wZSI6InNwZWlfYWRtaW4iLCJpc3MiOiJhcGltLWlkcCIsImV4cCI6MTU3MTM1MzQ4MywiaWF0IjoxNTcxMzQ5ODgzLCJqdGkiOiJiOWQ1M2Q0MC0xN2MwLTQxOTItYjUwNy0wZWFhN2ZkNDA1MGYifQ.hLTk8AFoIce1GpLcgch-U5aLLgiiFTo49wfBErD8D6VF-H9sG13ZyfAx9T-vQkk2m1zPapYVQjwibz3GRAJMN0Vczs6flV1mUJwFDQbEE-AELPdRcaRFOMBCfF6H9TVLfhFsGb9U2pVR9TLJcKqR57DyO_dIcc9I6d0tIkxqn2VcqypLVi5YQf36WzBbPeG-iPHYpMA-bhr4rwfjKA-O6jm1NSSxNHF4sHS0YHDPoO_x6cCc677MQEe0_CozfnQhoEWNfG8tcWUqhPtmcfjqon1p7PdQoXxriq_R85d06pVO9Se7Q6ok0V8Qgz0MOJ6z3ku6mtZSuba7niMAOt2TyA\",    \"refresh_token\":\"f962d5c6-0d99-3809-8275-11c7aa0aa020\",    \"scope\":\"spei_admin\",    \"token_type\":\"Bearer\",    \"expires_in\":3600 } ```  **Suscripciones in activas**   En caso de intentar obtener el token de acceso para una suscriptión que no esta activa obtendra una respuesta de error con código 400 ``` curl -k -d \"grant_type=password&scope=spei_admin&username=6 nbC5e99tTO@sandbox.wire4com&password= Nz7IqJGe9h\" -u \" zgMlQbqmOr:plkMJoPXCI\" https://sandbox-api.wire4.mx /token  ``` ``` {     \"error_description\": \"Error while authenticating user from user store\",     \"error\": \"invalid_grant\" } ```    Una vez que la suscripción se reactive podrá generar el token de acceso de forma normal.    **Nota:** Los ejemplos anteriores se presentan considerando que se realiza una implementación desde cero,  esto se puede simplificar a sólo configurar sus llaves (*client_id*, *client_secret*),  datos de suscripción (*client_id*, *client_secret*, *user_key*, *user_secret*) si utiliza nuestros sdks.      **Consideraci&oacute;n:** Si la aplicaci&oacute;n en la que implementar&aacute; Wire4 estar&aacute; desplegada en más de una instancia o servidor en cada solicitud de token debe especificar un scope adicional. La forma de hacer esto es que, cuándo se solicita un token se debe especificar un scope adicional con el prefijo \"device_\" +  el dispositivo, por ejemplo:                                                                                                                                                                                                                     device_server1<br> device_server2  en consecuencia cada instancia debe operar con el token gestionado. ***Si se opera con el mismo token en instancias diferentes encontrará problemas de Credenciales Inv&aacute;lidas.***  **Ejemplo de solicitud de token para instancias diferentes:**  ``` curl -k -d \"grant_type=password&username=0883b97333046abb76367698b57d9e@sandbox.wire4.mx&password=9e0d81f95705079b9fe1e129315c25&scope=device_server1 codi_admin\" -H \"Authorization: Basic dmZSeURpTHdFbVZqd2VIclp0OWRMbXFmb3YwYTpJQJBuamBac3V6SllLWlJHUkJEYUZrN1BhRmNh\" https://sandbox-api.wire4.mx/token  curl -k -d \"grant_type=password&username=0883b97333046abb76367698b57d9e@sandbox.wire4.mx&password=9e0d81f95705079b9fe1e129315c25&scope=device_server2 codi_admin\" -H \"Authorization: Basic dmZSeURpTHdFbVZqd2VIclp0OWRMbXFmb3YwYTpJQJBuamBac3V6SllLWlJHUkJEYUZrN1BhRmNh\" https://sandbox-api.wire4.mx/token ```  ## Caducidad del token El token de acceso es válido durante 60 minutos (una hora), después de transcurrido este tiempo se debe solicitar un nuevo token,  cuando el token caduca se obtendrá un error ***401 Unauthorized*** con mensaje ***“Invalid Credentials”.***   El nuevo token se puede solicitar  utilizando el último token de actualización (***refresh_token***) que se devolvió en la solicitud del token,   esto sólo aplica para el token de tipo password (Autenticación de Usuario de Aplicación). El siguiente ejemplo muestra cómo obtener un toke con el token de actualización.  ``` curl -k -d \"grant_type=refresh_token&refresh_token=<refresh_token>\" -u \" Client_Id:Client_Secret\" -H \"Content-Type: application/x-www-form-urlencoded\" https://sandbox-api.wire4.mx/oauth2/token ```  **Ejemplo:**  ``` curl -k -d \"grant_type=refresh_token&refresh_token=f932d5c6-0d39-3809-8275-11c7ax0aa020\" -u \"zgMlQbqmOr:plkMJoPXCI\" -H \"Content-Type: application/x-www-form-urlencoded\" https://sandbox-api.wire4.mx/token ```  El token de actualización (***refresh_token***) tiene una duración de hasta 23 horas. Si en este periodo no se utiliza, se tienen que solicitar un nuevo token.  Un token de acceso podría dejar de funcionar por uno de estos motivos:  * El usuario ha revocado el acceso a su aplicación, si un usuario ha solicitado la baja de su aplicación de WIre4. * El token de acceso ha caducado: si el token de acceso ha pasado de una hora, recibirá un error ***401 Unauthorized*** mientras realiza una llamada a la API de Wire4. Cuando esto sucede, debe solicitar un nuevo token utilizando el token de actualización que recibió por última al solicitar un token, sólo aplica si el token en cuestión es de autenticación de usuario de aplicación, en caso contrario solicitar un nuevo token.   ## Revocar token Su aplicación puede revocar mediante programación el token de acceso, una vez revocado el token no podrá hacer uso de él para acceder a la API. El siguiente código muestra un ejemplo de cómo revocar el token:    ```  curl -X POST --basic -u \"<client id>:<client secret>\" -H \"Content-Type: application/x-www-form-urlencoded;charset=UTF-8\" -k -d \"token=<token to revoke>&token_type_hint=access_token\" https://sandbox-api.wire4.mx/revoke ```      **Ejemplo:**  ```   curl -X POST --basic -u \"8e59YqaFW_Yo5dwWNxEY8Lid0u0a:AXahn79hfKWBXKzQfj011x8cvcQa\" -H \"Content-Type: application/x-www-form-urlencoded;charset=UTF-8\" -k -d \"token=eyJ4NXQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJraWQiOiJZak5sWVdWa05tWmlNR1ZoTldSaU1EUXpaREJpWlRJNU1qYzFZV1ZoWWpneU5UYzJPV05sWVEiLCJhbGciOiJSUzI1NiJ9.eyJzdWIiOiJpc21hZWwuZXNjYW1pbGxhQHRjcGlwLnRlY2hAc2FuZGJveC5zcGVpb2suY29tIiwiYXVkIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsIm5iZiI6MTU3MTMyMDg3NywiYXpwIjoiOGU1OVlxYUZXX1lvNWR3V054RVk4TGlkMHUwYSIsInNjb3BlIjoiYW1fYXBwbGljYXRpb25fc2NvcGUgZ2VuZXJhbCIsImlzcyI6ImFwaW0taWRwIiwiZXhwIjoxNTcxMzI0NDc3LCJpYXQiOjE1NzEzMjA4NzcsImp0aSI6ImJkMTdjMjcyLTg4MGQtNDk0ZS1iMTMwLTBiYTkwMjYyN2M4NCJ9.AjngGylkd_Chs5zlIjyLRPu9xPGyz4dfCd_aax2_ts653xrnNMoLpVHUDmaxIDFF2XyBJKH2IAbKxjo6VsFM07QkoPhlysO1PLoAF-Vkt4xYkh-f7nJRl0oOe2utDWFlUdgiAOmx5tPcStrdCEftgNNrjwJ50LXysFjXVshpoST-zIJPLgXknM3esGrkAsLcZRM7XUB187jxLHbtefVYPMvSO31T9pd5_Co9UXdeHpuA98sk_wZknASM1phxXQZAMLRLHz3LYvjCWCr_v80oVCM9SWTzf0vrMI6xphoIfirfWloADKPTTSUpIGBw9ePF_WbEPvbMm_BZaApJcEH2w&token_type_hint=access_token\"  https://sandbox-api.wire4.mx/revoke ```  # Ambientes  Wire4 cuentas con dos ambientes Pruebas (Sandbox) y Producción, son dos ambientes separados los cuáles se pueden utilizar simultáneamente. Los usuarios que han sido creados en cada uno de los ambientes no son intercambiables.   Las ligas de acceso a la `api` para cada uno de los ambientes son:  * Pruebas  https://sandbox-api.wire4.mx * Producción https://api.wire4.mx     # Eventos  Los eventos son nuestra forma de informarle cuando algo sucede en su cuenta. Cuando ocurre un evento se crea un objeto  [Evento](#tag/Webhook-Message). Por ejemplo, cuando se recibe un depósito, se crea un evento TRANSACTION.INCOMING.UPDATED.   Los eventos ocurren cuando cambia el estado de un recurso. El recurso se encuentra dentro del objeto [Evento](#tag/Webhook-Message) en el campo data.  Por ejemplo, un evento TRANSACTION.INCOMING.UPDATED contendrá un depósito y un evento ACCOUNT.CREATED contendrá una cuenta.   Wire4 puede agregar más campos en un futuro, o agregar nuevos valores a campos existentes, por lo que es recomendado que tu endpoint pueda manejar datos adicionales desconocidos. En esta [liga](#tag/Webhook-Message) se encuentra  la definición del objeto [Evento](#tag/Webhook-Message).  ## Tipos de Eventos  Wire4 cuenta con los siguientes tipos de eventos*   | Evento                               | Tipo                               | Objeto                                                  | | ------------------------------------ |----------------------------------- | ------------------------------------------------------- | | Suscripción                          | ENROLLMENT.CREATED                 | [suscription](#tag/subscription)                        | | Cuenta de beneficiario               | ACCOUNT.CREATED                    | [beneficiary](#tag/BeneficiaryAccount)                  | | Depósito recibido                    | TRANSACTION.INCOMING.UPDATED       | [spei_incoming](#tag/deposit)                           | | Solicitud de autorización de depósito| TRANSACTION.INCOMING.AUTHORIZATION | [spei_incoming_authorization](#tag/depositAuthorization)| | Transferencia realizada              | TRANSACTION.OUTGOING.RECEIVED      | [spei_outgoing](#tag/transfer)                          | | Transferencia SPID enviada           | TRANSACTION.OUTGOING.SPID.RECEIVED | [spid_outgoing](#tag/transfer)                          | | Transferencias Autorizadas           | REQUEST.OUTGOING.CHANGED           | [request_outgoing](#tag/requestOutMsg)                  | | Operación CoDi                       | CODI.ACTIONS                       | [codi_actions](#tag/codiActions)                        | | Punto de venta CoDi                  | SALE.POINT.CREATED                 | [codi_sales_point](#tag/codiSalesPoint)                 |   # Codigos de Error Al registrar transferencias tanto SPEI como SPID se aplican las validaciones de formato de datos a la petición descritas en la definición de cada recurso. Si la petición contiene errores, se genera una respuesta de error 409 que contiene el listado de las validaciones que no fueran exitosas.  Por cada error detectado se genera un elemento \"error\" que contiene el order_id de la transacción que genero el error, el código de error y un mensaje con más información sobre el mismo.  Si una misma transacción contiene varios errores, la respuesta  tendrá un elemento en la lista \"errors\" por cada validación que no fue exitosa.  Existen dos casos por los cuales alguno de los elementos en el listado de errores puede no contener order_id:  * Si alguna transacción no provee esta información  * En caso de transacciones SPEI, si el error está en las URLs ya que son datos relacionados a un lote de transacciones     **Ejemplo:**    ```   {      \"http_status\": 409,     \"message\": \"La divisa es incorrecta para esta transacción se espera: MXP, y se recibió: MXPD., El identificador 18e9c4a3-8c7a-42e8-99f4-ebi7r5r6y034 esta duplicado.\",     \"errors\": [         {             \"error\": \"La divisa es incorrecta para esta transacción se espera: MXP, y se recibió: MXPD.\",             \"code\": \"TR-1010\",             \"order_id\": \"18e9c4a3-8c7a-42e8-99f4-ebi7r5r6y034\"         },         {             \"error\": \"El identificador 18e9c4a3-8c7a-42e8-99f4-ebi7r5r6y034 esta duplicado.\",             \"code\": \"TR-1004\",             \"order_id\": \"18e9c4a3-8c7a-42e8-99f4-ebi7r5r6y034\"         }     ] }  ```      ## Códigos de error para generación de transferencias SPEI/SPID | Código                        | Descripción                                                                        | |-------------------------------|-----------------------------------------------------------------------------------| |A-1001     |La URL para éxito es requerida                                                                         | | A-1002  |La URL para retorno en caso de error es requerida                                                      | | TR-1001  |La petición debe incluir al menos una transacción                                                      | | TR-1002  |El identificador de la transacción es requerido                                                         | | TR-1003  |El identificador de la transacción no es valido                                                         | | TR-1004  |El identificador de la transacción esta duplicado                                                       | | TR-1005  |El monto de la transacción es requerido                                                                | | TR-1006  |El valor del monto no es valido                                                                        | | TR-1007  |La cuenta de beneficiario es requerida                                                                  | | TR-1008  |La cuenta de beneficiario no es valida                                                                  | | TR-1009  |El código de moneda es requerido                                                                       | | TR-1010  |El código de moneda no es valido                                                                       | | TR-1011  |El listado de email supera 10 elementos                                                                | | TR-1012  |La referencia es requerida                                                                             | | TR-1013  |La referencia no es valida                                                                             | | TR-1014  |El concepto es requerido                                                                               | | TR-1015  |El concepto no es valido                                                                               | | TR-1016  |El identificador de clasificación SPID es requerido                                                      |
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

namespace mx\wire4\client\model;

use \ArrayAccess;
use \mx\wire4\ObjectSerializer;

/**
 * Payment Class Doc Comment
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Payment implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Payment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'account' => 'string',
'amount' => 'float',
'beneficiary_account' => 'string',
'beneficiary_bank' => '\mx\wire4\client\model\Institution',
'beneficiary_name' => 'string',
'cep' => '\mx\wire4\client\model\MessageCEP',
'clave_rastreo' => 'string',
'concept' => 'string',
'confirm_date' => '\DateTime',
'currency_code' => 'string',
'detention_message' => 'string',
'error_message' => 'string',
'monex_description' => 'string',
'order_id' => 'string',
'payment_order_id' => 'int',
'pending_reason' => 'string',
'reference' => 'int',
'status_code' => 'string',
'transaction_id' => 'int'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'account' => null,
'amount' => null,
'beneficiary_account' => null,
'beneficiary_bank' => null,
'beneficiary_name' => null,
'cep' => null,
'clave_rastreo' => null,
'concept' => null,
'confirm_date' => 'date-time',
'currency_code' => null,
'detention_message' => null,
'error_message' => null,
'monex_description' => null,
'order_id' => null,
'payment_order_id' => null,
'pending_reason' => null,
'reference' => null,
'status_code' => null,
'transaction_id' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'account' => 'account',
'amount' => 'amount',
'beneficiary_account' => 'beneficiary_account',
'beneficiary_bank' => 'beneficiary_bank',
'beneficiary_name' => 'beneficiary_name',
'cep' => 'cep',
'clave_rastreo' => 'clave_rastreo',
'concept' => 'concept',
'confirm_date' => 'confirm_date',
'currency_code' => 'currency_code',
'detention_message' => 'detention_message',
'error_message' => 'error_message',
'monex_description' => 'monex_description',
'order_id' => 'order_id',
'payment_order_id' => 'payment_order_id',
'pending_reason' => 'pending_reason',
'reference' => 'reference',
'status_code' => 'status_code',
'transaction_id' => 'transaction_id'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account' => 'setAccount',
'amount' => 'setAmount',
'beneficiary_account' => 'setBeneficiaryAccount',
'beneficiary_bank' => 'setBeneficiaryBank',
'beneficiary_name' => 'setBeneficiaryName',
'cep' => 'setCep',
'clave_rastreo' => 'setClaveRastreo',
'concept' => 'setConcept',
'confirm_date' => 'setConfirmDate',
'currency_code' => 'setCurrencyCode',
'detention_message' => 'setDetentionMessage',
'error_message' => 'setErrorMessage',
'monex_description' => 'setMonexDescription',
'order_id' => 'setOrderId',
'payment_order_id' => 'setPaymentOrderId',
'pending_reason' => 'setPendingReason',
'reference' => 'setReference',
'status_code' => 'setStatusCode',
'transaction_id' => 'setTransactionId'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account' => 'getAccount',
'amount' => 'getAmount',
'beneficiary_account' => 'getBeneficiaryAccount',
'beneficiary_bank' => 'getBeneficiaryBank',
'beneficiary_name' => 'getBeneficiaryName',
'cep' => 'getCep',
'clave_rastreo' => 'getClaveRastreo',
'concept' => 'getConcept',
'confirm_date' => 'getConfirmDate',
'currency_code' => 'getCurrencyCode',
'detention_message' => 'getDetentionMessage',
'error_message' => 'getErrorMessage',
'monex_description' => 'getMonexDescription',
'order_id' => 'getOrderId',
'payment_order_id' => 'getPaymentOrderId',
'pending_reason' => 'getPendingReason',
'reference' => 'getReference',
'status_code' => 'getStatusCode',
'transaction_id' => 'getTransactionId'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['account'] = isset($data['account']) ? $data['account'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['beneficiary_account'] = isset($data['beneficiary_account']) ? $data['beneficiary_account'] : null;
        $this->container['beneficiary_bank'] = isset($data['beneficiary_bank']) ? $data['beneficiary_bank'] : null;
        $this->container['beneficiary_name'] = isset($data['beneficiary_name']) ? $data['beneficiary_name'] : null;
        $this->container['cep'] = isset($data['cep']) ? $data['cep'] : null;
        $this->container['clave_rastreo'] = isset($data['clave_rastreo']) ? $data['clave_rastreo'] : null;
        $this->container['concept'] = isset($data['concept']) ? $data['concept'] : null;
        $this->container['confirm_date'] = isset($data['confirm_date']) ? $data['confirm_date'] : null;
        $this->container['currency_code'] = isset($data['currency_code']) ? $data['currency_code'] : null;
        $this->container['detention_message'] = isset($data['detention_message']) ? $data['detention_message'] : null;
        $this->container['error_message'] = isset($data['error_message']) ? $data['error_message'] : null;
        $this->container['monex_description'] = isset($data['monex_description']) ? $data['monex_description'] : null;
        $this->container['order_id'] = isset($data['order_id']) ? $data['order_id'] : null;
        $this->container['payment_order_id'] = isset($data['payment_order_id']) ? $data['payment_order_id'] : null;
        $this->container['pending_reason'] = isset($data['pending_reason']) ? $data['pending_reason'] : null;
        $this->container['reference'] = isset($data['reference']) ? $data['reference'] : null;
        $this->container['status_code'] = isset($data['status_code']) ? $data['status_code'] : null;
        $this->container['transaction_id'] = isset($data['transaction_id']) ? $data['transaction_id'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->container['account'];
    }

    /**
     * Sets account
     *
     * @param string $account Es la uenta emisora.
     *
     * @return $this
     */
    public function setAccount($account)
    {
        $this->container['account'] = $account;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount Es el monto de la transferencia.
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets beneficiary_account
     *
     * @return string
     */
    public function getBeneficiaryAccount()
    {
        return $this->container['beneficiary_account'];
    }

    /**
     * Sets beneficiary_account
     *
     * @param string $beneficiary_account Es la cuenta del beneficiario.
     *
     * @return $this
     */
    public function setBeneficiaryAccount($beneficiary_account)
    {
        $this->container['beneficiary_account'] = $beneficiary_account;

        return $this;
    }

    /**
     * Gets beneficiary_bank
     *
     * @return \mx\wire4\client\model\Institution
     */
    public function getBeneficiaryBank()
    {
        return $this->container['beneficiary_bank'];
    }

    /**
     * Sets beneficiary_bank
     *
     * @param \mx\wire4\client\model\Institution $beneficiary_bank beneficiary_bank
     *
     * @return $this
     */
    public function setBeneficiaryBank($beneficiary_bank)
    {
        $this->container['beneficiary_bank'] = $beneficiary_bank;

        return $this;
    }

    /**
     * Gets beneficiary_name
     *
     * @return string
     */
    public function getBeneficiaryName()
    {
        return $this->container['beneficiary_name'];
    }

    /**
     * Sets beneficiary_name
     *
     * @param string $beneficiary_name Es el nombre del Beneficiario.
     *
     * @return $this
     */
    public function setBeneficiaryName($beneficiary_name)
    {
        $this->container['beneficiary_name'] = $beneficiary_name;

        return $this;
    }

    /**
     * Gets cep
     *
     * @return \mx\wire4\client\model\MessageCEP
     */
    public function getCep()
    {
        return $this->container['cep'];
    }

    /**
     * Sets cep
     *
     * @param \mx\wire4\client\model\MessageCEP $cep cep
     *
     * @return $this
     */
    public function setCep($cep)
    {
        $this->container['cep'] = $cep;

        return $this;
    }

    /**
     * Gets clave_rastreo
     *
     * @return string
     */
    public function getClaveRastreo()
    {
        return $this->container['clave_rastreo'];
    }

    /**
     * Sets clave_rastreo
     *
     * @param string $clave_rastreo Es la clave de rastreo de la transferencia.
     *
     * @return $this
     */
    public function setClaveRastreo($clave_rastreo)
    {
        $this->container['clave_rastreo'] = $clave_rastreo;

        return $this;
    }

    /**
     * Gets concept
     *
     * @return string
     */
    public function getConcept()
    {
        return $this->container['concept'];
    }

    /**
     * Sets concept
     *
     * @param string $concept Es el concepto de pago.
     *
     * @return $this
     */
    public function setConcept($concept)
    {
        $this->container['concept'] = $concept;

        return $this;
    }

    /**
     * Gets confirm_date
     *
     * @return \DateTime
     */
    public function getConfirmDate()
    {
        return $this->container['confirm_date'];
    }

    /**
     * Sets confirm_date
     *
     * @param \DateTime $confirm_date Es la fecha de aplicación de la transferencia. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: <strong>2020-10-27T11:03:15.000-06:00</strong>.
     *
     * @return $this
     */
    public function setConfirmDate($confirm_date)
    {
        $this->container['confirm_date'] = $confirm_date;

        return $this;
    }

    /**
     * Gets currency_code
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->container['currency_code'];
    }

    /**
     * Sets currency_code
     *
     * @param string $currency_code Es el código de divisa de la transferencia. Es en el formato estándar de 3 dígitos. Ejemplo del peso mexicano: <b>MXP</b>, ejemplo del dólar estadounidense: <b>USD</b>.
     *
     * @return $this
     */
    public function setCurrencyCode($currency_code)
    {
        $this->container['currency_code'] = $currency_code;

        return $this;
    }

    /**
     * Gets detention_message
     *
     * @return string
     */
    public function getDetentionMessage()
    {
        return $this->container['detention_message'];
    }

    /**
     * Sets detention_message
     *
     * @param string $detention_message Es el mensaje proporcionado por Monex para la transferencia.
     *
     * @return $this
     */
    public function setDetentionMessage($detention_message)
    {
        $this->container['detention_message'] = $detention_message;

        return $this;
    }

    /**
     * Gets error_message
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->container['error_message'];
    }

    /**
     * Sets error_message
     *
     * @param string $error_message Es el mensaje de error, en caso de algún error se informará aquí.
     *
     * @return $this
     */
    public function setErrorMessage($error_message)
    {
        $this->container['error_message'] = $error_message;

        return $this;
    }

    /**
     * Gets monex_description
     *
     * @return string
     */
    public function getMonexDescription()
    {
        return $this->container['monex_description'];
    }

    /**
     * Sets monex_description
     *
     * @param string $monex_description Es la descripción de Monex.
     *
     * @return $this
     */
    public function setMonexDescription($monex_description)
    {
        $this->container['monex_description'] = $monex_description;

        return $this;
    }

    /**
     * Gets order_id
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->container['order_id'];
    }

    /**
     * Sets order_id
     *
     * @param string $order_id Es el identificador asignado por la aplciación a la transferencia.
     *
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->container['order_id'] = $order_id;

        return $this;
    }

    /**
     * Gets payment_order_id
     *
     * @return int
     */
    public function getPaymentOrderId()
    {
        return $this->container['payment_order_id'];
    }

    /**
     * Sets payment_order_id
     *
     * @param int $payment_order_id Es el identificador de la orden de pago en Monex.
     *
     * @return $this
     */
    public function setPaymentOrderId($payment_order_id)
    {
        $this->container['payment_order_id'] = $payment_order_id;

        return $this;
    }

    /**
     * Gets pending_reason
     *
     * @return string
     */
    public function getPendingReason()
    {
        return $this->container['pending_reason'];
    }

    /**
     * Sets pending_reason
     *
     * @param string $pending_reason Es la razón de porque esta pendiente aún cuando se autorizó la transferencia.
     *
     * @return $this
     */
    public function setPendingReason($pending_reason)
    {
        $this->container['pending_reason'] = $pending_reason;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return int
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param int $reference Es la referencia numérica.
     *
     * @return $this
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets status_code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->container['status_code'];
    }

    /**
     * Sets status_code
     *
     * @param string $status_code Es el estado de la transferencia de la transferencia, los posibles valores son: <b>PENDING, COMPLETED, FAILED, CANCELLED</b>
     *
     * @return $this
     */
    public function setStatusCode($status_code)
    {
        $this->container['status_code'] = $status_code;

        return $this;
    }

    /**
     * Gets transaction_id
     *
     * @return int
     */
    public function getTransactionId()
    {
        return $this->container['transaction_id'];
    }

    /**
     * Sets transaction_id
     *
     * @param int $transaction_id Es el identificador de la transferencia asignado por Monex.
     *
     * @return $this
     */
    public function setTransactionId($transaction_id)
    {
        $this->container['transaction_id'] = $transaction_id;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
