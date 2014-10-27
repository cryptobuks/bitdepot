<?php

namespace Dizda\Bundle\BlockchainBundle\Model\Insight;

use Dizda\Bundle\BlockchainBundle\Model\AddressAbstract;
use JMS\Serializer\Annotation as Serializer;

class Address
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("addrStr")
     */
    private $address;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $balance;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("totalReceived")
     */
    private $totalReceived;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("totalSent")
     */
    private $totalSent;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("unconfirmedBalance")
     */
    private $unconfirmedBalance;

    /**
     * @var string
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("unconfirmedTxApperances")
     */
    private $unconfirmedTxApperances;

    /**
     * @var string
     *
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("txApperances")
     */
    private $txApperances;

    /**
     * @var string
     *
     * @Serializer\Type("array")
     */
    private $transactions;

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return string
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param string $totalReceived
     */
    public function setTotalReceived($totalReceived)
    {
        $this->totalReceived = $totalReceived;
    }

    /**
     * @return string
     */
    public function getTotalReceived()
    {
        return $this->totalReceived;
    }

    /**
     * @param string $totalSent
     */
    public function setTotalSent($totalSent)
    {
        $this->totalSent = $totalSent;
    }

    /**
     * @return string
     */
    public function getTotalSent()
    {
        return $this->totalSent;
    }

    /**
     * @param string $transactions
     */
    public function setTransactions($transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * @return string
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param string $txApperances
     */
    public function setTxApperances($txApperances)
    {
        $this->txApperances = $txApperances;
    }

    /**
     * @return string
     */
    public function getTxApperances()
    {
        return $this->txApperances;
    }

    /**
     * @param string $unconfirmedBalance
     */
    public function setUnconfirmedBalance($unconfirmedBalance)
    {
        $this->unconfirmedBalance = $unconfirmedBalance;
    }

    /**
     * @return string
     */
    public function getUnconfirmedBalance()
    {
        return $this->unconfirmedBalance;
    }

    /**
     * @param string $unconfirmedTxApperances
     */
    public function setUnconfirmedTxApperances($unconfirmedTxApperances)
    {
        $this->unconfirmedTxApperances = $unconfirmedTxApperances;
    }

    /**
     * @return string
     */
    public function getUnconfirmedTxApperances()
    {
        return $this->unconfirmedTxApperances;
    }


}