# MessageWebHook

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**api_version** | **string** | La versión de la API | [optional] 
**created** | [**\DateTime**](\DateTime.md) | Fecha de creación del mensaje | [optional] 
**data** | **object** | Objeto que contiene la información del evento | [optional] 
**id** | **string** | El identificador del mensaje | [optional] 
**livemode** | **bool** | Indica si proviene de un entorno productivo | [optional] 
**object** | **string** | Tipo de objeto  que contiene el mensaje en el atributo data los posibles valores son: subscription, beneficiary, spei_outgoing, spei_incoming, spid_outgoing | [optional] 
**pending_webhooks** | **int** | Número de  mensajes pendientes de enviar | [optional] 
**request** | **string** | Identificador del recurso relacionado | [optional] 
**type** | **string** | El tipo evento que se esta enviando en la notifiación | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

