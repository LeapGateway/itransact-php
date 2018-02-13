# iTransact SDK for PHP

[![Join the chat at https://gitter.im/itransact/itransact-php](https://badges.gitter.im/itransact/itransact-php.svg)](https://gitter.im/itransact/itransact-php?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

As a quick helper for our PHP community to get up and running even faster in your favorite dependency manager, we have created this API / SDK wrapper specifically tailored for PHP. 

More details at [iTransact Developer API](http://developers.itransact.com/api-reference/#operation/postTransactions)

## Features
- [PHP](http://php.net/downloads.php) >= 5.1.2
- [cURL](http://php.net/manual/en/function.curl-exec.php)
- [Composer](https://getcomposer.org/download/) (optional)
- [PHPUnit]() (optional)

## Usage 
If there is a platform you would like to see in addition to composer for dependency management, let us know.

### Composer Install
Run the following command at the root fo your project

```bash
composer require itransact/itransact-php
```

Packagist Link - [iTransact SDK on Composer](https://packagist.org/packages/itransact/itransact-php)


### Manual Install

Download the zip, or use git submodules to pull the SDK into your project. 

Now just require `iTransactSDK.php` on whichever class(es) you need to use it on. 


### Import Example

Here is an example implementation:

#### With Composer
```php
# Wherever you are adding autoloader it should pick up the class.
$loader = require_once __DIR__ . '/vendor/autoload.php';

...

# Now that its been automatically loaded, you can just call it inline or via use 

use iTransact\iTransactSDK\CardPayload;
use iTransact\iTransactSDK\AddressPayload;
use iTransact\iTransactSDK\TransactionPayload;
use iTransact\iTransactSDK\iTTransaction;

class Foo(){
    private function Bar(){                
        // Put these somewhere safe, like in an environment variable
        $apiUsername = 'InsertApiUsername';
        $apiKey = 'InsertApiKeyHere';

        // Create new instances of the SDK, and if you would like you can also use the payload.
        $card = new CardPayload('Greg',5454545454545454,123,12,2020);
        $address = new AddressPayload('', '', '', '', '84025'); // Address is optional unless you are using a Loopback / Sandbox / Demo account
        $payload = new TransactionPayload(1234, $card, $address); // Amount, CardPayload, AddressPayload 
        $sdk = new iTTransaction();
        
        // POST request to server
        $postResult = $sdk->postCardTransaction($transactionAmount,$apiUsername,$apiKey,$payload);
    }
}
```

#### Without Composer
```php
require_once('./iTransactSDK.php');

use iTransact\iTransactSDK\CardPayload;
use iTransact\iTransactSDK\AddressPayload;
use iTransact\iTransactSDK\TransactionPayload;
use iTransact\iTransactSDK\iTTransaction;

class Foo(){
    private function Bar(){               
        // Put these somewhere safe, like in an environment variable
        $apiUsername = 'InsertApiUsername';
        $apiKey = 'InsertApiKeyHere';
        
        // Create new instances of the SDK, and if you would like you can also use the payload.
        $card = new CardPayload('Greg',5454545454545454,123,12,2020);
        $address = new AddressPayload('', '', '', '', '84025'); // Address is optional unless you are using a Loopback / Sandbox / Demo account
        $payload = new TransactionPayload(1234, $card, $address); // Amount, CardPayload, AddressPayload 
        $sdk = new iTTransaction();
        
        // POST request to server
        $postResult = $sdk->postCardTransaction($transactionAmount,$apiUsername,$apiKey,$payload);
    }
}
```

#### Example Response
Example successful `$postResult` will return a 201 with the following fields / value types:
```json
{
  "id": "string",
  "amount": 0,
  "status": "string",
  "settled": "string",
  "instrument": "string",
  "metadata": [
    {
      "key": "string",
      "value": "string"
    }
  ],
  "payment_source": {
    "name": "string",
    "default": "string",
    "type": "string",
    "expired": "string",
    "month": "string",
    "year": "string",
    "brand": "string",
    "last_four_digits": "string",
    "sec_code": "string"
  },
  "credits": {
    "amount": 0,
    "state": "string"
  },
  "credited_amount": "string"
}
```

Example failed '$postResult' will return unathorized if $apiUsername or $apiKey don't exist on your iTransact account 
```json
{
  "error": [  
    { "message": "Unauthorized" }
  ]
}

```

Check out the files in `src/iTransactJSON/Examples` for other ideas for implementation.

## Testing

Unit tests on this project are run using PHPUnit. You can find each test in the `src/iTransactJSON/Tests` folder 

## Legacy XML API

We have also included some examples for your convenience of the old legacy xml api which is now deprecated. Please use the JSON api moving forward.

You can find these files in `src/iTransactXML/Examples`  