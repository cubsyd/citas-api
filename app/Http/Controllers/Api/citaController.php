<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cita;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Listar todas las citas.
     */
    public function index()
    {
        return Cita::all();
    }

    /**
     * Crear una nueva cita.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_paciente' => 'required|string|max:255',
            'nombre_medico'   => 'required|string|max:255',
            'fecha'           => 'required|date',      // antes tenías "date"
            'hora_cita'       => 'required|string',
            'motivo'          => 'nullable|string',
            'estado'          => 'required|in:pendiente,confirmada,cancelada',
        ]);

        $cita = Cita::create($data);

        return response()->json($cita, 201);
    }

    /**
     * Mostrar una cita específica.
     */
    public function show(Cita $cita)
    {
        return $cita;
    }

    /**
     * Actualizar una cita.
     */
    public function update(Request $request, Cita $cita)
    {
        $data = $request->validate([
            'nombre_paciente' => 'sometimes|required|string|max:255',
            'nombre_medico'   => 'sometimes|required|string|max:255',
            'fecha'           => 'sometimes|required|date',
            'hora_cita'       => 'sometimes|required|string',
            'motivo'          => 'nullable|string',
            'estado'          => 'sometimes|required|in:pendiente,confirmada,cancelada',
        ]);

        $cita->update($data);

        return $cita;
    }

    /**
     * Eliminar una cita.
     */
    public function destroy(Cita $cita)
    {
        $cita->delete();

        return response()->json([
            'message' => 'Cita eliminada correctamente',
        ]);
    }
}