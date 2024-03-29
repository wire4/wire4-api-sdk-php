<?php
/**
 * PaymentRequestCodiResponseDTO
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
 * PaymentRequestCodiResponseDTO Class Doc Comment
 *
 * @category Class
 * @description Objeto que contiene la información de solicitud de pago por CODI®.
 * @package  mx\wire4
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class PaymentRequestCodiResponseDTO implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'PaymentRequestCodiResponseDTO';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount' => 'float',
        'barcode_base64' => 'string',
        'barcode_url' => 'string',
        'concept' => 'string',
        'creation_date' => '\DateTime',
        'due_date' => '\DateTime',
        'operations' => '\mx\wire4\client\model\CodiOperationResponseDTO[]',
        'order_id' => 'string',
        'phone_number' => 'string',
        'status' => 'string',
        'type' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'amount' => null,
        'barcode_base64' => null,
        'barcode_url' => null,
        'concept' => null,
        'creation_date' => 'date-time',
        'due_date' => 'date-time',
        'operations' => null,
        'order_id' => null,
        'phone_number' => null,
        'status' => null,
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
        'barcode_base64' => 'barcode_base64',
        'barcode_url' => 'barcode_url',
        'concept' => 'concept',
        'creation_date' => 'creation_date',
        'due_date' => 'due_date',
        'operations' => 'operations',
        'order_id' => 'order_id',
        'phone_number' => 'phone_number',
        'status' => 'status',
        'type' => 'type'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'barcode_base64' => 'setBarcodeBase64',
        'barcode_url' => 'setBarcodeUrl',
        'concept' => 'setConcept',
        'creation_date' => 'setCreationDate',
        'due_date' => 'setDueDate',
        'operations' => 'setOperations',
        'order_id' => 'setOrderId',
        'phone_number' => 'setPhoneNumber',
        'status' => 'setStatus',
        'type' => 'setType'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'barcode_base64' => 'getBarcodeBase64',
        'barcode_url' => 'getBarcodeUrl',
        'concept' => 'getConcept',
        'creation_date' => 'getCreationDate',
        'due_date' => 'getDueDate',
        'operations' => 'getOperations',
        'order_id' => 'getOrderId',
        'phone_number' => 'getPhoneNumber',
        'status' => 'getStatus',
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
        $this->container['barcode_base64'] = isset($data['barcode_base64']) ? $data['barcode_base64'] : null;
        $this->container['barcode_url'] = isset($data['barcode_url']) ? $data['barcode_url'] : null;
        $this->container['concept'] = isset($data['concept']) ? $data['concept'] : null;
        $this->container['creation_date'] = isset($data['creation_date']) ? $data['creation_date'] : null;
        $this->container['due_date'] = isset($data['due_date']) ? $data['due_date'] : null;
        $this->container['operations'] = isset($data['operations']) ? $data['operations'] : null;
        $this->container['order_id'] = isset($data['order_id']) ? $data['order_id'] : null;
        $this->container['phone_number'] = isset($data['phone_number']) ? $data['phone_number'] : null;
        $this->container['status'] = isset($data['status']) ? $data['status'] : null;
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
     * @param float $amount Es el Monto del pago. Ejemplo 1000.00
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets barcode_base64
     *
     * @return string
     */
    public function getBarcodeBase64()
    {
        return $this->container['barcode_base64'];
    }

    /**
     * Sets barcode_base64
     *
     * @param string $barcode_base64 Es la imagen QR en formato Base64 para el CODI®.
     *
     * @return $this
     */
    public function setBarcodeBase64($barcode_base64)
    {
        $this->container['barcode_base64'] = $barcode_base64;

        return $this;
    }

    /**
     * Gets barcode_url
     *
     * @return string
     */
    public function getBarcodeUrl()
    {
        return $this->container['barcode_url'];
    }

    /**
     * Sets barcode_url
     *
     * @param string $barcode_url Es la dirección URL de la imagen QR para el CODI®.
     *
     * @return $this
     */
    public function setBarcodeUrl($barcode_url)
    {
        $this->container['barcode_url'] = $barcode_url;

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
     * Gets creation_date
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->container['creation_date'];
    }

    /**
     * Sets creation_date
     *
     * @param \DateTime $creation_date Es la fecha de creación. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: <strong>2020-10-27T11:03:15.000-06:00</strong>.
     *
     * @return $this
     */
    public function setCreationDate($creation_date)
    {
        $this->container['creation_date'] = $creation_date;

        return $this;
    }

    /**
     * Gets due_date
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->container['due_date'];
    }

    /**
     * Sets due_date
     *
     * @param \DateTime $due_date Es la fecha de vencimiento. Ésta fecha viene en formato ISO 8601 con zona horaria, ejemplo: <strong>2020-10-27T11:03:15.000-06:00</strong>.
     *
     * @return $this
     */
    public function setDueDate($due_date)
    {
        $this->container['due_date'] = $due_date;

        return $this;
    }

    /**
     * Gets operations
     *
     * @return \mx\wire4\client\model\CodiOperationResponseDTO[]
     */
    public function getOperations()
    {
        return $this->container['operations'];
    }

    /**
     * Sets operations
     *
     * @param \mx\wire4\client\model\CodiOperationResponseDTO[] $operations Es el listado de pagos realizados sobre la petición.
     *
     * @return $this
     */
    public function setOperations($operations)
    {
        $this->container['operations'] = $operations;

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
     * @param string $order_id Es el orderId asignado a la solicitud.
     *
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->container['order_id'] = $order_id;

        return $this;
    }

    /**
     * Gets phone_number
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->container['phone_number'];
    }

    /**
     * Sets phone_number
     *
     * @param string $phone_number Es el número de teléfono.
     *
     * @return $this
     */
    public function setPhoneNumber($phone_number)
    {
        $this->container['phone_number'] = $phone_number;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string $status Es el estado (estatus) de la orden de pago. Los valores pueden ser: <b>RECEIVED, COMPLETED Y CANCELLED</b>
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->container['status'] = $status;

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
     * @param string $type Es el tipo de petición. Los valores pueden ser: <b>QR_CODE o PUSH_NOTIFICATION</b>
     *
     * @return $this
     */
    public function setType($type)
    {
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
