<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use  Illuminate\Support\Str;

class UserController extends Controller
{
    public $title = 'User';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(8);
        $title = $this->title;
        return view('admin.users.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = $this->title;
        $password_generate = Str::password(12);
        $roles = array_reverse(User::getRole(), true);
        return view('admin.users.create', compact('title', 'password_generate', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $title = $this->title;
        $user = User::firstOrCreate($data);
        return view('admin.users.show', compact('user', 'title'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $title = $this->title;
        return view('admin.users.show', compact('user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = array_reverse(User::getRole(), true);
        $title = $this->title;
        return view('admin.users.edit', compact('user', 'title', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $title = $this->title;
        $data = $request->validated();
        $user->update($data);
        return view('admin.users.show', compact('title', 'user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
