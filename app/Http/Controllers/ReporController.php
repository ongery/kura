<?php

namespace App\Http\Controllers;

use App\Exports\CRAReport;
use App\Exports\ERMExport;
use App\Exports\IncidentExport;
use App\Exports\KeyRiskIndicatorRegisterExport;
use App\Exports\QMSExport;
use App\Exports\RiskExport;
use App\Exports\StrategicExport;
use App\Exports\TreatmentPlanExport;
use App\Models\BUNIT1;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ReporController extends Controller
{
    private function getBusinessUnitDetails()
    {
        // Get the authenticated user's business unit
        $businessUnit = Auth::user()->bunit;
        #$businessUnit = BUNIT::all();

        // Check if the business unit exists
        if (!$businessUnit) {
            throw new \Exception("No business unit assigned to the user.");
        }

        // Fetch business unit objectives
        $businessUnitObjectives = BUNIT1::where('BunitID', $businessUnit->id)->get();
        $headerRow = 12 + $businessUnitObjectives->count();

        $data = [
            'businessUnit' => $businessUnit,
            'businessUnitObjectives' => $businessUnitObjectives,
            'headerRow' => $headerRow,
        ];

        return $data;
    }

    public function exportExcel()
    {
        try {
            $exportRequiredData = $this->getBusinessUnitDetails();
            return Excel::download(new RiskExport($exportRequiredData), 'RiskRegister.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function exportKRIRegister()
    {
        try {
            $exportRequiredData = $this->getBusinessUnitDetails();
            return Excel::download(new KeyRiskIndicatorRegisterExport($exportRequiredData), 'KRIRegister.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function exportERMRegister()
    {
        try {
            $exportRequiredData = $this->getBusinessUnitDetails();
            return Excel::download(new ERMExport($exportRequiredData), 'ERMRegister.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function exportQmsRegister()
    {
        try {
            $exportRequiredData = $this->getBusinessUnitDetails();
            return Excel::download(new QMSExport($exportRequiredData), 'QmsRegister.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function exportIncidentRegister()
    {
        try {
            $exportRequiredData = $this->getBusinessUnitDetails();
            return Excel::download(new IncidentExport($exportRequiredData), 'Incodemt-Register.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function exportActionRegister()
    {
        try {
            $exportRequiredData = $this->getBusinessUnitDetails();
            return Excel::download(new TreatmentPlanExport($exportRequiredData), 'Action-Register.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function exportCRMRegister()
    {
        $headerRow = 12;
        $exportRequiredData = [
            'headerRow' => $headerRow,
        ];

        return Excel::download(new CRAReport($exportRequiredData), 'CRA-Register.xlsx');
    }

    public function exportStrategicRegister()
    {
        $headerRow = 12;
        $exportRequiredData = [
            'headerRow' => $headerRow,
        ];

        return Excel::download(new StrategicExport($exportRequiredData), 'CRA-Register.xlsx');
    }
}