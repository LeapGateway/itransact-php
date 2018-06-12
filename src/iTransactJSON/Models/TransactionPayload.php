<?php
/**
 * Created by PhpStorm.
 * User: prestonf
 * Date: 1/26/18
 * Time: 4:04 PM
 */

namespace iTransact\iTransactSDK;


class TransactionPayload
{
    public $amount;
    public $card;
    public $address;
    public $send_merchant_receipt;
    public $send_customer_receipt;
    public $metadata;

    /**
     * TransactionPayload constructor.
     * @param integer $amount Example: $15.00 should be 1500
     * @param CardPayload $card
     * @param AddressPayload $address
     * @param array $metadata Associative array of values
     */
    public function __construct($amount, $card, $address)
    {
        $this->amount = $amount;
        $this->card = $card;
        // TODO - make address optional
        $this->address = $address;
        $this->send_merchant_receipt = true;
        $this->send_customer_receipt = false;
        $this->metadata = array();
    }


    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param mixed $card
     */
    public function setCard($card)
    {
        $this->card = $card;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getSendMerchantReceipt()
    {
        return $this->send_merchant_receipt;
    }

    /**
     * @param mixed $address
     */
    public function setSendMerchantReceipt($send)
    {
        $this->send_merchant_receipt = $send;
    }

    /**
     * @return mixed
     */
    public function getSendCustomerReceipt()
    {
        return $this->send_customer_receipt;
    }

    /**
     * @param mixed $send
     */
    public function setSendCustomerReceipt($send)
    {
        $this->send_customer_receipt = $send;
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function addMetadata($key, $value)
    {
        $this->metadata[$key] = $value;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }



}