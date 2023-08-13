<?php

namespace Tevli\CryptoBalanceChecker;

interface CryptoBalanceChecker
{
    /**
     * Each Cryptocurrency is initialized with a wallet and an api Key for making requests.
     */
    public function __construct(String $address, String $apiKey);

    /**
     * This returns an instance of CryptoBalanceChecker that can then be queried to get the balance and unit.
     */
    public function getBalance();

    /**
     * This returns the unit the balance is denominated in.
     */
    public function getUnit(): String;
}
