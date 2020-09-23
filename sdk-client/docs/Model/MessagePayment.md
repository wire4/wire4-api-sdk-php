# MessagePayment

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account** | **string** | Cuenta del ordenante | [optional] 
**amount** | **float** | Monto de la transferencia | [optional] 
**beneficiary_account** | **string** | Cuenta del beneficiario | [optional] 
**beneficiary_bank** | [**\mx\wire4\client\model\MessageInstitution**](MessageInstitution.md) |  | [optional] 
**beneficiary_name** | **string** | Nombre del beneficiario | [optional] 
**cep** | [**\mx\wire4\client\model\MessageCEP**](MessageCEP.md) |  | [optional] 
**clave_rastreo** | **string** | Clave de rastreo de la transferencia | [optional] 
**concept** | **string** | Concepto de la transferencia de salida | [optional] 
**confirm_date** | [**\DateTime**](\DateTime.md) | Fecha de confirmación de la transferencia de salida | [optional] 
**currency_code** | **string** | Código de la moneda de la transferencia de salida | [optional] 
**detention_message** | **string** | Mensaje de detención de Monex de la transferencia de salida | [optional] 
**error_message** | **string** | Mensaje de error | [optional] 
**monex_description** | **string** | La descripción de Monex de la transferencia de salida | [optional] 
**order_id** | **string** | El identificador de la transferencia de salida | [optional] 
**payment_order_id** | **int** | El identificador de la orden de pago de Monex de la transferencia de salida | [optional] 
**pending_reason** | **string** | Razón de porque está pendiente aún cuando se autorizó la transferencia | [optional] 
**reference** | **int** | Referecia de la transferencia | [optional] 
**request_id** | **string** | El identificador, en esta API, de la petición de envío de la transferencia de salida | [optional] 
**status_code** | **string** | El estado de la transferencia de salida | [optional] 
**transaction_id** | **int** | El identificador de Monex de la transferencia de salida | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

