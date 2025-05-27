<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class MongoPingController extends Controller
{
    public function ping()
    {
        try {
            // Intentar obtener la lista de bases de datos como prueba de conexión
            $databases = DB::connection('mongodb')->getMongoClient()->listDatabases();
            return response()->json(['status' => 'success', 'message' => 'Conexión a MongoDB exitosa.']);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Error de conexión a MongoDB', 'error' => $e->getMessage()], 500);
        }
    }
}
