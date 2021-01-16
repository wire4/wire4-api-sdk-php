# SpidBeneficiaryResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**amount_limit** | **float** | Monto límite permitido para la cuenta. Ejemplo: 1000.00 | 
**bank** | [**\mx\wire4\client\model\Institution**](Institution.md) |  | [optional] 
**beneficiary_account** | **string** | Cuenta del beneficiario debe ser una cuenta CLABE. Ejemplo: 032180000118359719. | 
**email** | **string[]** | Lista de correos electrónicos (emails), este dato es opcional. | [optional] 
**institution** | [**\mx\wire4\client\model\BeneficiaryInstitution**](BeneficiaryInstitution.md) |  | 
**kind_of_relationship** | **string** | Es el tipo de relación que se tiene con el propietario de la cuenta. Para registrar una cuenta, este valor se debe obtener del recurso &lt;a href&#x3D;\&quot;#operation/getAvailableRelationshipsMonexUsingGET\&quot;&gt; relationships.&lt;/a&gt; &lt;br /&gt;&lt;br /&gt;&lt;b&gt;Nota:&lt;/b&gt; &lt;em&gt;Si en la respuesta de Monex esta propiedad es nula, tampoco estará presente en esta respuesta.&lt;/em&gt; | 
**numeric_reference_spid** | **string** | Referencia numérica. | [optional] 
**payment_concept_spid** | **string** | Concepto de pago. | [optional] 
**register_date** | [**\DateTime**](\DateTime.md) | La fecha en la que se registro el beneficiario. | [optional] 
**relationship** | **string** | Es la relación con el propietario de la cuenta, para registrar este valor se debe obtener del recurso &lt;a href&#x3D;\&quot;#operation/getAvailableRelationshipsMonexUsingGET\&quot;&gt;relationships.&lt;/a&gt; &lt;br/&gt; &lt;br/&gt; &lt;b&gt;Nota:&lt;/b&gt; Si en la respuesta de Monex, sta propiedad es nula, tampoco estará presente en esta respuesta. | 
**rfc** | **string** | Es el Registro federal de contribuyentes (RFC) de la persona o institución propietaria de la cuenta. &lt;br/&gt; &lt;br/&gt;&lt;b&gt;Nota:&lt;/b&gt; Se valida el formato de RFC. | [optional] 
**status** | **string** | El estado en el que se encuentra el registo del beneficiario.&lt;br&gt;&lt;br&gt; Los valores pueden ser: &lt;b&gt;\&quot;RECEIVED\&quot;, \&quot;DELETED\&quot;, \&quot;REQUEST_ERROR_BY_MONEX\&quot;, \&quot;REQUESTED_TO_MONEX\&quot;, \&quot;NOTIFIED_BY_MONEX\&quot;, \&quot;NOTIFIED_BY_SPEIOK\&quot;, \&quot;NOTIFIED_WITH_ERROR_BY_SPEIOK\&quot; y \&quot;PENDING\&quot;&lt;/b&gt; | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

