<?php

class Invitation extends Model {
    const STATUSES = ['pending', 'accepted'];

    public function sender() {
	return $this->belongsTo(User::class);
    }
}

abstract class InvitationDecorator {
    protected $invitation;
    
    public function __construct(Invitation $invitation) {
	$this->invitation = $invitation;	
    }

    // Delegations...
}

class SerializedInvitation extends InvitationDecorator {
    public function toParam() {
	// Serialization logic
    }
}

class InvitationMailer extends InvitationDecorator {
    const EMAIL_REGEX = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';

    public function deliver() {
	// Mail delivery logic 
    }
}
