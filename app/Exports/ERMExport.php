<?php

namespace App\Exports;

use App\Exports\SharedHelpers\ExportHelper;
use App\Services\Transactions\RisksServices;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ERMExport implements FromCollection, WithHeadings, WithEvents, WithCustomStartCell, WithDrawings, ShouldAutoSize
{

    public function __construct($exportRequiredData)
    {
        $this->businessUnitName = $exportRequiredData['businessUnit']->Name;
        $this->headerRow = $exportRequiredData['headerRow'];
        $this->withType = 1;
        $this->busineesUnitObjectives = $exportRequiredData['businessUnitObjectives'];
    }

    public function collection()
    {

        $newArr = (new RisksServices())->getERMData();
        return collect($newArr);

    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('/img/KURAlogo.png'));
        $drawing->setHeight(101);
        $drawing->setCoordinates('B2');

        return $drawing;
    }

    public function startCell(): string
    {

        return 'A' . $this->headerRow;
    }

    public function headings(): array
    {
        return [
            '#',
            'Main Risk Event',
            'I.R',
            'R.R',
            'Risk Event',
            'I.R 1',
            'R.R 1',
            'Risk Source',
            'Risk Impacts',
            'Current Controls',
            'K.C.I',
            'K.R.I',
            'Treatment plans',
            'Action Status',
        ];
    }

    public function map($invoice): array
    {
        return [
            $invoice->RiskName,
            $invoice->RiskSource,
            $invoice->InherentValue,
            $invoice->ResidualValue,
            $invoice->TotalQuestions,
            $invoice->NonCompliance,
            $invoice->TotalKRIs,
            $invoice->RedKRIs,
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return (new ExportHelper($this->headerRow, $this->busineesUnitObjectives, $this->businessUnitName))
            ->registerEventsHelper();

    }

}
