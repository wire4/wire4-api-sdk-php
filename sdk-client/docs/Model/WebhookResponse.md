# WebhookResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**events** | **string[]** | Tipos de eventos de los cuales Wire4 te enviará información. | [optional] 
**name** | **string** | Es el nombre del webhook. | [optional] 
**secret** | **string** | Llave con la cual se debe de identificar que el webhook fue enviado por Wire4, para mayor información revisar la guía de notificaciones (https://wire4.mx/#/guides/notificaciones),  en la sección de  &lt;a href&#x3D;\&quot;https://wire4.mx/#/guides/notificaciones\&quot;&gt;\&quot;Comprobación de firmas de Webhook\&quot;.&lt;/a&gt; | [optional] 
**status** | **string** | Es el estado (estatus) en el que se encuentra el webhook. | [optional] 
**url** | **string** | Es la dirección URL a la que Wire4 enviará las notificaciones cuando un evento ocurra. | [optional] 
**wh_uuid** | **string** | Es el identificador del webhook. Ejemplo: wh_54a832866f784b439bc625c0f4e04e12. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

