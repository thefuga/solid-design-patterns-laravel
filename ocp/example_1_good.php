<?php

// Depends on abstraction through dependency injection. Open for extension by using
// different PaymentGateway implementations.
// PaymentGateway implementations will generally implement the ADAPTER PATTERN to keep
// the same interface to users.
class Purchase {
    public function chargeUser(PaymentGateway $paymentGateway) {
	$paymentGateway->charge($this->user, $this->ammount);
    }
}
