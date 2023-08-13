<?php

namespace Tevli\CryptoBalanceChecker;

class Bitcoin implements CryptoBalanceChecker
{
    /**
     * @var String The address being queried for.
     */
    private string $address;

    /**
     * @var string The unit the balance is denominated in.
     */
    private string $unit;

    /**
     * @var numeric  The balance.
     */
    private string|int|float $balance;

    /**
     * @param String $address
     * @param String $apiKey
     */
    public function __construct(String $address, String $apiKey = 'Please leave this empty')
    {
        $this->address = $address;
    }

    /**
     * {@inheritDoc}
     */
    public function getBalance(): Bitcoin
    {
        if(empty($this->balance)) {
            if($this->query() == true) {
                return $this;
            }
        }

        return $this;
    }

    private function query()
    {
        try {
            $result = file_get_contents('https://blockchain.info/q/addressbalance/' . $this->address);
        } catch (\Exception $exception) {
            return $exception;
        }
        $this->balance = json_decode($result)->result;
        $this->unit = 'satoshi';

        return true;
    }

    public function toSatoshi()
    {
        return $this->balance;
    }

    public function toBTC()
    {
        return $this->balance / pow(10, 8);
    }

    public function getUnit(): String
    {
        return $this->unit;
    }
}
