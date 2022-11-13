<?php

namespace App\Http\Controllers;

use App\Models\User;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.daftarPengguna', ['user' => User::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required', 'string'],
            'birthdate' => ['required', 'date', 'before:today'],
            'phoneNumber' => ['required'],
        ],
            [
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username telah digunakan',
                'birthdate.before' => 'Tanggal lahir harus diisi sebelum hari ini',
            ]);

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'phoneNumber' => $request->phoneNumber,
        ]);

        return to_route('user');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.infoPengguna', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllUser()
    {
        $users = DB::table('users')
            ->select(
                'id as id',
                'fullname',
                'email',
                'address',
                'birthdate',
                'phoneNumber'

            )
            ->orderBy('fullname', 'asc')
            ->get();

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                $html = '
                <button data-rowid="" class="btn btn-xs btn-light" data-toggle="tooltip" data-placements="top" data-container="body" title="Edit User" onclick="infoUser(' . "'" . $user->id . "'" . ')">
                <i class="fa fa-edit"></i>
                ';
                return $html;
            })
            ->make(true);
    }
}
