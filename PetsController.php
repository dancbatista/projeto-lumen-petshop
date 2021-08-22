<?php

namespace App\Http\Controllers;

use App\Pet;
use Illuminate\Http\Request;

class PetsController
{
    public function index()
    {
        return Pet::all();
    }

    public function store(Request $request)
    {
        return response()->json(Pet::create($request->all()), status: 201);
    }

    public function show(int $id)
    {
        $pet = Pet::find($id);
        if (is_null($pet)) {
            return response()->json("", status: 204);
        }
        return response()->json($pet);
    }

    public function update(int $id, Request $request)
    {
        $pet = Pet::find($id);
        if (is_null($pet)) {
            return response()->json(
                [
                    "erro" => "Recurso não encontrado!",
                ],
                status: 404
            );
        }
        $pet->fill($request->all());
        $pet->save();
    }

    public function destroy(int $id)
    {
        $numberOfResourcesRemoved = Pet::destroy($id);
        if ($numberOfResourcesRemoved === 0) {
            return response()->json(
                [
                    "erro" => "Recurso não encontrado!",
                ],
                status: 404
            );
        }
        return response()->json("", status: 204);
    }
}
