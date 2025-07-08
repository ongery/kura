<?php

namespace App\Exports;

use App\Exports\SharedHelpers\ExportHelper;
use App\Models\Incident;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class IncidentExport implements FromCollection, WithHeadings, WithEvents, WithCustomStartCell, WithDrawings, ShouldAutoSize, WithMapping
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

        return Incident::with('creator')->latest()->get();
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
            "#",
            'Name',
            'Description',
            'Date Incidence Reported',
            'Date Incidence Reported',
            'Related Risk Event',
            'Action',
            'Status',
        ];
    }

    public function map($invoice): array
    {
        return [
            "#",
            $invoice->Title,
            $invoice->Description,
            $invoice->IncidentReportOn,
            $invoice->IncidentDate,
            $invoice->RiskName ?? null,
            $invoice->RiskAction ?? null,
            $invoice->ActionStatus ?? null,
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
