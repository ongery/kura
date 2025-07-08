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
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class KeyRiskIndicatorRegisterExport implements FromCollection, WithHeadings, WithEvents, WithCustomStartCell, WithDrawings, ShouldAutoSize, WithMapping
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

        $newArr = (new RisksServices())->getKeyRiskIndicatorRegisterData($this->withType);

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
            'Risk Event',
            'R.R',
            'Key Risk Indicators',
            'Frequency',
            'Reponsebility',
            'Value',
            'Actions',
            'Status',
        ];
    }

    public function map($record): array
    {

        return [
            $record["Count"],
            $record["RiskName"],
            $record["ResidualValue"],
            $record["KRIitems"],
            $record["Frequency"],
            $record["Responsibility"],
            $record["Value"],
            $record["actionName"],
            $record["actionStatus"],
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
