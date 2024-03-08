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
        return response()->json(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'notes' => 'required'
        ]);

        $data['password'] = bcrypt('password');

        try {
            $user = User::create($data);

            if (!$user) {
                throw new \Exception('Error creating new User');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creating new User'], );
        }

        $user->fresh();

        return response()->json(['user' => $user]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json($user);
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
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'notes' => 'required'
        ]);

        try {
            $ret = $user->update($data);

            if (!$ret) {
                throw new \Exception('Error creating new User');
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error updating User'], );
        }

        return response()->json(['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
