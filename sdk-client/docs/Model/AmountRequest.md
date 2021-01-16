# AmountRequest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount_limit** | **float** | Es el nuevo monto límite que reemplazará al actual, un monto de 0.0 implica que no hay límite. | 
**cancel_return_url** | **string** | Es la dirección URL a la que se redirigirá en caso de que el cliente cancele el registro. Se valida hasta 512 caracteres. | 
**currency_code** | **string** | Es el código de divisa de la cuenta. Es en el formato estándar de 3 dígitos, por ejemplo para el peso mexicano: &lt;b&gt;MXP&lt;/b&gt;, para el dólar estadounidense: &lt;b&gt;USD&lt;/b&gt;. | 
**previous_amount_limit** | **float** | Es el monto límite registrado actualmente, un monto de 0.0 implica que no hay límite. | 
**return_url** | **string** | Es la dirección URL a la que se redirigirá en caso de éxito. Se valida hasta 512 caracteres. | 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

