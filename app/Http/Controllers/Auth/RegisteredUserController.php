<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    
    public function createByAdmin(): View
    {
        return view('add_user');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'picture' => ['required', 'mimes:jpeg,png,jpg'],
        ]);

        $file = $request->file('picture');
        $filename = uniqid() . "_" . $file->getClientOriginalName();
        $file->storeAs('public/', $filename);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => $filename
        ])->assignRole('user');

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    public function storeByAdmin(Request $request): RedirectResponse
    {
        try{
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string'],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ])->assignRole($request->role);

        event(new Registered($user));

        return redirect('/user_list')->with('success', 'User Ditambahkan');
        
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors(['msg' => $th->getMessage()]);
        }
    }

    public function editByAdmin(Request $request, string $id){
        try{

            $user = User::find($id);
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $user->id],
                'role' => ['required', 'string'],
            ]);
            
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $user->syncRoles($request->role);

            return redirect('/user_list')->with('success', 'User telah diedit');
    } catch (\Throwable $th) {
        return back()->withInput()->withErrors(['msg' => $th->getMessage()]);
    }
    }

    public function deleteByAdmin(Request $request, string $id){
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('success', 'user berhasil di hapus');
    }
}
