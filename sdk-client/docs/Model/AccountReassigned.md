# AccountReassigned

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount_limit** | **float** | Monto límite permitido registrado para la cuenta | 
**bank** | [**\mx\wire4\client\model\Institution**](Institution.md) |  | [optional] 
**beneficiary_account** | **string** | Cuenta del beneficiario, podría ser teléfono celular, TDD o cuenta CLABE | 
**currency_code** | **string** | Código de moneda, este dato es opcional, al registrar una cuenta si no se cuenta con este valor se asignara MXP | [optional] 
**email** | **string[]** | Lista de email&#x27;s, este dato es opcional | [optional] 
**institution** | [**\mx\wire4\client\model\BeneficiaryInstitution**](BeneficiaryInstitution.md) |  | [optional] 
**kind_of_relationship** | **string** | Tipo de relación con el propietario de la cuenta, para registrar una cuenta este valor se debe obtener  del recurso relationships. &lt;br&gt; Nota: Si en la respuesta de Monex esta propiedad es nula, tampoco estará presente en esta respuesta. | 
**numeric_reference_spei** | **string** | Referencia numérica a utilizar cuando se realice una transferencia y no se especifique una referencia | [optional] 
**payment_concept_spei** | **string** | Concepto de pago a utilizar cuando se realice una transferencia y no se especifique un concepto | [optional] 
**person** | [**\mx\wire4\client\model\Person**](Person.md) |  | [optional] 
**register_date** | [**\DateTime**](\DateTime.md) | La fecha en la que se registro el beneficiario | [optional] 
**relationship** | **string** | Relación con el propietario de la cuenta, para registrar una cuenta este valor se debe obtener  del recurso relationships. &lt;br&gt; Nota: Si en la respuesta de Monex esta propiedad es nula, tampoco estará presente en esta respuesta. | 
**rfc** | **string** | Registro federal de contribuyentes de la persona o institución propietaria de la cuenta. &lt;br&gt; Nota: Si en la respuesta de Monex esta propiedad es nula, tampoco estará presente en esta respuesta. | 
**status** | **string** | El estado (status) en el que se encuentra el registro del beneficiario | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

