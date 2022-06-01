<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('logged-in')) {
             dd('Access Denied');
        }
        //$users = User::all();
        return view('admin.users.index', ["users"=> User::paginate(40)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view("admin.users.create", ['roles' => Role::all()]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {



        $validateData = $request->validated();
        $user = User::create($validateData);
        $user->roles()->sync($request->roles);
        if ($validateData)
        {
            $request->session()->flash('success', "User has been created");
        }
        return redirect(route('admin.users.index'));
        // dd($request);
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.users.edit',
            [
                'roles'=>Role::all(),
                'user'=>User::find($id)
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
        if(!$user)
            {
                $request->session()->flash('error', "Not found");
                return redirect(route('admin.users.index'));
            }
        else
    {
        $user->update($request->except(['_token', 'roles']));
        $user->roles()->sync($request->roles);
        $request->session()->flash('success', "User has been edited");
        return redirect(route('admin.users.index'));
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request = request();
        User::destroy($id);
        $request->session()->flash('success', "User has been deleted");
        return back()->withInput();
        // return redirect(route('admin.users.index'));
    }
}
