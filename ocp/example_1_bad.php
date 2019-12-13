<?php

// Depends on concrete implementation - closed for extansion.
class Purchase {
    public function chargeUser() {
	Wirecard->charge($this->user, $this->ammount);
    }
}
