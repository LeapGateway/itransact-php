<?php
/**
 * Copyright (c) Payroc LLC 2017.
 */

/**
 * Created by PhpStorm.
 * User: prestonf
 * Date: 8/2/17
 * Time: 4:33 PM
 */

namespace iTransact\iTransactSDK;

use iTransactSDK;
use PHPUnit\Framework\TestCase;

class iTransactSDKTest extends TestCase
{
    public function signPayload(){
        $this->assertEquals(1,1);
    }

    public function testGenerateHeaderArray()
    {
        $apiUsername = '';
        $payloadSignature = '';

        $expectedData[''] = array(
            'Content-Type: application/json',
            'Authorization: ' . $apiUsername . ':' . $payloadSignature
        );

        $this->assertEquals(1, 1);

    }
}
