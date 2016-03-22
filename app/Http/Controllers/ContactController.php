<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\ContactFormRequest;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ContactController extends Controller {

	public function create()
    {
        return view('contact.index');
    }

    public function store(ContactFormRequest $request)
	{

		\Mail::send('emails.contact',
			array(
				'name' => $request->get('name'),
				'email' => $request->get('email'),
				'user_message' => $request->get('message')
			), function($message)
		{
			$message->from('hello@islandtavernerscc.co.uk');
			$message->to('alexshearcroft@gmail.com', 'Test')->subject('Test');
		});

		return \Redirect::route('contact')->with('message', 'Thanks for contacting us!');

	}

}