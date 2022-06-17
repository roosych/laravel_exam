<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('home.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //сделать валидацию после тестирования
        $validData = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::create($request->all());

        return redirect()->route('users.index')->with('success', 'Пользователь создан');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // Из-за того что получаем полностью юзера, можно не прописывать переменную, и сразу в методе compact передать
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        // Из-за того что получаем полностью юзера, можно не прописывать переменную, и сразу в методе compact передать
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


    // Custom methods

    public function media(User $user)
    {

        return view('user.media', compact('user'));
    }

    public function uploadAvatar(Request $request, User $user)
    {

    }

    public function security(User $user)
    {

        return view('user.security', compact('user'));
    }

    public function editEmail(Request $request, User $user)
    {

    }

    public function editPass(Request $request, User $user)
    {

    }

    public function status(User $user)
    {

        return view('user.status', compact('user'));
    }

    public function setStatus(Request $request, User $user)
    {

    }
}
