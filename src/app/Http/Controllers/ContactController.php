<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
  public function index()
  {
    return view('index');
  }

  public function confirm(ContactRequest $request)
  {
    $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'code', 'address', 'building', 'content']);
    return view('confirm', compact('contact'));
  }

  public function store(ContactRequest $request)
  {
      if($request->input('back') == 'back'){
          return redirect('/')
                      ->withInput();
      }  
    
    $contact = $request->only(['fullname', 'gender', 'email', 'code', 'address', 'building', 'content']);
     Contact::create($contact);
     return view('thanks');
  }

}
