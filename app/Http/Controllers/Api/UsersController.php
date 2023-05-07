<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $users = User::all();
            return response()->json($users, 200);
        } catch (\Throwable $th){
            return response()->json([
                'errors' => $th
            ], 403);
        }
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
        try{
            $user = User::create($request->all());
            return response()->json($user, 201);
        } catch (\Throwable $th){
            return response()->json([
                'errors' => $th
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $user = User::find($id);
            return response()->json($user, 200);
        } catch (\Throwable $th){
            return response()->json([
                'errors' => $th
            ], 400);
        }
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
        try{
            $user = User::find($id)->update($request->all());
            return response()->json($user, 200);
        } catch (\Throwable $th){
            return response()->json([
                'errors' => $th
            ], 400);
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
        try{
            $user = User::find($id)->delete();
            return response()->json([
                'message' => 'Usuario eliminado con exito!'
            ], 202 );
        } catch (\Throwable $th){
            return response()->json([
                'errors' => $th
            ], 400);
        }
    }
}
