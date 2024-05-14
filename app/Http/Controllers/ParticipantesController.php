<?php
namespace App\Http\Controllers;
use App\Models\Participante;
use Illuminate\Http\Request;
class ParticipantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 10);
        $filtro = $request->input('filtro', null);
        $sortBy = $request->input('ordenar', 'created_at');
        $query = Participante::query();
        if ($filtro != null) {
            $query->where('nombres', 'like', '%' . $filtro . '%');
        }
        $participantes = $query->orderBy($sortBy, 'ASC')->paginate($perPage, ['*'], 'page', $page);
        //$participantes->appends($request->all());
        return $participantes;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $usuario = $request->attributes->get('usuario');
        $rol = $usuario->user->rol;
        if ($rol == 'admin') {

        $participante = Participante::create($request->all());
        return $participante;
        }
        else 
        {
            return response()->json(['error'=>'No tiene permisos para realizar esta acción.'],403);
        }
        

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $participante = Participante::find($id);
        return $participante;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $participante = Participante::find($id);
        $participante->update($request->all());
        return $participante;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $participante = Participante::find($id);
        $participante->delete();
        return $participante;
    }
}
