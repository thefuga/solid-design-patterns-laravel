<?php

class Invitaion extends Model {
    const STATUSES = ['pending', 'accepted'];

    public function sender() {
	return $this->belongsTo(User::class);
    } 

    public function toParam() {	
	// Serialization logic
    }

    public function deliver() {
	// Mail delivery logic
    }
}
