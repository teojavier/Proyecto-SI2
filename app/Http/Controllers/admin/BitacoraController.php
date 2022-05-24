<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Bitacora;
use App\Models\Configuration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;
use Response;


class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = DB::table('activity_log')
              ->join('users', 'activity_log.causer_id', '=', 'users.id')->select('activity_log.*', 'users.name')->get();

        
        return view('admin.Bitacora.index', compact('actividades'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function downloadTxt( Request $request)
    {
        $content = "";
        $configuracion = Configuration::find(1);
        $datas = Bitacora::all();
        $users = User::all();
        $DateAndTime = date('m-d-Y h:i:s a', time()); 

        $content = "        		REGISTRO DE BITACORA        \n";
        
        $content .= "\n";
        $content .= "EMPRESA: $configuracion->razon_social                       NIT  :2995623 \n";
        $content .= 'FECHA DE IMPRESION='.  $DateAndTime.'                      TELFONO :'. $configuracion->telefono ;
        $content .= "                                                    \n";
        $content .= "\n";
        $content .= "_ID_|USUARIO|ACCION|TABLA|ID AFECTADO|FECHA-HORA|DIRECCION-IP \n";
        $content .= "\n";
        $content .= "-----------------------------LOG----------------------------------\n";

        
        foreach ($datas as $data) {
            foreach ($users as $user) {
                if ($data->id_user == $user->id) {
                    $content .= $data->id . '|' . $user->name .'|' . decrypt($data->accion). '|' . decrypt($data->apartado)  . '|' . decrypt($data->afectado) . '|' . decrypt($data->fecha_h) . '|' . decrypt($data->ip) .PHP_EOL;
                }
            }

        }
        $content .= "----------------------------END_LOG-------------------------------\n";

        $fileName = "LOG_BITACORA.log";

        return Response::make($content, 200, [
            'Content-type' => 'text/plain',
            'Content-Disposition' => sprintf('attachment; filename="%s"', $fileName),
            'Content-Length' => strlen($content)
        ]);
    }
}
