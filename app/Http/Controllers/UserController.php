<?php

namespace App\Http\Controllers;

use App\Models\Status;
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


    public function avatarExist(User $user)
    {
        if($user->avatar != null) {
            return $user->avatar;
        }
        return 'avatara net';
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::all();

        return view('user.create', compact('statuses'));
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
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if ($request->file('avatar') == null) {
            $path = "";
        } else {
            //возвращает имя файла, записываю в переменную path
            $path = $request->file('avatar')->store('avatars');
        }


        $params = $request->all();

        //записываю путь картинки в массив под ключом avatar
        $params['avatar'] = $path;

        User::create($params);

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

    }


    // Custom methods

    public function media(User $user)
    {

        return view('user.media', compact('user'));
    }

    public function security(User $user)
    {

        return view('user.security', compact('user'));
    }

    public function status(User $user)
    {
        $statuses = Status::all();
        return view('user.status', compact('user', 'statuses'));
    }

    public function setStatus(Request $request, User $user)
    {
        User::where('id', $user->id)->first()->update(['status_id' => $request['status_id']]);

        return redirect()->back()->with('success', 'Статус изменен');
    }

    public function editInfo(Request $request, User $user)
    {
        dd($request->all());
    }

}
