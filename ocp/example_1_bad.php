<?php

// Depends on concrete implementation - closed for extension.
class Purchase {
    public function chargeUser() {
	Wirecard::charge($this->user, $this->ammount);
    }
}
