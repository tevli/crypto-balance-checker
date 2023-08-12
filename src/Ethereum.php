<?php

namespace Tevli\CryptoBalanceChecker;

class Ethereum implements CryptoBalanceChecker
{
    private string $address;
    private string $apiKey;
    private string $unit;
    private $balance;

    public function __construct(String $address, String $apiKey)
    {
        $this->address = $address;
        $this->apiKey = $apiKey;
    }

    /**
     * Convert balance to Wei.
     */
    public function toWei()
    {
        return $this->balance;
    }

    /**
     * Convert balance to Kwei.
     */
    public function toKwei(): float|int
    {
        return $this->balance / pow(10, 3);
    }

    /**
     * Convert balance to Gwei.
     */
    public function toGwei(): float|int
    {
        return $this->balance / pow(10, 9);
    }

    /**
     * Convert balance to Wei.
     */
    public function toMwei(): float|int
    {
        return $this->balance / pow(10, 6);
    }

    /**
     * {@inheritDoc}
     */
    public function getBalance(): Ethereum
    {
        if(empty($this->balance)) {
            if($this->query() == true) {
                if ($this->balance instanceof \Exception) {
                    return $this->balance->getMessage();
                }

                return $this;
            }
        }

        return $this;
    }

    /**
     * This typically queries the blockchain and if successful, sets the balance.
     */
    private function query(): \Exception|bool
    {
        try {
            $result = file_get_contents("https://api.etherscan.io/api?module=account&action=balance&address=".$this->address."&tag=latest&apikey=".$this->apiKey);
        } catch (\Exception $exception) {
            return $exception;
        }
        $this->balance = json_decode($result)->result;
        $this->unit = 'wei';

        return true;
    }

    public function getUnit()
    {
        return $this->unit;
    }
}
