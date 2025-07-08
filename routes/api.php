<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\NCRController;
use App\Http\Controllers\API\V1\RiskController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\AuditController;
use App\Http\Controllers\API\V1\ReportsController;
use App\Http\Controllers\API\Ext\PowerBIController;
use App\Http\Controllers\API\V1\ContactsController;
use App\Http\Controllers\API\V1\CategoryController;
use App\Http\Controllers\API\V1\IncidentController;
use App\Http\Controllers\API\V1\SettingsController;
use App\Http\Controllers\API\V1\WorkPlanController;
use App\Http\Controllers\API\V1\TemplatesController;
use App\Http\Controllers\API\V1\QuestionsController;
use App\Http\Controllers\API\V1\ScoreCardController;
use App\Http\Controllers\API\V1\AttachmentController;
use App\Http\Controllers\API\V1\ProfileDataController;
use App\Http\Controllers\API\V1\BusinessUnitController;
use App\Http\Controllers\API\V1\NotificationController;
use App\Http\Controllers\API\V1\CorporateRiskController;
use App\Http\Controllers\API\V1\ActionTrackingController;
use App\Http\Controllers\API\V1\QuestionnairesController;
use App\Http\Controllers\API\V1\WorkInPregressController;
use App\Http\Controllers\API\V1\SelftAssessmentController;
use App\Http\Controllers\API\V1\SelfAssessmentsController;
use App\Http\Controllers\API\V1\ProcedureProcessController;
use App\Http\Controllers\API\V1\RiskLibrarySetupController;
use App\Http\Controllers\API\V1\ConsequenceMatrixController;
use App\Http\Controllers\API\V1\KeyRiskIndicatorsController;
use App\Http\Controllers\API\V1\LikelikeHoodScaleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::group([
    'prefix' => 'v1/reports',
], function () {
    Route::get('kri/register', [PowerBIController::class, 'getKRIRegister']);
    Route::get('dashboards/qms', [PowerBIController::class, 'getQmsDashboard']);
    Route::get('dashboards/erm', [PowerBIController::class, 'getErmDashboard']);
});

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('dashboards/risk', [PowerBIController::class, 'getRiskDashboard']);
    Route::get('dashboards/erm', [PowerBIController::class, 'getERMDashboard']);
    Route::post('updatepermission', [UserController::class, 'updatePermission']);
    Route::get('getUserRoles', [UserController::class, 'getUserRoles']);
    Route::post('createUserRoles', [UserController::class, 'createUserRoles']);
    Route::post('assignUserRolePermission', [UserController::class, 'assignPermissionToRole']);
    Route::post('assignUserRoleModulePermission', [UserController::class, 'assignModulePermissionToRole']);
    Route::post('assignRoleToUser', [UserController::class, 'assignRoleToUser']);
    Route::get('/history-logs', [UserController::class, 'getHistoryLogs']);




    Route::get('getRiskCauses', [RiskLibrarySetupController::class, 'getRiskCauses']);
    Route::get('findCauseOrImpact', [RiskLibrarySetupController::class, 'findCauseOrImpact']);
    Route::get('getCausesEffects', [RiskLibrarySetupController::class, 'getCausesEffects']);
    Route::get('syncRelationship', [RiskController::class, 'syncRelationship']);
    Route::post('approve-risk/{riskid}', [RiskController::class, 'approveRisk']);
    Route::get('likeLihoodScale', [RiskController::class, 'likeLihoodScale']);
    Route::get('loadConsequenceScale', [RiskController::class, 'loadConsequenceScale']);
    Route::post('updateAnalzeRisk', [RiskController::class, 'updateAnalzeRisk']);
    Route::get('syncRelForAction', [ActionTrackingController::class, 'syncRelForAction']);
    Route::post('record-kris-compliance', [KeyRiskIndicatorsController::class, 'recordKriCompliance']);
    Route::get('getRiskTreatmentAction', [RiskController::class, 'getRiskTreatmentAction']);

    Route::get('getLevelOneRisk', [RiskController::class, 'getLevelOneRisk']);
    Route::get('findERMRiskLevelOne', [RiskController::class, 'findERMRiskLevelOne']);
    Route::get('getLevelOneRiskEvents', [RiskController::class, 'getLevelOneRiskEvents']);

    Route::get('syncMainRiskRelationship', [RiskController::class, 'syncMainRiskRelationship']);
    Route::get('getLevelCausesEffects', [RiskLibrarySetupController::class, 'getLevelCausesEffects']);
    Route::get('kris-compliance-erm', [RiskLibrarySetupController::class, 'getKRIComplianceERM']);
    Route::get('actiontracking-erm', [ActionTrackingController::class, 'getActionTrackingForERM']);
    // Adding the route for updating milestone status
    Route::put('actiontracking/milestones/{id}/status', [ActionTrackingController::class, 'updateMilestoneStatus']);

    Route::get('syncQMSRelationship', [RiskLibrarySetupController::class, 'syncQMSRelationship']);
    Route::get('getLevelOneRiskForQMS', [RiskController::class, 'getLevelOneRiskForQMS']);

    Route::get('getRiskMethods', [RiskLibrarySetupController::class, 'getRiskMethods']);
    Route::get('loadFunctionalAreaData', [RiskLibrarySetupController::class, 'getFunctionalAreaData']);
    Route::get('loadCorruptionPreventionStrategy', [ActionTrackingController::class, 'getCorruptionPreventionStrategies']);

    Route::get('reports/risk-register', [ReportsController::class, 'riskRegister']);
    Route::get('reports/kri-register', [ReportsController::class, 'kriRegister']);
    Route::get('reports/kci-register', [ReportsController::class, 'kciRegister']);
    Route::get('reports/action-register', [ReportsController::class, 'actionRegister']);
    Route::get('reports/erm-register', [ReportsController::class, 'ermRegister']);
    Route::get('reports/qms-register', [ReportsController::class, 'qmsRegister']);
    Route::get('reports/incident-register', [ReportsController::class, 'qmsIncident']);
    Route::get('reports/crm-register', [ReportsController::class, 'cmrRegister']);
    Route::get('reports/strategic-register', [ReportsController::class, 'strategicRegister']);

    Route::get('reports/kri-register-summary', [ReportsController::class, 'kriRegisterSummary']);
    Route::get('reports/kci-register-summary', [ReportsController::class, 'kciRegisterSummary']);

    Route::get('setting', [SettingsController::class, 'index']);
    Route::post('update_logo', [SettingsController::class, 'updateLogo']);
    Route::post('businessunits/objectives/add', [BusinessUnitController::class, 'addObjective']);
    Route::put('businessunits/objectives/delete/{id}', [BusinessUnitController::class, 'deleteObjective']);

    //Stratetic Actions
    Route::get('strategic/actions', [WorkPlanController::class, 'getUserActions']);
    Route::put('strategic/actions/{id}', [WorkPlanController::class, 'recordWorkPlanOutput']);

    //QMS
    Route::post('procedure_process_rows', [ProcedureProcessController::class, 'procedureProcessRows']);
    Route::get('procedure_process_rows', [ProcedureProcessController::class, 'getProcedureProcessRows']);
    Route::put('procedure_process_rows/{id}', [ProcedureProcessController::class, 'moveUp']);
    Route::put('procedure_process_rows_update/{id}', [ProcedureProcessController::class, 'updateDescription']);
    Route::post('procedure_process_image/{id}', [ProcedureProcessController::class, 'updateProcedureImage']);
    Route::post('sa_category', [SelftAssessmentController::class, 'createSACategory']);
    Route::get('sa_category', [SelftAssessmentController::class, 'getSACategory']);

    Route::post('manage-logs', [UserController::class, 'manageHistoryLogs']);

    Route::apiResources(['consequence-matrix' => ConsequenceMatrixController::class]);
    Route::apiResources(['attachment' => AttachmentController::class]);
    Route::apiResources(['category' => CategoryController::class]);
    Route::apiResources(['risklibrarysetup' => RiskLibrarySetupController::class]);
    Route::apiResources(['risks' => RiskController::class]);
    Route::apiResources(['businessunits' => BusinessUnitController::class]);
    Route::apiResources(['user' => UserController::class]);
    Route::apiResources(['actiontracking' => ActionTrackingController::class]);
    Route::apiResources(['workinprogress' => WorkInPregressController::class]);
    Route::apiResources(['kris-compliance' => KeyRiskIndicatorsController::class]);
    Route::apiResources(['audit-scheduler' => AuditController::class]);
    Route::apiResources(['incident-management' => IncidentController::class]);
    Route::apiResources(['likeLihood-scale' => LikelikeHoodScaleController::class]);
    Route::apiResources(['notifications' => NotificationController::class]);
    Route::apiResources(['opportunities' => NotificationController::class]);
    Route::apiResources(['profile_data' => ProfileDataController::class]);
    Route::apiResources(['score_card' => ScoreCardController::class]);
    Route::apiResources(['work_plan' => WorkPlanController::class]);
    Route::apiResources(['procedure_process' => ProcedureProcessController::class]);
    Route::apiResources(['ncr' => NCRController::class]);
    Route::apiResources(['sa_questions' => SelftAssessmentController::class]);
    Route::apiResources(['corporate-risks' => CorporateRiskController::class]);

    /* Api route for Self Assestment */
    Route::apiResources(['contacts' => ContactsController::class]);
    Route::apiResources(['templates' => TemplatesController::class]);
    Route::apiResources(['questions' => QuestionsController::class]);
    Route::apiResources(['self/assessments' => SelfAssessmentsController::class]);
    
    Route::get('questionnaires/result', [QuestionnairesController::class, 'getQuestionnairesResult']);
    Route::apiResources(['questionnaires' => QuestionnairesController::class]);
    Route::get('questionnaires/copy/{id}', [QuestionnairesController::class, 'copyQuestionnaires']);
    Route::get('questionnaires/send/{id}', [QuestionnairesController::class, 'sendQuestionnaires']);
    Route::get('questionnaires/assessments/{id}', [QuestionnairesController::class, 'getQuestionnairesAssessments']);
    Route::get('questionnaires/change/{id}', [QuestionnairesController::class, 'changeQuestionnairesResultStatus']);

    Route::get('visualization/kri', [ReportsController::class, 'getKRIVisualization']);
    Route::get('visualization/krit', [ReportsController::class, 'getKRITVisualization']);
    Route::get('visualization/risk-events', [ReportsController::class, 'getRiskEventsVisualization']);

    Route::post('risks/store/new-risk', [RiskController::class, 'storeNewRisk']);
    Route::post('import/risks', [RiskController::class, 'importRiskData']);
    
    Route::post('consequence-matrix/ranking', [RiskController::class, 'manageConsequenceMatrixRanking']);
});
