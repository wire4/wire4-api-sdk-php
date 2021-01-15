# CepResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**account_beneficiary** | **string** | Es la cuenta del beneficiario. | [optional] 
**account_sender** | **string** | Es la cuenta del ordenante. | [optional] 
**amount** | **float** | Es el monto de la transferencia. | [optional] 
**available** | **bool** | Indica si el CEP se encuentra disponible o no. | [optional] 
**beneficiary_bank_key** | **string** | Es la clave del banco beneficiario el cual se puede obtener del recurso de las &lt;a href&#x3D;\&quot;#operation/getAllInstitutionsUsingGET\&quot;&gt;instituciones.&lt;/a&gt; | [optional] 
**beneficiary_name** | **string** | Nombre del beneficiario. | [optional] 
**beneficiary_rfc** | **string** | Es el Registro Federal de Contribuyentes (RFC) del beneficiario. | [optional] 
**cadena_original** | **string** | Cadena original del CEP. | [optional] 
**capture_date** | [**\DateTime**](\DateTime.md) | Es la fecha de captura de la transferencia. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: &lt;strong&gt;2020-10-27T11:03:15.000-06:00&lt;/strong&gt;. | [optional] 
**certificate_serial_number** | **string** | Número de serie del certificado. | [optional] 
**clave_rastreo** | **string** | Es la clave de rastreo. | [optional] 
**description** | **string** | Es la descripción de la transferencia. | [optional] 
**iva** | **float** | IVA de la transferencia. | [optional] 
**operation_date** | [**\DateTime**](\DateTime.md) | Es la fecha de operación de la transferencia. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: &lt;strong&gt;2020-10-27T11:03:15.000-06:00&lt;/strong&gt;. | [optional] 
**operation_date_cep** | [**\DateTime**](\DateTime.md) | Es la fecha de abono registrada en el CEP.  Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: &lt;strong&gt;2020-10-27T11:03:15.000-06:00&lt;/strong&gt;. | [optional] 
**reference** | **string** | Es la referencia numérica de la transferencia. | [optional] 
**sender_bank_key** | **string** | Es la clave del banco emisor el cual se puede obtener del recurso de las &lt;a href&#x3D;\&quot;#operation/getAllInstitutionsUsingGET\&quot;&gt;instituciones.&lt;/a&gt; | [optional] 
**sender_name** | **string** | Es el nombre del emisor. | [optional] 
**sender_rfc** | **string** | Es el Registro Federal de Contribuyentes (RFC) del emisor. | [optional] 
**signature** | **string** | Firma del CEP.. | [optional] 
**url_zip** | **string** | La url al archivo zip del CEP, el cual contiene el xml y pdf | [optional] 

[[Back to Model list]](../../README.md#documentation-for-models) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to README]](../../README.md)

