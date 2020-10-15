# TransactionOutgoing

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Monto de la transferencia | 
**beneficiary** | [**\mx\wire4\client\model\Account**](Account.md) |  | [optional] 
**beneficiary_account** | **string** | Cuenta del beneficiario, podría ser un número celular, TDD o Cuenta CLABE interbancaria | 
**beneficiary_bank_key** | **string** | La clave del banco beneficiario, proprocionada por BANXICO, este campo solo es obligatario cuando la cuenta beneficiaria es un número celular (*). | [optional] 
**concept** | **string** | Concepto de la transferencia | 
**currency_code** | **string** | Código de moneda en la que opera la cuenta | 
**email** | **string[]** | Lista de email del beneficiario,es opcional | [optional] 
**order_id** | **string** | Referencia de la transferencia asignada por el cliente | 
**reference** | **int** | Referencia numérica de la transferencia | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

