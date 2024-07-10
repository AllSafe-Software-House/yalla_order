<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Style;




class TableExport implements FromCollection, WithHeadings ,WithStyles , WithColumnWidths
{
    protected $transactions;

    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->transactions->map(function ($transaction) {
            return [
                $transaction->user->name,
                $transaction->user->phone,
                $transaction->numberOrder,
                $transaction->place->name,
                $transaction->price,
                $transaction->Qty,
                $transaction->status == '1' ? 'IN Tracking' : ($transaction->orderTrake->deliverd_statue == '1' ? 'Done' : 'IN Tracking'),
                $transaction->pay_method,
                $transaction->created_at,

            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'User Name',
            'User Phone',
            'Order Number',
            'Place Name',
            'Price',
            'Qty',
            'Status',
            'Payment Method',
            'Date'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'color' => ['argb' => 'FD7E7E']]],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 30,
            'C' => 30,
            'D' => 30,
            'E' => 30,
            'F' => 30,
            'G' => 30,
            'H' => 30,
            'I' => 30,
        ];
    }
}
