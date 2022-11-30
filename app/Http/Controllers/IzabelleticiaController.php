<?php

namespace App\Http\Controllers;

use App\Models\izabelleticia;
use Illuminate\Http\Request;

class IzabelleticiaController extends Controller
{
    //GET
    public function index()
    {
         //
        try {
           $izabelleticia = izabelleticia::all();
           return response()->json($izabelleticia, 200);
        } catch (\Exception $error) {
            return responde()->json($error-> getMessage(), 500);
        }
    }
   
    //CREAT
    public function store(Request $request)
    {
        try {
          izabelleticia::create($request->all());
          return response()->json('izabelleticia creat sucessfully', 201);
        } catch (\Exception $error) {
            return responde()->json($error->getMessage(), 500);
        }
    }

   
    //UPDATE
    public function update(Request $request, int $id)
    {
        try {
          $izabelleticia = izabelleticia::find($id);
          $izabelleticia->update($request->all()); 
          return response()->json('izabelleticia updated sucessfully', 201);
        } catch (\Exception $error) {
            return responde()->json($error->getMessage(), 500);
        }
    }

  //DELETE
  public function destroy($id)
  {
      //
      try {
          $izabelleticia = izabelleticia::find($id);
          $izabelleticia->delete();
          return response()->json('izabelleticia deleted successfully', 201);
      } catch (\Exception $error) {
          return response()->json($error-> getMessage(), 500);
      }
  }
}