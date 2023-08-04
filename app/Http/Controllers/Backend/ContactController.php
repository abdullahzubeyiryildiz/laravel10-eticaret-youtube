<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
  public function index () {
    $contacts = Contact::paginate(20);
    return view('backend.pages.contact.index',compact('contacts'));
  }

  public function edit($id) {
    $contact = Contact::where('id',$id)->firstOrFail();
    return view('backend.pages.contact.edit',compact('contact'));
  }

  public function update(Request $request, $id) {
    $update = $request->status;
    Contact::where('id',$id)->update(['status'=>  $update]);
    return back()->withSuccess('Başarıyla Güncellendi');
  }

  public function destroy(Request $request)
  {

      $contact = Contact::where('id',$request->id)->firstOrFail();

      $contact->delete();
      return response(['error'=>false,'message'=>'Başarıyla Silindi.']);
  }

  public function status(Request $request) {

      $update = $request->statu;
      $updatecheck = $update == "false" ? '0' : '1';

      Contact::where('id',$request->id)->update(['status'=> $updatecheck]);
      return response(['error'=>false,'status'=>$update]);
  }
}
