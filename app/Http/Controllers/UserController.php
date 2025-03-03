<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\HttpException;

class UserController extends Controller
{
    /**
     * Create the controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortByDesc('updated_at');

        return view('pages.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $userroles = $user->roles()->get(['id', 'title', 'description']);

        return view('pages.users.show', [
            'user' => $user,
            'userroles' => $userroles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userRoles = [];

        $user = User::find($id);

        if ($user) $userRoles =  $user->roles()->get(['id'])->toArray();

        $roles = Role::all();

        return view('pages.users.edit', [
            'user' => $user,
            'user_roles' =>  array_map(fn ($userrole) => $userrole['id'], $userRoles),
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!$user) throw new HttpException('user-not-found', 400);

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->department = $request->input('department');
        // $user->email = $request->input('email');

        $saved = $user->save();

        if (!$saved) throw new HttpException('user-saved-failed', 500);

        $roles = Role::whereIn('id', $request->input('roles'))->get();

        $user->syncRoles($roles);

        return redirect()->route('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if (!$user) throw new HttpException('user-not-found', 400);

        $softDelete = $user->delete();

        if (!$softDelete) throw new HttpException('user-not-deleted', 500);

        return redirect()->route('users.index');
    }
}
