<?php
/**
 * CepResponse
 *
 * PHP version 5
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Wire4RestAPI
 *
 * Referencia de API. La API de Wire4 está organizada en torno a REST
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.11
 */
/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace mx\wire4\client\model;

use \ArrayAccess;
use \mx\wire4\ObjectSerializer;

/**
 * CepResponse Class Doc Comment
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class CepResponse implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'CepResponse';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'account_beneficiary' => 'string',
'account_sender' => 'string',
'amount' => 'float',
'available' => 'bool',
'beneficiary_bank_key' => 'string',
'beneficiary_name' => 'string',
'beneficiary_rfc' => 'string',
'cadena_original' => 'string',
'capture_date' => '\DateTime',
'certificate_serial_number' => 'string',
'clave_rastreo' => 'string',
'description' => 'string',
'iva' => 'float',
'operation_date' => '\DateTime',
'operation_date_cep' => '\DateTime',
'reference' => 'string',
'sender_bank_key' => 'string',
'sender_name' => 'string',
'sender_rfc' => 'string',
'signature' => 'string',
'url_zip' => 'string'    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'account_beneficiary' => null,
'account_sender' => null,
'amount' => null,
'available' => null,
'beneficiary_bank_key' => null,
'beneficiary_name' => null,
'beneficiary_rfc' => null,
'cadena_original' => null,
'capture_date' => 'date-time',
'certificate_serial_number' => null,
'clave_rastreo' => null,
'description' => null,
'iva' => null,
'operation_date' => 'date-time',
'operation_date_cep' => 'date-time',
'reference' => null,
'sender_bank_key' => null,
'sender_name' => null,
'sender_rfc' => null,
'signature' => null,
'url_zip' => null    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'account_beneficiary' => 'account_beneficiary',
'account_sender' => 'account_sender',
'amount' => 'amount',
'available' => 'available',
'beneficiary_bank_key' => 'beneficiary_bank_key',
'beneficiary_name' => 'beneficiary_name',
'beneficiary_rfc' => 'beneficiary_rfc',
'cadena_original' => 'cadena_original',
'capture_date' => 'capture_date',
'certificate_serial_number' => 'certificate_serial_number',
'clave_rastreo' => 'clave_rastreo',
'description' => 'description',
'iva' => 'iva',
'operation_date' => 'operation_date',
'operation_date_cep' => 'operation_date_cep',
'reference' => 'reference',
'sender_bank_key' => 'sender_bank_key',
'sender_name' => 'sender_name',
'sender_rfc' => 'sender_rfc',
'signature' => 'signature',
'url_zip' => 'url_zip'    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account_beneficiary' => 'setAccountBeneficiary',
'account_sender' => 'setAccountSender',
'amount' => 'setAmount',
'available' => 'setAvailable',
'beneficiary_bank_key' => 'setBeneficiaryBankKey',
'beneficiary_name' => 'setBeneficiaryName',
'beneficiary_rfc' => 'setBeneficiaryRfc',
'cadena_original' => 'setCadenaOriginal',
'capture_date' => 'setCaptureDate',
'certificate_serial_number' => 'setCertificateSerialNumber',
'clave_rastreo' => 'setClaveRastreo',
'description' => 'setDescription',
'iva' => 'setIva',
'operation_date' => 'setOperationDate',
'operation_date_cep' => 'setOperationDateCep',
'reference' => 'setReference',
'sender_bank_key' => 'setSenderBankKey',
'sender_name' => 'setSenderName',
'sender_rfc' => 'setSenderRfc',
'signature' => 'setSignature',
'url_zip' => 'setUrlZip'    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account_beneficiary' => 'getAccountBeneficiary',
'account_sender' => 'getAccountSender',
'amount' => 'getAmount',
'available' => 'getAvailable',
'beneficiary_bank_key' => 'getBeneficiaryBankKey',
'beneficiary_name' => 'getBeneficiaryName',
'beneficiary_rfc' => 'getBeneficiaryRfc',
'cadena_original' => 'getCadenaOriginal',
'capture_date' => 'getCaptureDate',
'certificate_serial_number' => 'getCertificateSerialNumber',
'clave_rastreo' => 'getClaveRastreo',
'description' => 'getDescription',
'iva' => 'getIva',
'operation_date' => 'getOperationDate',
'operation_date_cep' => 'getOperationDateCep',
'reference' => 'getReference',
'sender_bank_key' => 'getSenderBankKey',
'sender_name' => 'getSenderName',
'sender_rfc' => 'getSenderRfc',
'signature' => 'getSignature',
'url_zip' => 'getUrlZip'    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['account_beneficiary'] = isset($data['account_beneficiary']) ? $data['account_beneficiary'] : null;
        $this->container['account_sender'] = isset($data['account_sender']) ? $data['account_sender'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['available'] = isset($data['available']) ? $data['available'] : null;
        $this->container['beneficiary_bank_key'] = isset($data['beneficiary_bank_key']) ? $data['beneficiary_bank_key'] : null;
        $this->container['beneficiary_name'] = isset($data['beneficiary_name']) ? $data['beneficiary_name'] : null;
        $this->container['beneficiary_rfc'] = isset($data['beneficiary_rfc']) ? $data['beneficiary_rfc'] : null;
        $this->container['cadena_original'] = isset($data['cadena_original']) ? $data['cadena_original'] : null;
        $this->container['capture_date'] = isset($data['capture_date']) ? $data['capture_date'] : null;
        $this->container['certificate_serial_number'] = isset($data['certificate_serial_number']) ? $data['certificate_serial_number'] : null;
        $this->container['clave_rastreo'] = isset($data['clave_rastreo']) ? $data['clave_rastreo'] : null;
        $this->container['description'] = isset($data['description']) ? $data['description'] : null;
        $this->container['iva'] = isset($data['iva']) ? $data['iva'] : null;
        $this->container['operation_date'] = isset($data['operation_date']) ? $data['operation_date'] : null;
        $this->container['operation_date_cep'] = isset($data['operation_date_cep']) ? $data['operation_date_cep'] : null;
        $this->container['reference'] = isset($data['reference']) ? $data['reference'] : null;
        $this->container['sender_bank_key'] = isset($data['sender_bank_key']) ? $data['sender_bank_key'] : null;
        $this->container['sender_name'] = isset($data['sender_name']) ? $data['sender_name'] : null;
        $this->container['sender_rfc'] = isset($data['sender_rfc']) ? $data['sender_rfc'] : null;
        $this->container['signature'] = isset($data['signature']) ? $data['signature'] : null;
        $this->container['url_zip'] = isset($data['url_zip']) ? $data['url_zip'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets account_beneficiary
     *
     * @return string
     */
    public function getAccountBeneficiary()
    {
        return $this->container['account_beneficiary'];
    }

    /**
     * Sets account_beneficiary
     *
     * @param string $account_beneficiary Es la cuenta del beneficiario.
     *
     * @return $this
     */
    public function setAccountBeneficiary($account_beneficiary)
    {
        $this->container['account_beneficiary'] = $account_beneficiary;

        return $this;
    }

    /**
     * Gets account_sender
     *
     * @return string
     */
    public function getAccountSender()
    {
        return $this->container['account_sender'];
    }

    /**
     * Sets account_sender
     *
     * @param string $account_sender Es la cuenta del ordenante.
     *
     * @return $this
     */
    public function setAccountSender($account_sender)
    {
        $this->container['account_sender'] = $account_sender;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount Es el monto de la transferencia.
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets available
     *
     * @return bool
     */
    public function getAvailable()
    {
        return $this->container['available'];
    }

    /**
     * Sets available
     *
     * @param bool $available Indica si el CEP se encuentra disponible o no.
     *
     * @return $this
     */
    public function setAvailable($available)
    {
        $this->container['available'] = $available;

        return $this;
    }

    /**
     * Gets beneficiary_bank_key
     *
     * @return string
     */
    public function getBeneficiaryBankKey()
    {
        return $this->container['beneficiary_bank_key'];
    }

    /**
     * Sets beneficiary_bank_key
     *
     * @param string $beneficiary_bank_key Es la clave del banco beneficiario el cual se puede obtener del recurso de las <a href=\"#operation/getAllInstitutionsUsingGET\">instituciones.</a>
     *
     * @return $this
     */
    public function setBeneficiaryBankKey($beneficiary_bank_key)
    {
        $this->container['beneficiary_bank_key'] = $beneficiary_bank_key;

        return $this;
    }

    /**
     * Gets beneficiary_name
     *
     * @return string
     */
    public function getBeneficiaryName()
    {
        return $this->container['beneficiary_name'];
    }

    /**
     * Sets beneficiary_name
     *
     * @param string $beneficiary_name Nombre del beneficiario.
     *
     * @return $this
     */
    public function setBeneficiaryName($beneficiary_name)
    {
        $this->container['beneficiary_name'] = $beneficiary_name;

        return $this;
    }

    /**
     * Gets beneficiary_rfc
     *
     * @return string
     */
    public function getBeneficiaryRfc()
    {
        return $this->container['beneficiary_rfc'];
    }

    /**
     * Sets beneficiary_rfc
     *
     * @param string $beneficiary_rfc Es el Registro Federal de Contribuyentes (RFC) del beneficiario.
     *
     * @return $this
     */
    public function setBeneficiaryRfc($beneficiary_rfc)
    {
        $this->container['beneficiary_rfc'] = $beneficiary_rfc;

        return $this;
    }

    /**
     * Gets cadena_original
     *
     * @return string
     */
    public function getCadenaOriginal()
    {
        return $this->container['cadena_original'];
    }

    /**
     * Sets cadena_original
     *
     * @param string $cadena_original Cadena original del CEP.
     *
     * @return $this
     */
    public function setCadenaOriginal($cadena_original)
    {
        $this->container['cadena_original'] = $cadena_original;

        return $this;
    }

    /**
     * Gets capture_date
     *
     * @return \DateTime
     */
    public function getCaptureDate()
    {
        return $this->container['capture_date'];
    }

    /**
     * Sets capture_date
     *
     * @param \DateTime $capture_date Es la fecha de captura de la transferencia. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: <strong>2020-10-27T11:03:15.000-06:00</strong>.
     *
     * @return $this
     */
    public function setCaptureDate($capture_date)
    {
        $this->container['capture_date'] = $capture_date;

        return $this;
    }

    /**
     * Gets certificate_serial_number
     *
     * @return string
     */
    public function getCertificateSerialNumber()
    {
        return $this->container['certificate_serial_number'];
    }

    /**
     * Sets certificate_serial_number
     *
     * @param string $certificate_serial_number Número de serie del certificado.
     *
     * @return $this
     */
    public function setCertificateSerialNumber($certificate_serial_number)
    {
        $this->container['certificate_serial_number'] = $certificate_serial_number;

        return $this;
    }

    /**
     * Gets clave_rastreo
     *
     * @return string
     */
    public function getClaveRastreo()
    {
        return $this->container['clave_rastreo'];
    }

    /**
     * Sets clave_rastreo
     *
     * @param string $clave_rastreo Es la clave de rastreo.
     *
     * @return $this
     */
    public function setClaveRastreo($clave_rastreo)
    {
        $this->container['clave_rastreo'] = $clave_rastreo;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string $description Es la descripción de la transferencia.
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets iva
     *
     * @return float
     */
    public function getIva()
    {
        return $this->container['iva'];
    }

    /**
     * Sets iva
     *
     * @param float $iva IVA de la transferencia.
     *
     * @return $this
     */
    public function setIva($iva)
    {
        $this->container['iva'] = $iva;

        return $this;
    }

    /**
     * Gets operation_date
     *
     * @return \DateTime
     */
    public function getOperationDate()
    {
        return $this->container['operation_date'];
    }

    /**
     * Sets operation_date
     *
     * @param \DateTime $operation_date Es la fecha de operación de la transferencia. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: <strong>2020-10-27T11:03:15.000-06:00</strong>.
     *
     * @return $this
     */
    public function setOperationDate($operation_date)
    {
        $this->container['operation_date'] = $operation_date;

        return $this;
    }

    /**
     * Gets operation_date_cep
     *
     * @return \DateTime
     */
    public function getOperationDateCep()
    {
        return $this->container['operation_date_cep'];
    }

    /**
     * Sets operation_date_cep
     *
     * @param \DateTime $operation_date_cep Es la fecha de abono registrada en el CEP.  Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: <strong>2020-10-27T11:03:15.000-06:00</strong>.
     *
     * @return $this
     */
    public function setOperationDateCep($operation_date_cep)
    {
        $this->container['operation_date_cep'] = $operation_date_cep;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param string $reference Es la referencia numérica de la transferencia.
     *
     * @return $this
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets sender_bank_key
     *
     * @return string
     */
    public function getSenderBankKey()
    {
        return $this->container['sender_bank_key'];
    }

    /**
     * Sets sender_bank_key
     *
     * @param string $sender_bank_key Es la clave del banco emisor el cual se puede obtener del recurso de las <a href=\"#operation/getAllInstitutionsUsingGET\">instituciones.</a>
     *
     * @return $this
     */
    public function setSenderBankKey($sender_bank_key)
    {
        $this->container['sender_bank_key'] = $sender_bank_key;

        return $this;
    }

    /**
     * Gets sender_name
     *
     * @return string
     */
    public function getSenderName()
    {
        return $this->container['sender_name'];
    }

    /**
     * Sets sender_name
     *
     * @param string $sender_name Es el nombre del emisor.
     *
     * @return $this
     */
    public function setSenderName($sender_name)
    {
        $this->container['sender_name'] = $sender_name;

        return $this;
    }

    /**
     * Gets sender_rfc
     *
     * @return string
     */
    public function getSenderRfc()
    {
        return $this->container['sender_rfc'];
    }

    /**
     * Sets sender_rfc
     *
     * @param string $sender_rfc Es el Registro Federal de Contribuyentes (RFC) del emisor.
     *
     * @return $this
     */
    public function setSenderRfc($sender_rfc)
    {
        $this->container['sender_rfc'] = $sender_rfc;

        return $this;
    }

    /**
     * Gets signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->container['signature'];
    }

    /**
     * Sets signature
     *
     * @param string $signature Firma del CEP..
     *
     * @return $this
     */
    public function setSignature($signature)
    {
        $this->container['signature'] = $signature;

        return $this;
    }

    /**
     * Gets url_zip
     *
     * @return string
     */
    public function getUrlZip()
    {
        return $this->container['url_zip'];
    }

    /**
     * Sets url_zip
     *
     * @param string $url_zip La url al archivo zip del CEP, el cual contiene el xml y pdf
     *
     * @return $this
     */
    public function setUrlZip($url_zip)
    {
        $this->container['url_zip'] = $url_zip;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
