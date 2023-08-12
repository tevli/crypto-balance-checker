<?php

namespace Tevli\CryptoBalanceChecker\Tests;

use PHPUnit\Framework\TestCase;
use Tevli\CryptoBalanceChecker\Ethereum;

class EthereumTest extends TestCase
{
    /**
     * test.
     */
    public function test_eth_balance_is_numeric()
    {
        $eth = new Ethereum('0xddbd2b932c763ba5b1b7ae3b362eac3e8d40121a', 'ZNKTD8JI378P8US4CW8C26EKFYES1BB8IB');
        $this->assertIsNumeric($eth->getBalance()->toWei());
    }

    public function test_eth_returns_eth_object(){
        $eth = new Ethereum('0xddbd2b932c763ba5b1b7ae3b362eac3e8d40121a', 'ZNKTD8JI378P8US4CW8C26EKFYES1BB8IB');
        $this->assertInstanceOf('Tevli\CryptoBalanceChecker\Ethereum',$eth->getBalance());
    }
}
