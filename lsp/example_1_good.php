<?php

// Subclass follows LSP. The invitation depencency is now injected in the constructor.
class InvitationSignup extends Signup {
    public function __construct($attributes, Invitation $invitation) {
	parent::__construct($attributes);
	$this->invitation = $invitation;	
    }

    public function save() {
	$user = parent::save();
	$this->invitation->accept($user);

	return $user;
    }
}

// Callers must decide only which class to create, not how to call it's methods.
class SignupController extends BaseController {
    public function store(Request $request) {
	$this->buildSignup($request)->save(); 

	return view('signup');
    }

    private function buildSignup(Request $request) {
	if($request->has("invitation_id")){
	    $invitation = Invitation::find($request->invitation_id);

	    return new InvitationSignup($request->getContent(), $invitation);
	}

	return new Signup($request->getContent());
    }
}
