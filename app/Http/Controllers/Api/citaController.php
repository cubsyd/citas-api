<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class citaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cita::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_paciente' => 'required|string|max:255',
            'nombre_medico' => 'required|string|max:255',
            'date' => 'required|date',
            'hora_cita' => 'required|string',
            'motivo' => 'nullable|string',
            'estado' => 'required|in:pendiente,confirmada,cancelada',
        ]);

        $cita = Cita::create($data);

        return response()->json($cita, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $cita;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nombre_paciente' => 'sometimes|required|string|max:255',
            'nombre_medico'  => 'sometimes|required|string|max:255',
            'fecha'         => 'sometimes|required|date',
            'hora_cita'         => 'sometimes|required|string',
            'motivo'       => 'nullable|string',
            'estado'       => 'sometimes|required|in:pendiente,realizada,cancelada',
        ]);

        $cita->update($data);

        return $cita;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cita->delete();

        return reponse()->json([
            'message' => 'Cita eliminada correctamente',
        ]);
    }
}
