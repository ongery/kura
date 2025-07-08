<?php
namespace App\Exports\SharedHelpers;

use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ExportHelper
{

    public function __construct(string $headerRow, $busineesUnitObjectives =null, string $businessUnitName=null)
    {
        $this->businessUnitName = $businessUnitName;
        $this->headerRow = $headerRow;
        $this->busineesUnitObjectives = $busineesUnitObjectives;
    }

    public function registerEventsHelper()
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {

                $highestRow = $event->sheet->getHighestRow();

                //Merge Place Holder for Logo
                $event->sheet->getDelegate()->mergeCells("B2:B7");

                $event->sheet->getStyle('B2')
                    ->getAlignment()
                    ->setWrapText(true);

                $event->sheet->getDelegate()->mergeCells("B10:J10");
                $event->sheet->setCellValue('B10', $this->businessUnitName);
                $event->sheet->getStyle('B10')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FF35CBBF');

                //Placing Business Unit Objectives

                $totalBusinessUnitsObjectives = count($this->busineesUnitObjectives);
                $startingCellForPlaceingBusinessUnitObjectives = 11;

                for ($i = 0; $i < $totalBusinessUnitsObjectives; $i++) {
                    $description = ($this->busineesUnitObjectives[$i]['description']);
                    $event->sheet->setCellValue('B' . $startingCellForPlaceingBusinessUnitObjectives, $description);

                    $startingCellForPlaceingBusinessUnitObjectives++;
                }

                //Change Background Header Row
                $event->sheet->getStyle('A' . $this->headerRow . ':J' . $this->headerRow)
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FF35CBBF');

                for ($row = 2; $row <= $highestRow; ++$row) {

                    $inherentValue = $event->sheet->getCellByColumnAndRow(5, $row)->getValue();

                    info($inherentValue);
                    if ($inherentValue && is_numeric($inherentValue)) {
                        $event->sheet->getCellByColumnAndRow(5, $row)->getStyle()
                            ->applyFromArray($this->inherentValueColors($inherentValue));
                    }

                    $residualValue = $event->sheet->getCellByColumnAndRow(7, $row)->getValue();
                    if ($residualValue && is_numeric($residualValue)) {

                        $event->sheet->getCellByColumnAndRow(7, $row)->getStyle()
                            ->applyFromArray($this->inherentValueColors($residualValue));
                    }

                }

            },
        ];
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
