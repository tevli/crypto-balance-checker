<?php

namespace Tevli\CryptoBalanceChecker;

class Ethereum
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

    public function toWei()
    {
        return $this->balance;
    }

    public function toKwei()
    {
        return $this->balance / pow(10, 3);
    }

    public function toGwei()
    {
        return $this->balance / pow(10, 9);
    }

    public function toMwei()
    {
        return $this->balance / pow(10, 6);
    }

    /**
     * Get Wallet balance.
     */
    public function getBalance()
    {
        if(empty($this->balance)) {
            if($this->query() == true) {
                if ($this->balance instanceof \Exception) {
                    return $this->balance->getMessage();
                }

                return $this->balance;
            }
        }

        return $this->balance;
    }

    /**
     * Make request to the blockchain and get the balance.
     */
    private function query()
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
