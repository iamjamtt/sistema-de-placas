<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Control;
use App\Models\Vehiculo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function index()
    {
        $vehiculos_count = Vehiculo::count();
        $control_days_count = Control::where('fecha', today())->count();
        $control_week_count = Control::whereBetween('fecha', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $contol_month_count = Control::whereMonth('fecha', Carbon::now()->month)->count();

        $control_barra = Control::select('fecha', Control::raw('count(control_id) as cantidad'))
                ->groupBy('fecha')
                ->orderBy(Control::raw('count(control_id)'), 'DESC')
                ->take(5)->skip(0)->get();

        $count = [];

        foreach ($control_barra as $item) {
            $count[] = ['label' => date('d/m/Y', strtotime($item->fecha)), 'data' => $item->cantidad];
        }

        if ($count == null) {
            $count[] = ['label' => 'No se encontro datos', 'data' => 0];
        }

        $data = json_encode($count);

        return view('dashboard.index', [
            'vehiculos_count' => $vehiculos_count,
            'control_days_count' => $control_days_count,
            'control_week_count' => $control_week_count,
            'contol_month_count' => $contol_month_count,
            'data' => $data,
        ]);
    }
}
