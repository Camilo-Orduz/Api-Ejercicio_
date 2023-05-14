<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schools;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $schools = Schools::all();
            return response()->json($schools, 200);
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
            $school = Schools::create($request->all());
            return response()->json($school, 201);
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
            $school = Schools::find($id);
            return response()->json($school, 200);
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
            $school = Schools::find($id)->update($request->all());
            return response()->json($school, 200);
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
            $school = Schools::find($id)->delete();
            return response()->json([
                'message' => 'Escuela eliminada con exito!'
            ], 202 );
        } catch (\Throwable $th){
            return response()->json([
                'errors' => $th
            ], 400);
        }
    }

    public function solution3($School_id) {
        try {
          $schools = Schools::select('name')->where('country_id', $School_id)->get();
          return response()->json([
             $schools
          ],200);
        } catch (\Throwable $th) {
          return response()->json([     
              'errors'=> $th
           ],400);
        }
    }

    public function solution8() {
        try {
          $schools = Schools::select('schools.name', Schools::raw('COUNT(*) as total_usuarios'))->join('users', 'users.school_id', '=', 'schools.id')
                                ->groupby('schools.name')->get();
          return response()->json([
             $schools
          ],200);
        } catch (\Throwable $th) {
          return response()->json([     
              'errors'=> $th
           ],400);
        }
    }
    

}
