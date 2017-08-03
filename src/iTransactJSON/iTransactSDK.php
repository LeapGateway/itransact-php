<?php
/**
 * Copyright (c) Payroc LLC 2017.
 */

namespace iTransact\iTransactSDK {

    require_once('Models/CardPayload.php');
    require_once('Models/Address.php');

    /**
     * Class iTCore
     * @package iTransact\iTransactSDK
     * @author Preston Farr
     * @copyright Payroc LLC
     * @example
     * $trans = new iTTransaction();
     * $trans::postCardTransaction(1500, $username, $somekey, $payload);
     */
    class iTCore
    {
        const API_BASE_URL = "https://api.itransact.com";
        const API_POST_TOKENS_URL = self::API_BASE_URL . "/tokens";
        const API_GET_TOKENS_URL = self::API_POST_TOKENS_URL . "/"; // Just add token id at the end
        const API_POST_TRANSACTIONS_URL = self::API_BASE_URL . "/transactions";
        const API_GET_TRANSACTIONS_URL = self::API_POST_TRANSACTIONS_URL . "/"; // Just add transaction id at the end

        /**
         * @param string $apiUsername
         * @param string $apiKey
         * @param mixed $payload
         *
         * @return array
         */
        public static function generateHeaderArray($apiUsername, $apiKey, $payload)
        {
            $payloadSignature = self::signPayload($apiKey, $payload);
            $encodedUsername = base64_encode($apiUsername);
            return array(
                'Content-Type: application/json',
                'Authorization: ' . $encodedUsername . ':' . $payloadSignature
            );
        }


        /**
         * @param string $apikey
         * @param string $payload
         *
         * @return string
         */
        public static function signPayload($apikey, $payload)
        {
            $digest = hash_hmac('sha256', json_encode($payload), $apikey, true);
            return base64_encode($digest);
        }
    }

    /**
     * Class iTTransaction
     * @package iTransact\iTransactSDK
     * @see
     */
    class iTTransaction
    {
        /**
         * @param integer $transactionAmount Example: $15.00 should be 1500
         * @param string $apiUsername
         * @param string $apiKey
         * @param CardPayload $cardData
         *
         * @return mixed
         */
        public function postCardTransaction($transactionAmount, $apiUsername, $apiKey, $cardData)
        {

            $payload['amount'] = $transactionAmount;
            $payload['card'] = $cardData;

            $headers = iTCore::generateHeaderArray($apiUsername, $apiKey, $payload);

            $ch = curl_init(iTCore::API_POST_TRANSACTIONS_URL);
            curl_setopt_array($ch, array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_POSTFIELDS => json_encode($payload)
            ));

            $response = curl_exec($ch);

            if ($response === FALSE) {
                die(curl_error($ch));
            }

            return json_decode($response, TRUE);
        }

        /**
         * @param string $apikey
         * @param string $payload
         *
         * @return string
         */
        public function signPayload($apikey, $payload)
        {
            return iTCore::signPayload($apikey, $payload);
        }

        // TODO - add other SDK methods for ACH, etc.

    }
}