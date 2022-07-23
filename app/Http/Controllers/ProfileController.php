<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Psychologist;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private function setLang()
    {
        if (session()->has('locale')) {
            app()->setLocale(session()->get('locale'));
        } else {
            app()->setLocale('en');
        }
    }

    public function index()
    {
        $this->setLang();
        $data = [
            'user' => auth()->user(),
        ];

        return view('profile.index', $data);
    }

    public function edit($id)
    {
        $this->setLang();

        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255|required',
            'email' => 'email|unique:users|string|max:255|required',
            'password' => 'string|min:8|confirmed',
            'phone' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $user = auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;

        if ($request->hasFile('image')) {
            $request->validate(
                ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240'],
            );

            $destination_path = 'public/images/users';
            $image = $request->file('image');
            $imageExt = $image->getClientOriginalExtension();
            $image_name = substr($user->id, 0, 8) . "-" . time() . "." . $imageExt;
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            $user->image = $image_name;
        }
        $user->save();

        return redirect()->route('profile')->withSuccess('Succesfully updated profile');
    }
}
