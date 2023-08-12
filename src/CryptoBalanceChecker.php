<?php

namespace Tevli\CryptoBalanceChecker;

interface CryptoBalanceChecker
{

    /**
     * This returns an instance of CryptoBalanceChecker that can then be queried to get the balance and unit.
     */
    public function getBalance();
}
