# iTransact SDK for PHP

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
Coming soon

### Manual Install

Download the zip, or use git submodules to pull the SDK into your project. 

Now just require `iTransactSDK.php` on whichever class(es) you need to use it on. 

Here is an example implementation:
```php
require_once('./iTransactSDK.php');

use iTransact\iTransactSDK\CardPayload;
use iTransact\iTransactSDK\iTTransaction;
...
class Foo(){
    private function Bar(){                
        // Put these somewhere safe, like in an environment variable
        $apiUsername = 'InsertApiUsername';
        $apiKey = 'InsertApiKeyHere';
        
        // Create new instances of the SDK, and if you would like you can also use the payload.
        $sdk = new iTTransaction();
        $payload = new CardPayload('Ol Greg',5454545454545454,123,12,2020);
        $transactionAmount = 1234;
        
        // POST request to server
        $postResult = $sdk->postCardTransaction($transactionAmount,$apiUsername,$apiKey,$payload);
    }
}
```

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


## Testing
Coming soon