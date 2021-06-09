<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use DB;

class UserController extends Controller
{
    //*** Usuario / Configuraciones / Verificar Correo ***//
    public function prueba()
    {
        try {
            $user = User::all();

            return response()->json($user);
        } catch (\Exception $e) {
            $error = explode('Stack trace', $e);
            \Log::error("Usuario / Configuraciones / Verificar Correo -> " . $error[0]);
        } catch (\Throwable $ex) {
            $error = explode('Stack trace', $ex);
            \Log::error("Usuario / Configuraciones / Verificar Correo -> " . $error[0]);
        }
    }

    public $redReferidos3 = array();
    public $red3 = array();
    public $posicion3 = 0;
    public $nivelReferidos3 = array();
    public $ladoReferidos = array();


    //metodo de calculo de binario cron weal   
    public function my_network_records_binary2($id, $user)
    {
        // TITLE
        view()->share('title', 'Registros de Red (Por Árbol Binario)');
        // DO MENU
        view()->share('do', collect(['name' => 'network', 'text' => 'Red de Usuarios (Árbol Binario)']));

        try {
            global $redReferidos3;
            global $red3;
            global $posicion3;
            global $nivelReferidos3;
            global $ladoReferidos;

            $posicion3++;

            if ($id == 0) {
                $id = $user;
            }

            $referidosDirectos = DB::table('webp_users')
                ->select('ID', 'binary_sponsor', 'binary_side')
                ->where('binary_sponsor', '=', $id)
                ->get();

            if ($referidosDirectos != null) {
                foreach ($referidosDirectos as $referidoD) {
                    if ($id == $user) {
                        $redReferidos3[$posicion3] = $referidoD->ID;
                        $nivelReferidos3[$posicion3] = 1;
                        $ladoReferidos[$posicion3] = $referidoD->binary_side;
                    } else {
                        $redReferidos3[$posicion3] = $referidoD->ID;

                        $result = array_search($id, $redReferidos3);
                        $nivelReferidos3[$posicion3] = $nivelReferidos3[$result] + 1;
                        $ladoReferidos[$posicion3] = $ladoReferidos[$result];
                    }

                    $red3[$posicion3] = $ladoReferidos[$posicion3];

                    $this->my_network_records_binary2($referidoD->ID, $user);
                }
            }

            $valores = array_count_values($red3);
            $user_bd = User::find($user);
            $user_bd->user_left = $valores['I'];
            $user_bd->user_right = $valores['D'];
            $user_bd->save();
            return true;
        } catch (\Exception $e) {
            $error = explode('Stack trace', $e);
            \Log::error("Usuario / Mi Negocio / Red de Referidos (Árbol Binario) -> " . $error[0]);
        } catch (\Throwable $ex) {
            $error = explode('Stack trace', $ex);
            \Log::error("Usuario / Mi Negocio / Red de Referidos (Árbol Binario) -> " . $error[0]);
        }
    }

    public function conteo_binario()
    {

        for ($id = 2; $id < 3; $id++) {
            $this->my_network_records_binary2(0, $id);
        }
        return $id;
    }
}
