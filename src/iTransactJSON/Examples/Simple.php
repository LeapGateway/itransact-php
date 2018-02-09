<?php
/**
 * Copyright (c) Payroc LLC 2017.
 */

/**
 * Example usage of the iTransact SDK
 *
 * User: prestonf
 * Date: 8/2/17
 * Time: 5:12 PM
 */
require_once ('../iTransactSDK.php');

use iTransact\iTransactSDK\CardPayload;
use iTransact\iTransactSDK\AddressPayload;
use iTransact\iTransactSDK\TransactionPayload;
use iTransact\iTransactSDK\iTTransaction;

// Put these somewhere safe, like in an environment variable
$apiUsername = 'InsertApiUsername';
$apiKey = 'InsertApiKeyHere';

$card = new CardPayload('Greg',5454545454545454,123,12,2020);
$address = new AddressPayload('', '', '', '', '84025'); // Address is optional unless you are using a Loopback / Sandbox / Demo account
$payload = new TransactionPayload(1234, $card, $address);
$sdk = new iTTransaction();


// Use the following to get payload signature, and submit the transaction.
$postResult = $sdk->postCardTransaction($apiUsername, $apiKey, $payload);
print "\n\nPosted payload result\n";
var_dump($postResult);

/**
 * Other useful stuff
 **/

// To compare a payload HMAC string
$signResult = $sdk->signPayload($apiKey, $payload);
print "\nSigned payload result\n";
var_dump($signResult);