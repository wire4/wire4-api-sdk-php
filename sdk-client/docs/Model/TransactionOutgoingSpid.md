# TransactionOutgoingSpid

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Monto de la transferencia | 
**beneficiary_account** | **string** | Cuenta del beneficiario, podría ser un numero celular, TDD o Cuenta CLABE interbancaria | 
**cancel_return_url** | **string** | Url a la que se redirigirá en caso de error | 
**classification_id** | **string** | El identificador de la clasificación de la transferencia SPID | 
**currency_code** | **string** | Código de moneda en la que opera la cuenta | 
**email** | **string[]** | Lista de email del beneficiario,es opcional | [optional] 
**numeric_reference_spid** | **int** | Referencia numérica de la transferencia | 
**order_id** | **string** | Referencia de la transferencia asignada por el cliente | 
**payment_concept_spid** | **string** | Concepto de la transferencia | 
**return_url** | **string** | Url a la que se redirigirá en caso de exito | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

