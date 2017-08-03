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
use iTransact\iTransactSDK\iTTransaction;

// Put these somewhere safe, like in an environment variable
$apiUsername = 'InsertApiUsername';
$apiKey = 'InsertApiKeyHere';

// Create new instances of the SDK, and if you would like you can also use the payload.
$sdk = new iTTransaction();
$payload = new CardPayload('Ol Greg',5454545454545454,123,12,2020);
$transactionAmount = 1234;


$signResult = $sdk->signPayload($transactionAmount, $payload);
print "\nSigned payload result\n";
var_dump($signResult);

$postResult = $sdk->postCardTransaction($transactionAmount,$apiUsername,$apiKey,$payload);
print "\n\nPosted payload result\n";
var_dump($postResult);