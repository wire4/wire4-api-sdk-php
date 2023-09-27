<?php
/**
 * Payment
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
 * Referencia de la API de Wire4
 *
 * OpenAPI spec version: 1.0.0
 * 
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 3.0.46
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
 * Payment Class Doc Comment
 *
 * @category Class
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class Payment implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Payment';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'account' => 'string',
        'amount' => 'float',
        'beneficiary_account' => 'string',
        'beneficiary_bank' => '\mx\wire4\client\model\Institution',
        'beneficiary_name' => 'string',
        'cep' => '\mx\wire4\client\model\MessageCEP',
        'clave_rastreo' => 'string',
        'concept' => 'string',
        'confirm_date' => '\DateTime',
        'currency_code' => 'string',
        'detention_message' => 'string',
        'error_message' => 'string',
        'monex_description' => 'string',
        'order_id' => 'string',
        'payment_order_id' => 'int',
        'pending_reason' => 'string',
        'reference' => 'int',
        'status_code' => 'string',
        'transaction_id' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'account' => null,
        'amount' => null,
        'beneficiary_account' => null,
        'beneficiary_bank' => null,
        'beneficiary_name' => null,
        'cep' => null,
        'clave_rastreo' => null,
        'concept' => null,
        'confirm_date' => 'date-time',
        'currency_code' => null,
        'detention_message' => null,
        'error_message' => null,
        'monex_description' => null,
        'order_id' => null,
        'payment_order_id' => null,
        'pending_reason' => null,
        'reference' => null,
        'status_code' => null,
        'transaction_id' => null
    ];

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
        'account' => 'account',
        'amount' => 'amount',
        'beneficiary_account' => 'beneficiary_account',
        'beneficiary_bank' => 'beneficiary_bank',
        'beneficiary_name' => 'beneficiary_name',
        'cep' => 'cep',
        'clave_rastreo' => 'clave_rastreo',
        'concept' => 'concept',
        'confirm_date' => 'confirm_date',
        'currency_code' => 'currency_code',
        'detention_message' => 'detention_message',
        'error_message' => 'error_message',
        'monex_description' => 'monex_description',
        'order_id' => 'order_id',
        'payment_order_id' => 'payment_order_id',
        'pending_reason' => 'pending_reason',
        'reference' => 'reference',
        'status_code' => 'status_code',
        'transaction_id' => 'transaction_id'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'account' => 'setAccount',
        'amount' => 'setAmount',
        'beneficiary_account' => 'setBeneficiaryAccount',
        'beneficiary_bank' => 'setBeneficiaryBank',
        'beneficiary_name' => 'setBeneficiaryName',
        'cep' => 'setCep',
        'clave_rastreo' => 'setClaveRastreo',
        'concept' => 'setConcept',
        'confirm_date' => 'setConfirmDate',
        'currency_code' => 'setCurrencyCode',
        'detention_message' => 'setDetentionMessage',
        'error_message' => 'setErrorMessage',
        'monex_description' => 'setMonexDescription',
        'order_id' => 'setOrderId',
        'payment_order_id' => 'setPaymentOrderId',
        'pending_reason' => 'setPendingReason',
        'reference' => 'setReference',
        'status_code' => 'setStatusCode',
        'transaction_id' => 'setTransactionId'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'account' => 'getAccount',
        'amount' => 'getAmount',
        'beneficiary_account' => 'getBeneficiaryAccount',
        'beneficiary_bank' => 'getBeneficiaryBank',
        'beneficiary_name' => 'getBeneficiaryName',
        'cep' => 'getCep',
        'clave_rastreo' => 'getClaveRastreo',
        'concept' => 'getConcept',
        'confirm_date' => 'getConfirmDate',
        'currency_code' => 'getCurrencyCode',
        'detention_message' => 'getDetentionMessage',
        'error_message' => 'getErrorMessage',
        'monex_description' => 'getMonexDescription',
        'order_id' => 'getOrderId',
        'payment_order_id' => 'getPaymentOrderId',
        'pending_reason' => 'getPendingReason',
        'reference' => 'getReference',
        'status_code' => 'getStatusCode',
        'transaction_id' => 'getTransactionId'
    ];

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
        $this->container['account'] = isset($data['account']) ? $data['account'] : null;
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['beneficiary_account'] = isset($data['beneficiary_account']) ? $data['beneficiary_account'] : null;
        $this->container['beneficiary_bank'] = isset($data['beneficiary_bank']) ? $data['beneficiary_bank'] : null;
        $this->container['beneficiary_name'] = isset($data['beneficiary_name']) ? $data['beneficiary_name'] : null;
        $this->container['cep'] = isset($data['cep']) ? $data['cep'] : null;
        $this->container['clave_rastreo'] = isset($data['clave_rastreo']) ? $data['clave_rastreo'] : null;
        $this->container['concept'] = isset($data['concept']) ? $data['concept'] : null;
        $this->container['confirm_date'] = isset($data['confirm_date']) ? $data['confirm_date'] : null;
        $this->container['currency_code'] = isset($data['currency_code']) ? $data['currency_code'] : null;
        $this->container['detention_message'] = isset($data['detention_message']) ? $data['detention_message'] : null;
        $this->container['error_message'] = isset($data['error_message']) ? $data['error_message'] : null;
        $this->container['monex_description'] = isset($data['monex_description']) ? $data['monex_description'] : null;
        $this->container['order_id'] = isset($data['order_id']) ? $data['order_id'] : null;
        $this->container['payment_order_id'] = isset($data['payment_order_id']) ? $data['payment_order_id'] : null;
        $this->container['pending_reason'] = isset($data['pending_reason']) ? $data['pending_reason'] : null;
        $this->container['reference'] = isset($data['reference']) ? $data['reference'] : null;
        $this->container['status_code'] = isset($data['status_code']) ? $data['status_code'] : null;
        $this->container['transaction_id'] = isset($data['transaction_id']) ? $data['transaction_id'] : null;
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
     * Gets account
     *
     * @return string
     */
    public function getAccount()
    {
        return $this->container['account'];
    }

    /**
     * Sets account
     *
     * @param string $account Es la cuenta emisora.
     *
     * @return $this
     */
    public function setAccount($account)
    {
        $this->container['account'] = $account;

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
     * Gets beneficiary_account
     *
     * @return string
     */
    public function getBeneficiaryAccount()
    {
        return $this->container['beneficiary_account'];
    }

    /**
     * Sets beneficiary_account
     *
     * @param string $beneficiary_account Es la cuenta del beneficiario.
     *
     * @return $this
     */
    public function setBeneficiaryAccount($beneficiary_account)
    {
        $this->container['beneficiary_account'] = $beneficiary_account;

        return $this;
    }

    /**
     * Gets beneficiary_bank
     *
     * @return \mx\wire4\client\model\Institution
     */
    public function getBeneficiaryBank()
    {
        return $this->container['beneficiary_bank'];
    }

    /**
     * Sets beneficiary_bank
     *
     * @param \mx\wire4\client\model\Institution $beneficiary_bank beneficiary_bank
     *
     * @return $this
     */
    public function setBeneficiaryBank($beneficiary_bank)
    {
        $this->container['beneficiary_bank'] = $beneficiary_bank;

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
     * @param string $beneficiary_name Es el nombre del Beneficiario.
     *
     * @return $this
     */
    public function setBeneficiaryName($beneficiary_name)
    {
        $this->container['beneficiary_name'] = $beneficiary_name;

        return $this;
    }

    /**
     * Gets cep
     *
     * @return \mx\wire4\client\model\MessageCEP
     */
    public function getCep()
    {
        return $this->container['cep'];
    }

    /**
     * Sets cep
     *
     * @param \mx\wire4\client\model\MessageCEP $cep cep
     *
     * @return $this
     */
    public function setCep($cep)
    {
        $this->container['cep'] = $cep;

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
     * @param string $clave_rastreo Es la clave de rastreo de la transferencia.
     *
     * @return $this
     */
    public function setClaveRastreo($clave_rastreo)
    {
        $this->container['clave_rastreo'] = $clave_rastreo;

        return $this;
    }

    /**
     * Gets concept
     *
     * @return string
     */
    public function getConcept()
    {
        return $this->container['concept'];
    }

    /**
     * Sets concept
     *
     * @param string $concept Es el concepto de pago.
     *
     * @return $this
     */
    public function setConcept($concept)
    {
        $this->container['concept'] = $concept;

        return $this;
    }

    /**
     * Gets confirm_date
     *
     * @return \DateTime
     */
    public function getConfirmDate()
    {
        return $this->container['confirm_date'];
    }

    /**
     * Sets confirm_date
     *
     * @param \DateTime $confirm_date Es la fecha de aplicación de la transferencia. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: <strong>2020-10-27T11:03:15.000-06:00</strong>.
     *
     * @return $this
     */
    public function setConfirmDate($confirm_date)
    {
        $this->container['confirm_date'] = $confirm_date;

        return $this;
    }

    /**
     * Gets currency_code
     *
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->container['currency_code'];
    }

    /**
     * Sets currency_code
     *
     * @param string $currency_code Es el código de divisa de la transferencia. Es en el formato estándar de 3 dígitos. Ejemplo del peso mexicano: <b>MXP</b>, ejemplo del dólar estadounidense: <b>USD</b>.
     *
     * @return $this
     */
    public function setCurrencyCode($currency_code)
    {
        $this->container['currency_code'] = $currency_code;

        return $this;
    }

    /**
     * Gets detention_message
     *
     * @return string
     */
    public function getDetentionMessage()
    {
        return $this->container['detention_message'];
    }

    /**
     * Sets detention_message
     *
     * @param string $detention_message Es el mensaje proporcionado por Monex para la transferencia.
     *
     * @return $this
     */
    public function setDetentionMessage($detention_message)
    {
        $this->container['detention_message'] = $detention_message;

        return $this;
    }

    /**
     * Gets error_message
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->container['error_message'];
    }

    /**
     * Sets error_message
     *
     * @param string $error_message Es el mensaje de error, en caso de algún error se informará aquí.
     *
     * @return $this
     */
    public function setErrorMessage($error_message)
    {
        $this->container['error_message'] = $error_message;

        return $this;
    }

    /**
     * Gets monex_description
     *
     * @return string
     */
    public function getMonexDescription()
    {
        return $this->container['monex_description'];
    }

    /**
     * Sets monex_description
     *
     * @param string $monex_description Es la descripción de Monex.
     *
     * @return $this
     */
    public function setMonexDescription($monex_description)
    {
        $this->container['monex_description'] = $monex_description;

        return $this;
    }

    /**
     * Gets order_id
     *
     * @return string
     */
    public function getOrderId()
    {
        return $this->container['order_id'];
    }

    /**
     * Sets order_id
     *
     * @param string $order_id Es el identificador asignado por la aplciación a la transferencia.
     *
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->container['order_id'] = $order_id;

        return $this;
    }

    /**
     * Gets payment_order_id
     *
     * @return int
     */
    public function getPaymentOrderId()
    {
        return $this->container['payment_order_id'];
    }

    /**
     * Sets payment_order_id
     *
     * @param int $payment_order_id Es el identificador de la orden de pago en Monex.
     *
     * @return $this
     */
    public function setPaymentOrderId($payment_order_id)
    {
        $this->container['payment_order_id'] = $payment_order_id;

        return $this;
    }

    /**
     * Gets pending_reason
     *
     * @return string
     */
    public function getPendingReason()
    {
        return $this->container['pending_reason'];
    }

    /**
     * Sets pending_reason
     *
     * @param string $pending_reason Es la razón de porque esta pendiente aún cuando se autorizó la transferencia.
     *
     * @return $this
     */
    public function setPendingReason($pending_reason)
    {
        $this->container['pending_reason'] = $pending_reason;

        return $this;
    }

    /**
     * Gets reference
     *
     * @return int
     */
    public function getReference()
    {
        return $this->container['reference'];
    }

    /**
     * Sets reference
     *
     * @param int $reference Es la referencia numérica.
     *
     * @return $this
     */
    public function setReference($reference)
    {
        $this->container['reference'] = $reference;

        return $this;
    }

    /**
     * Gets status_code
     *
     * @return string
     */
    public function getStatusCode()
    {
        return $this->container['status_code'];
    }

    /**
     * Sets status_code
     *
     * @param string $status_code Es el estado de la transferencia de la transferencia, los posibles valores son: <b>PENDING, COMPLETED, FAILED, CANCELLED</b>
     *
     * @return $this
     */
    public function setStatusCode($status_code)
    {
        $this->container['status_code'] = $status_code;

        return $this;
    }

    /**
     * Gets transaction_id
     *
     * @return int
     */
    public function getTransactionId()
    {
        return $this->container['transaction_id'];
    }

    /**
     * Sets transaction_id
     *
     * @param int $transaction_id Es el identificador de la transferencia asignado por Monex.
     *
     * @return $this
     */
    public function setTransactionId($transaction_id)
    {
        $this->container['transaction_id'] = $transaction_id;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
