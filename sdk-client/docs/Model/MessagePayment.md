# MessagePayment

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account** | **string** | Es la cuenta del ordenante. | [optional] 
**amount** | **float** | Es el monto de la transferencia. | [optional] 
**beneficiary_account** | **string** | Es la cuenta del beneficiario. | [optional] 
**beneficiary_bank** | [**\mx\wire4\client\model\MessageInstitution**](MessageInstitution.md) |  | [optional] 
**beneficiary_name** | **string** | Es el nombre del beneficiario. | [optional] 
**cep** | [**\mx\wire4\client\model\MessageCEP**](MessageCEP.md) |  | [optional] 
**clave_rastreo** | **string** | Es la clave de rastreo de la transferencia. | [optional] 
**concept** | **string** | Es el concepto de la transferencia de salida. | [optional] 
**confirm_date** | [**\DateTime**](\DateTime.md) | Es la fecha de confirmación de la transferencia de salida. | [optional] 
**currency_code** | **string** | Código de divisa de la transferencia de salida. Es en el formato estándar ISO 4217 y es de 3 dígitos. Ejemplo: \&quot;MXN\&quot;. | [optional] 
**detention_message** | **string** | Es el mensaje de detención de Monex de la transferencia de salida. | [optional] 
**error_message** | **string** | Mensaje de error. | [optional] 
**monex_description** | **string** | La descripción de Monex de la transferencia de salida. | [optional] 
**order_id** | **string** | Es el identificador de la transferencia de salida. | [optional] 
**payment_order_id** | **int** | Es el identificador de la orden de pago de Monex de la transferencia de salida. | [optional] 
**pending_reason** | **string** | Es la razón de porque está pendiente aún cuando se autorizó la transferencia. | [optional] 
**reference** | **int** | Es la referecia de la transferencia. | [optional] 
**request_id** | **string** | El identificador en esta API de la petición de envío de la transferencia de salida. | [optional] 
**status_code** | **string** | Es el estado de la transferencia de salida. | [optional] 
**transaction_id** | **int** | Es el identificador de Monex de la transferencia de salida. | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

