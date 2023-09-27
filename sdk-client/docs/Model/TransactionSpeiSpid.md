# TransactionSpeiSpid

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Es el monto de la transferencia. Se valida que sean máximo 20 dígitos y 2 decimales. Ejemplo 1000.00 | 
**beneficiary_account** | **string** | Cuenta del beneficiario, podría ser un número celular (10dígitos), tarjeta de débito (TDD) o Cuenta CLABE interbancaria (18 dígitos). | 
**classification_id** | **string** | Es el identificador de la clasificación de la transferencia SPID. | 
**concept** | **string** | Es el concepto de la transferencia. | 
**currency_code** | **string** | Código de moneda en la que opera la cuenta. | [optional] 
**email** | **string[]** | Lista de correo electrónico (email) del beneficiario. Este campo es opcional. | [optional] 
**order_id** | **string** | Es la referencia de la transferencia asignada por el cliente. Ejemplo: dae9c6ae-8c7a-42e8-99f4-ebe90566efae | 
**reference** | **int** | Es la referencia numérica de la transferencia. | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

