<?php

namespace App\Exports;

use App\Exports\SharedHelpers\ExportHelper;
use App\Models\BUNIT;
use App\Services\Transactions\RisksServices;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class TreatmentPlanExport implements FromCollection, WithHeadings, WithEvents, WithCustomStartCell, WithDrawings, ShouldAutoSize, WithMapping
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
        $allowedBusinessUnits = BUNIT::pluck('id');

        $newArr = (new RisksServices())->getTreatmentPlans();

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
            'Treatment Plans',
            'Category',
            'Ranking',
            'Status',
        ];
    }

    public function map($record): array
    {

        return [
            "#",
            $record['RiskName'],
            $record['TreatmentPlan'],
            $record['Category'],
            $record['Ranking'],
            $record['Status'],
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

    /**
     * Coloring
     */

    public function inherentValueColors($inherentValue): array
    {

        $shareValues = [];

        if ($inherentValue >= 4 && $inherentValue < 15) {

            $shareValues = [
                'font' => [
                    'color' => array('rgb' => '000000'),
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFFFC107'],
                ],
            ];
        }

        if ($inherentValue >= 15) {

            $shareValues = [
                'font' => [
                    'color' => array('rgb' => '000000'),
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['argb' => 'FFEC0D0D'],
                ],
            ];

        }

        return $shareValues;
    }
}
