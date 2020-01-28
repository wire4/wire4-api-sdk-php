# Payment

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account** | **string** | Cuenta emisora | [optional] 
**amount** | **float** | Monto de la transferencia | [optional] 
**beneficiary_account** | **string** | Cuenta del beneficiario | [optional] 
**beneficiary_bank** | [**\mx\wire4\client\model\Institution**](Institution.md) |  | [optional] 
**beneficiary_name** | **string** | Nombre del Beneficiario | [optional] 
**cep** | [**\mx\wire4\client\model\MessageCEP**](MessageCEP.md) |  | [optional] 
**clave_rastreo** | **string** | Clave de rastreo de la transferencia | [optional] 
**concept** | **string** | Concepto de pago | [optional] 
**confirm_date** | [**\DateTime**](\DateTime.md) | Fecha de aplicación de la transferencia | [optional] 
**currency_code** | **string** | Código de moneda de la transferencia | [optional] 
**detention_message** | **string** | Mensaje proporcionado por Monex para la transferencia | [optional] 
**monex_description** | **string** | Descripción | [optional] 
**order_id** | **string** | Identificador asignado por la aplciación a la transferencia | [optional] 
**payment_order_id** | **int** | Identificador de la orden de pago en Monex | [optional] 
**reference** | **int** | Referencia numérica | [optional] 
**status_code** | **string** | Estado de la transferencia de la transferencia, los posibles valores son: PENDING, COMPLETED, FAILED, CANCELLED | [optional] 
**transaction_id** | **int** | Identificador de la transferencia asignado por Monex | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

