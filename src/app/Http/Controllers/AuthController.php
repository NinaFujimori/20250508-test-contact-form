<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\Category;

class AuthController extends Controller
{
    /*新規登録ページを表示する記述*/ 
    public function indexRegister(){
        return view('register');
    }

    /*新規登録後ログイン画面を表示する記述*/ 
    public function register(Request $request)
    {
        app(CreateNewUser::class)->create($request->all());
        return redirect('/login');
    }

    /*ログイン画面を表示する記述*/ 
    public function indexLogin(){
        return view('login');
    }

    /*管理画面を表示する記述*/ 
    public function index()
    {
        $contacts = Contact::with('category')->Paginate(7);
        $categories = Category::all();

        $category = Category::find($contact['category_id']); 
        $contact['category_name'] = $category ? $category->content : '未設定';

        return view('admin', ['contacts' => $contacts, 'categories' => $categories]);
    }

    /*ログアウトの記述*/ 
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        /*以下は安全のための記述*/
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function destroy($id){
        Contact::findOrFail($id)->delete();
        return redirect()->back()->with('message', '削除しました');
    }

    public function search(Request $request){
        $contacts = Contact::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)
        ->GenderSearch($request->gender)
        ->DateSearch($request->date)
        ->paginate(7);
        $categories = Category::all();

        return view('admin', compact('contacts', 'categories'));
    }

}
