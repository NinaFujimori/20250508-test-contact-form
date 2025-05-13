<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
      $categories = Category::all();
      return view('index',compact('categories'));
    }

    public function confirm(ContactRequest $request){
      $contact = $request->only(['last_name','first_name','gender', 'email', 'tel_first', 'tel_second','tel_third','address','building','category_id', 'detail']);

      $category = Category::find($contact['category_id']); 
      $contact['category_name'] = $category ? $category->content : '未設定';

      return view('confirm',compact('contact'));
    }

    public function store(ContactRequest $request){
      $contact = $request -> only(['last_name','first_name','gender', 'email', 'tel_first', 'tel_second','tel_third','address','building','category_id', 'detail']);
      Contact::create($contact);
      return view('thanks');
    }

    
}
