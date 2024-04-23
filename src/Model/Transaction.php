<?php

namespace Project\Model;

class Transaction {
    private $id;
    private $accountFrom;
    private $accountTo;
    private $amount;
    private $trdate;

    public function __construct($id, $accountFrom, $accountTo, $amount, $trdate) {
        $this->id = $id;
        $this->accountFrom = $accountFrom;
        $this->accountTo = $accountTo;
        $this->amount = $amount;
        $this->trdate = $trdate;
    }

    // Accessor methods for each property
    public function getId() {
        return $this->id;
    }

    public function getAccountFrom() {
        return $this->accountFrom;
    }

    public function getAccountTo() {
        return $this->accountTo;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getTrdate() {
        return $this->trdate;
    }
}