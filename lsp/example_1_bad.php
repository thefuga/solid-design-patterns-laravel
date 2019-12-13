<?php

class Signup {
    public function __construct($attributes) {
	$this->attributes= $attributes;
    }

    public function save() {
	$account = Account::create($this->attributes["account"]);	

	return $account->users->create($this->atributes);	
    }
}

// Subclass violates LSP by changing the save method.
class InvitationSignup extends Signup {
    public function save($invitation) {
	$user = parent::save();
	$invitation->accept($user);

	return $user;
    }
}

// Callers must check before calling the save method to decide if a parameter
// should be passed.
class SignupController extends BaseController {
    public function store(Request $request) {
	$signup = $this->buildSignup($request);

       	if ($request->has("invitation_id")) {
	    $invitation = Invitation::find($request->invitation_id);
	    $signup->save($invitation);

	    return view('signup');
	} 

	$signup->save();

	return view('signup');
    } 

    private function buildSignup(Request $request) {
	if($request->has("invitation_id")){
	    return new InvitationSignup($request->getContent());
	}

	return new Signup($request->getContent());
    }
}

