<?php

namespace App\Exports;

use App\Exports\SharedHelpers\ExportHelper;
use App\Services\Transactions\RisksServices;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class QMSExport implements FromCollection, WithHeadings, WithEvents, WithCustomStartCell, WithDrawings, ShouldAutoSize
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

        $BunitID = Auth::user()->BunitID;
        $newArr = (new RisksServices())->getQmsRegisterData($BunitID);

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
            'Procedure Number',
            'Procedure Title',
            'Risk Event',
            'I.R',
            'R.R',
            'Opportunies',
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
