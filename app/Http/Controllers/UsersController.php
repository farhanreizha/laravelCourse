<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Users;
use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    public function login_form()
    {
        return view('login');
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => ['required', 'max:255', 'min:5'],
            'password' => ['required', 'max:255', 'min:5'],
        ]);
        $users = Users::where('username', $request->username)->first();
        if ($users == null) {
            toast('Account not found', 'error');
            return redirect()->back();
        }

        $db_password = $users->password;
        $hashed_password = Hash::check($request->password, $db_password);

        if ($hashed_password) {
            $users->token = Str::random(20);
            $users->save();
            $request->session()->put('token', $users->token);
            return to_route('dashboard_index');
        } else {
            toast('username or password not valid', 'error');
            return redirect()->back();
        }
    }

    public function register_form()
    {
        return view('register'); 
    }

    public function register_action(Request $request)
    {
        $request->validate([
            'username' => ['required', 'max:255', 'min:5'],
            'password' => ['required', 'max:255', 'min:5'],
        ]);
        Users::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);
        $users = Users::where('username', $request->username)->first();

        $db_password = $users->password;
        $hashed_password = Hash::check($request->password, $db_password);

        if ($hashed_password) {
            $users->token = Str::random(20);
            $users->save();
            $request->session()->put('token', $users->token);
            toast('Register Success', 'success');
            return to_route('dashboard_index');
        }
        toast('Register Success', 'success');
        return to_route('login_form');
    }

    public function dashboard_index()
    {
        if (Session::has('token')) {
            $users = Users::where('token', Session::get('token'))->first();
            $articles = Articles::get();
            return view('Dashboard/index', [
                "title" => "Dashboard Admin",
                "users" => $users,
                "articles" => $articles,
            ]);
        } else {
            return redirect()->back();
        }
    }

    public function dashboard_logout(Request $request)
    {
        Users::where('token', $request->token)->update([
            'token' => NULL
        ]);
        Session::pull('token');
        return to_route('login_form');
    }

    public function article_delete_action(Request $request)
    {
        Articles::find($request->id)->delete();
        toast('Article Hasbeen Deleted', 'success');
        return redirect()->back();
    }

    public function article_add_action(ArticleCreateRequest $request)
    {
        $created = Articles::create([
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tag,
        ]);
        if ($created) {
            toast('Atricle hasbeen added', 'success');
            return redirect()->back();
        } else {
            toast('Article cant added','error');
            return redirect()->back();
        }
    }

    public function article_edit($id)
    {
        $users = Users::where('token', Session::get('token'))->first();
        return view('Dashboard/editarticle', [
            'title' => 'Edit Article',
            'article' => Articles::find($id),
            'users' => $users,
        ]);
    }

    public function article_edit_action(ArticleUpdateRequest $request)
    {
        $update = Articles::where('id', $request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'tag' => $request->tag,
        ]);
        if ($update) {
            toast('Article Updated', 'success');
            return to_route('dashboard_index');
        } else {
            toast('Article Updated Failed', 'error');
            return redirect()->back();
        }
    }
}
