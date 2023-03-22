<?php

namespace App\Exports;

use App\Models\Control;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class ControlExport implements FromCollection, WithHeadings, WithStyles,  WithColumnWidths
{
    private $fecha;

    public function __construct($fecha)
    {
        $this->fecha = $fecha;
    }

    public function collection()
    {
        if($this->fecha){
            return Control::select('controls.id', 'vehicles.placa', 'vehicles.nombre_completo', 'controls.ingreso', 'controls.salida')
                    ->join('vehicles', 'vehicles.id', '=', 'controls.id_vehicle')
                    ->where('controls.fecha', $this->fecha)
                    ->orderBy('controls.id', 'desc')
                    ->get();
        }else{
            return Control::select('controls.id', 'vehicles.placa', 'vehicles.nombre_completo', 'controls.ingreso', 'controls.salida')
                    ->join('vehicles', 'vehicles.id', '=', 'controls.id_vehicle')
                    ->orderBy('controls.id', 'desc')
                    ->get();
        }
    }

    public function headings(): array
    {
        return ["ID", "Placa", "Apellidos y Nombre", "Hora Ingreso", "Hora Salida"];
    }

    public function styles(Worksheet $sheet)
    {
        // Add styling to header row
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => [
                'bold' => true,
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'F8CBAD',
                ],
            ],
        ]);

        // Add styling to data rows
        $lastRow = $sheet->getHighestRow();
        $sheet->getStyle('A2:E'.$lastRow)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => [
                        'rgb' => '000000',
                    ],
                ],
            ],
        ]);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 20,
            'C' => 50,
            'D' => 20,
            'E' => 20,
        ];
    }
}
