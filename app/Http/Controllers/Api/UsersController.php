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
    public function solution4($User_id) {
        try {
          $users = User::select('users.names','users.lastnames','schools.name as escuela')->join('schools','users.school_id', '=', 'schools.id')->where('schools.id', $User_id)->get();
          return response()->json([
             $users
          ],200);
        } catch (\Throwable $th) {
          return response()->json([     
              'errors'=> $th
           ],400);
        }
    }
    public function solution5($User_id) {
        try {
          $users = User::select('users.names','users.lastnames','countries.name as pais')->join('departaments','users.departament_id', '=', 'departaments.id')
                                                                                        ->join('countries', 'departaments.country_id', '=', 'countries.id')
                                                                                        ->where('countries.id', $User_id)->get();
          return response()->json([
             $users
          ],200);
        } catch (\Throwable $th) {
          return response()->json([     
              'errors'=> $th
           ],400);
        }
    }

    public function solution6(){
        try{
            $users = User::select('users.names', 'users.lastnames', 'users.email')->where('users.email', 'LIKE', '%gmail.com')->get();
            return response()->json([$users], 200);
        }catch (\Throwable $th) {
        return response()->json([     
            'errors'=> $th
            ],400);
              
        }
    }

    
    public function solution7(){
        try{
            $users = User::select('users.names', 'users.lastnames', User::raw('DATEDIFF(CONCAT(YEAR(CURDATE()), "-", MONTH(date_birth), "-", DAY(date_birth)), CURDATE()) as dias_faltantes_para_cumplir_años'))->get();
            return response()->json([$users], 200);
        }catch (\Throwable $th) {
        return response()->json([     
            'errors'=> $th
            ],400);
              
        }
    }
}
