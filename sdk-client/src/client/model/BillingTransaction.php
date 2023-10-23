<?php
/**
 * BillingTransaction
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
 * BillingTransaction Class Doc Comment
 *
 * @category Class
 * @description Contiene información de las transacciones que se facturan
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class BillingTransaction implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'BillingTransaction';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount' => 'float',
        'clave_rastreo' => 'string',
        'monex_id' => 'int',
        'operation_date' => '\DateTime',
        'order_id' => 'string',
        'payment_order_id' => 'string',
        'transaction_id' => 'int',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'amount' => null,
        'clave_rastreo' => null,
        'monex_id' => null,
        'operation_date' => 'date-time',
        'order_id' => null,
        'payment_order_id' => null,
        'transaction_id' => null,
        'type' => null
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
        'amount' => 'amount',
        'clave_rastreo' => 'clave_rastreo',
        'monex_id' => 'monex_id',
        'operation_date' => 'operation_date',
        'order_id' => 'order_id',
        'payment_order_id' => 'payment_order_id',
        'transaction_id' => 'transaction_id',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'clave_rastreo' => 'setClaveRastreo',
        'monex_id' => 'setMonexId',
        'operation_date' => 'setOperationDate',
        'order_id' => 'setOrderId',
        'payment_order_id' => 'setPaymentOrderId',
        'transaction_id' => 'setTransactionId',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'clave_rastreo' => 'getClaveRastreo',
        'monex_id' => 'getMonexId',
        'operation_date' => 'getOperationDate',
        'order_id' => 'getOrderId',
        'payment_order_id' => 'getPaymentOrderId',
        'transaction_id' => 'getTransactionId',
        'type' => 'getType'
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

    const TYPE_IN = 'IN';
    const TYPE_OUT = 'OUT';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_IN,
            self::TYPE_OUT
        ];
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
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['clave_rastreo'] = isset($data['clave_rastreo']) ? $data['clave_rastreo'] : null;
        $this->container['monex_id'] = isset($data['monex_id']) ? $data['monex_id'] : null;
        $this->container['operation_date'] = isset($data['operation_date']) ? $data['operation_date'] : null;
        $this->container['order_id'] = isset($data['order_id']) ? $data['order_id'] : null;
        $this->container['payment_order_id'] = isset($data['payment_order_id']) ? $data['payment_order_id'] : null;
        $this->container['transaction_id'] = isset($data['transaction_id']) ? $data['transaction_id'] : null;
        $this->container['type'] = isset($data['type']) ? $data['type'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value for 'type', must be one of '%s'",
                implode("', '", $allowedValues)
            );
        }

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
     * @param float $amount Monto de la transacción
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

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
     * @param string $clave_rastreo Clave de rastreo que se asignó a la transacción
     *
     * @return $this
     */
    public function setClaveRastreo($clave_rastreo)
    {
        $this->container['clave_rastreo'] = $clave_rastreo;

        return $this;
    }

    /**
     * Gets monex_id
     *
     * @return int
     */
    public function getMonexId()
    {
        return $this->container['monex_id'];
    }

    /**
     * Sets monex_id
     *
     * @param int $monex_id Identificador de transaccion en banco monex
     *
     * @return $this
     */
    public function setMonexId($monex_id)
    {
        $this->container['monex_id'] = $monex_id;

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
     * @param \DateTime $operation_date Fecha y hora de la transacción
     *
     * @return $this
     */
    public function setOperationDate($operation_date)
    {
        $this->container['operation_date'] = $operation_date;

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
     * @param string $order_id Identificador de la orden
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
     * @return string
     */
    public function getPaymentOrderId()
    {
        return $this->container['payment_order_id'];
    }

    /**
     * Sets payment_order_id
     *
     * @param string $payment_order_id Identificador de la orden de pago
     *
     * @return $this
     */
    public function setPaymentOrderId($payment_order_id)
    {
        $this->container['payment_order_id'] = $payment_order_id;

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
     * @param int $transaction_id Identificador de la transacción
     *
     * @return $this
     */
    public function setTransactionId($transaction_id)
    {
        $this->container['transaction_id'] = $transaction_id;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string $type Tipo de transaccion IN | OUT
     *
     * @return $this
     */
    public function setType($type)
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($type) && !in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'type', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

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
