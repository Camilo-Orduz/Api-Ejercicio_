<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departaments;

class DepartamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $departaments = Departaments::all();
            return response()->json($departaments, 200);
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
            $departament = Departaments::create($request->all());
            return response()->json($departament, 201);
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
            $departament = Departaments::find($id);
            return response()->json($departament, 200);
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
            $departament = Departaments::find($id)->update($request->all());
            return response()->json($departament, 200);
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
            $departament = Departaments::find($id)->delete();
            return response()->json([
                'message' => 'Departamento eliminado con exito!'
            ], 202 );
        } catch (\Throwable $th){
            return response()->json([
                'errors' => $th
            ], 400);
        }
    }
    public function solution1($countrie_id) {
        try {
          $departments = Departaments::select('name')->where('country_id', $countrie_id)->get();
          return response()->json([
             $departments
          ],200);
        } catch (\Throwable $th) {
          return response()->json([
              'errors'=> $th
           ],400);
        }
  }
    public function solution2($countrie_id) {
        try {
          $departaments = Departaments::select('name')->where('country_id', $countrie_id)->count();
          return response()->json([
             $departaments
          ],200);
        } catch (\Throwable $th) {
          return response()->json([
              'errors'=> $th
           ],400);
        }
    }
}
