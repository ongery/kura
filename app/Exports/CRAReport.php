<?php

namespace App\Exports;

use App\Services\Transactions\CorruptionManagementModuleService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class CRAReport implements FromCollection, WithHeadings, WithEvents, WithCustomStartCell, WithDrawings, ShouldAutoSize, WithMapping
{

    public function __construct($exportRequiredData)
    {
        $this->headerRow = $exportRequiredData['headerRow'];
        $this->withType = 1;
    }

    public function collection()
    {

        $newArr = (new CorruptionManagementModuleService())->prepareCRAreport();

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
            'Corruption Prone Area',
            'Risks',
            'Corruption Prevention Strategies',
            'Activities',
            'Budget',
            'Time Frame',
        ];
    }

    public function map($record): array
    {
        return [
            $record["Count"],
            $record['MainRiskName'],
            $record['RiskName'],
            $record['TreatmentsPlans'],
            $record['Activity'],
            $record['Budget'],
            $record['TimeFrame'],
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [];
    }

}
