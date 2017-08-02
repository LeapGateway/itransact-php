# iTransact SDK for PHP

As a quick helper for our PHP community to get up and running even faster in your favorite dependency manager, we have created this API / SDK wrapper specifically tailored for PHP. 

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
...
class Foo(){
    private $sdk;
    private function Bar(){
        $sdk = new iTransactSDK();
    }
}
```

## Testing
Coming soon