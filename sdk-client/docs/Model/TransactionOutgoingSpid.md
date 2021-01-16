# TransactionOutgoingSpid

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount** | **float** | Es el monto de la transferencia. Se valida que sean máximo 20 dígitos y 2 decimales. Ejemplo 1000.00 | 
**beneficiary_account** | **string** | Cuenta del beneficiario, podría ser un número celular (10dígitos), tarjeta de débito (TDD) o Cuenta CLABE interbancaria (18 dígitos). | 
**cancel_return_url** | **string** | Es la dirección URL a la que se redirigirá en caso de que el usario cancele el registro. | 
**classification_id** | **string** | Es el identificador de la clasificación de la transferencia SPID. | 
**currency_code** | **string** | Código de moneda en la que opera la cuenta. | 
**email** | **string[]** | Lista de correo electrónico (email) del beneficiario. Este campo es opcional. | [optional] 
**numeric_reference_spid** | **int** | Es la referencia numérica de la transferencia. | 
**order_id** | **string** | Es la referencia de la transferencia asignada por el cliente. Ejemplo: dae9c6ae-8c7a-42e8-99f4-ebe90566efae | 
**payment_concept_spid** | **string** | Es el concepto de la transferencia. | 
**return_url** | **string** | Es la dirección URL a la que se redirigirá en caso de éxito. | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

