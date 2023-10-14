<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
  public function management(Request $request)
  {

  $contacts = Contact::Getdatefrom($request->from)->Getdateuntil($request->until)
  ->Getgender($request->gender)->Getname($request->name)->Getemail($request->email)
  ->get();

    // return view('management', compact('contacts','request'));
    return view('management', ['contacts'=>$contacts->toQuery()->paginate(10),'request'=>$request]);

  }

  public function destroy(Request $request)
  {
      Contact::find($request->id)->delete();
      return redirect('/management')->with('message', '削除しました');
  }

}
