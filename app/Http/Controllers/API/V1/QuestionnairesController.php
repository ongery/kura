<?php

namespace App\Http\Controllers\API\V1;

use App\Models\Template;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Questionnaires;
use App\Models\QuestionnairesRisk;
use Illuminate\Support\Facades\DB;
use App\Models\QuestionnairesResult;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\QuestionnairesTemplate;
use Illuminate\Support\Facades\Validator;
use App\Services\Shared\ApiResponseService;

class QuestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $questionnaires = Questionnaires::latest()->get();
            return (new ApiResponseService())->apiSuccessResponseService($questionnaires);
        } catch (\Throwable $th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'                  =>  'required',
            'user_instruction'      =>  'required',
            'templates.*.template'  =>  'required',
            'templates.*.contacts'  =>  'required',
        ];
        $messages = [
            'name.required'                 =>  '* Name should not be blank.',
            'user_instruction.required'     =>  '* User Instruction should not be blank.',
            'templates.*.template.required' =>  '* Template should be selected.',
            'templates.*.contacts.required' =>  '* Assessment Contacts should be selected.',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return (new ApiResponseService())->apiFailedResponseService($validator->errors());
        }

        try {
            $questionnaires = new Questionnaires();
            $questionnaires->name = ucfirst($request->name);
            $questionnaires->instruction = ucfirst($request->user_instruction);
            $questionnaires->automatic_send = ($request->automatic_send == true) ? '1' : '0';
            $questionnaires->notify_assessment = (int) $request->notify_assessment;
            $questionnaires->schedule_send = (int) $request->schedule_send;
            $questionnaires->save();
            
            if($questionnaires->id > 0) {
                if(!empty($request->project_name)) {
                    $questionnairesRisk = new QuestionnairesRisk();
                    $questionnairesRisk->questionnaire_id   =   $questionnaires->id;
                    $questionnairesRisk->project_name       =   ucfirst($request->project_name) ?? NULL;
                    $questionnairesRisk->site_location      =   $request->site_location ?? NULL;
                    $questionnairesRisk->affected_assets    =   (count($request->affected_assets) > 0) ? implode(', ', $request->affected_assets) : NULL;
                    $questionnairesRisk->team               =   (count($request->team) > 0) ? implode(', ', $request->team) : NULL;
                    $questionnairesRisk->addi_stakeholders  =   (count($request->addi_stakeholders) > 0) ? implode(', ', $request->addi_stakeholders) : NULL;
                    $questionnairesRisk->owner              =   $request->owner ?? NULL;
                    $questionnairesRisk->owners_manager     =   $request->owners_manager ?? NULL;
                    $questionnairesRisk->tags               =   $request->tags ?? NULL;
                    $questionnairesRisk->save();
                }

                if((isset($request->templates)) && count($request->templates) > 0) {
                    foreach($request->templates as $tmp) {
                        $questionnairesTmp = new QuestionnairesTemplate();
                        $questionnairesTmp->questionnaire_id    =   $questionnaires->id;
                        $questionnairesTmp->template_id         =   (int) $tmp['template'] ?? NULL;
                        $questionnairesTmp->assessment_contact  =   (int) $tmp['contacts'] ?? NULL;
                        $questionnairesTmp->save();
                    }
                }

                return (new ApiResponseService())->apiSuccessResponseService("Questionnaires Created Successfully");
            }
            return (new ApiResponseService())->apiFailedResponseService('Failed to create Questionnaires, Try again.');
        } 
        catch (\Throwable $th) {                                          
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $data = array();
            $questionnaires = Questionnaires::find($id)->toArray();
            if($questionnaires) {
                $questionnairesRisk = QuestionnairesRisk::where('questionnaire_id', $id)->first();
                $questionnairesTmp = QuestionnairesTemplate::where('questionnaire_id', $id)->get();

                $data['id']                 =   $questionnaires['id'];
                $data['name']               =   $questionnaires['name'];
                $data['user_instruction']   =   $questionnaires['instruction'] ?? '';

                if($questionnairesRisk) {
                    $data['project_name']       =   $questionnairesRisk['project_name'] ?? '';
                    $data['site_location']      =   $questionnairesRisk['site_location'] ?? '';
                    $data['affected_assets']    =   explode(', ', $questionnairesRisk['affected_assets']) ?? '';
                    $data['team']               =   explode(', ', $questionnairesRisk['team']) ?? '';
                    $data['addi_stakeholders']  =   explode(', ', $questionnairesRisk['addi_stakeholders']) ?? '';
                    $data['owner']              =   $questionnairesRisk['owner'] ?? '';
                    $data['owners_manager']     =   $questionnairesRisk['owners_manager'] ?? '';
                    $data['tags']               =   $questionnairesRisk['tags'] ?? '';
                }
                
                $data['automatic_send']     =   $questionnaires['automatic_send'] ?? '';
                $data['notify_assessment']  =   $questionnaires['notify_assessment'] ?? '';
                $data['schedule_send']      =   $questionnaires['schedule_send'] ?? '';
                $data['templates']          =   $questionnairesTmp->toArray();
            }
            return (new ApiResponseService())->apiSuccessResponseService($data);
        }
        catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $questionnaires = Questionnaires::find($id);
            if($questionnaires) {
                $questionnairesRisk = QuestionnairesRisk::where('questionnaire_id', $id);
                $questionnairesTmp = QuestionnairesTemplate::where('questionnaire_id', $id);

                if($questionnairesRisk->count() > 0) {
                    $questionnairesRisk->delete();
                }
                if($questionnairesTmp->count() > 0) {
                    $questionnairesTmp->delete();
                }
                $questionnaires->delete();
                return (new ApiResponseService())->apiSuccessResponseService("Questionnaires deleted Successfully");
            }

            return (new ApiResponseService())->apiFailedResponseService('Questionnaires not found, Try again.');
        }
        catch (\Throwable $th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }


    public function copyQuestionnaires ($id)
    {
        try {
            $questionnaires = Questionnaires::findOrFail($id);

            // Questionnaires Copy
            $questionnairesCopy = $questionnaires->replicate();
            $questionnairesCopy->name               =   $questionnaires->name . ' (Copy)';
            $questionnairesCopy->instruction        =   $questionnaires->instruction;
            $questionnairesCopy->automatic_send     =   $questionnaires->automatic_send;
            $questionnairesCopy->notify_assessment  =   $questionnaires->notify_assessment;
            $questionnairesCopy->schedule_send      =   $questionnaires->schedule_send;
            $questionnairesCopy->created_at         =   now();
            $questionnairesCopy->updated_at         =   now();
            $questionnairesCopy->save();

            // Questionnaires Risk Copy
            $questionnairesRisk = QuestionnairesRisk::where('questionnaire_id', $id);
            if($questionnairesRisk->exists()) {
                $questionnairesRisk = $questionnairesRisk->first();
                $questionnairesRiskCopy = $questionnairesRisk->replicate();

                $questionnairesRiskCopy->questionnaire_id   =   $questionnairesCopy->id;
                $questionnairesRiskCopy->project_name       =   $questionnairesRisk->project_name;
                $questionnairesRiskCopy->site_location      =   $questionnairesRisk->site_location;
                $questionnairesRiskCopy->affected_assets    =   $questionnairesRisk->affected_assets;
                $questionnairesRiskCopy->team               =   $questionnairesRisk->team;
                $questionnairesRiskCopy->addi_stakeholders  =   $questionnairesRisk->addi_stakeholders;
                $questionnairesRiskCopy->owner              =   $questionnairesRisk->owner;
                $questionnairesRiskCopy->owners_manager     =   $questionnairesRisk->owners_manager;
                $questionnairesRiskCopy->tags               =   $questionnairesRisk->tags;
                $questionnairesRiskCopy->created_at         =   now();
                $questionnairesRiskCopy->updated_at         =   now();
                $questionnairesRiskCopy->save();
            }

            // Questionnaires Template Copy
            $questionnairesTmp = QuestionnairesTemplate::where('questionnaire_id', $id);
            if($questionnairesTmp->exists()) {
                $questionnairesTmp = $questionnairesTmp->get();

                if(count($questionnairesTmp) > 0) {
                    foreach($questionnairesTmp as $tmp) {
                        $questionnairesTmpCopy = $tmp->replicate();

                        $questionnairesTmpCopy->questionnaire_id    =   $questionnairesCopy->id;
                        $questionnairesTmpCopy->template_id         =   $tmp->template_id;
                        $questionnairesTmpCopy->assessment_contact  =   $tmp->assessment_contact;
                        $questionnairesTmpCopy->created_at          =   now();
                        $questionnairesTmpCopy->updated_at          =   now();
                        $questionnairesTmpCopy->save();
                    }
                }
            }

            return (new ApiResponseService())->apiSuccessResponseService("Questionnaires Copied Successfully");
        }
        catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }


    public function sendQuestionnaires ($id)
    {
        try {
            $questionnairesResult = new QuestionnairesResult();
            $questionnairesResult->questionnaire_id     =   $id;
            $questionnairesResult->date_send            =   date('Y-m-d');
            $questionnairesResult->questionnaire_status =   'Pending Response';
            $questionnairesResult->review_status        =   'Pending Response';
            $questionnairesResult->last_comment         =   NULL;
            $questionnairesResult->company              =   'Internal';
            $questionnairesResult->contact              =   Auth::user()->Fname.' '.Auth::user()->Lname;
            $questionnairesResult->save();

            return (new ApiResponseService())->apiSuccessResponseService("Questionnaires Sent Successfully");
        }
        catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }


    public function getQuestionnairesResult ()
    {
        try {
            $questionnairesRes = QuestionnairesResult::with('questionnaires:id,name')->orderBy('id','desc')->get();
            if(count($questionnairesRes) > 0) {
                foreach($questionnairesRes as $key => $res) {
                    $questionnairesRes[$key]->date_send = date('d-m-Y', strtotime($res->date_send));
                }
            }

            return (new ApiResponseService())->apiSuccessResponseService($questionnairesRes);
        } catch (\Throwable $th) {
            DB::rollback();
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }


    public function getQuestionnairesAssessments (Request $request, $id) 
    {
        try {
            $quesResult = QuestionnairesResult::where('id', $request->quesResultId)->first()->toArray();
            $templatesIds = QuestionnairesTemplate::where('questionnaire_id', $id)->pluck('template_id')->toArray();
            $templates = Template::whereIn('id', $templatesIds)->get()->toArray();

            $questionsArr = [];
            if(count($templates) > 0) {
                $questionsArr['quesResult'] = $quesResult;
                if($quesResult['review_status'] == 'Approved') {
                    $questionsArr['message'] = '<span class="text-success fs-6"><i class="fa fa-check text-success"></i>&nbsp; Reviewed and Approved by '.$quesResult['contact'].' on '.date('d-m-Y H:i:s', strtotime($quesResult['updated_at'])).'.</span>';
                }
                if($quesResult['review_status'] == 'Rejected') {
                    $questionsArr['message'] = '<span class="text-warning fs-6"><i class="fa fa-question text-warning"></i>&nbsp; Rejected by '.$quesResult['contact'].' on '.date('d-m-Y H:i:s', strtotime($quesResult['updated_at'])).'.</span>';
                }
                if($quesResult['review_status'] == 'Not Approved') {
                    $questionsArr['message'] = '<span class="text-danger fs-6"><i class="fa fa-times text-danger"></i>&nbsp; Marked as not approved by '.$quesResult['contact'].' on '.date('d-m-Y H:i:s', strtotime($quesResult['updated_at'])).'.</span>';
                }
                foreach($templates as $key => $tmp) {
                    $questionsArr[$key]['template'] = $tmp['name'];
                    $questions = Question::with('answers:id,question_id,answer')->select('id', 'question', 'option')->whereIn('id', $tmp['questions'])->get()->toArray();

                    $questionsArr[$key]['question'] = $questions;
                }
            }

            return (new ApiResponseService())->apiSuccessResponseService($questionsArr);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }


    public function changeQuestionnairesResultStatus (Request $request, $quesResultId)
    {
        try {
            $quesResult = QuestionnairesResult::find($quesResultId);
            $message = '';
            if($request->status == 'Approved') {
                $quesResult->questionnaire_status   =   'Reviewed';
                $quesResult->review_status          =   $request->status;

                $message = '<span class="text-success fs-6"><i class="fa fa-check text-success"></i>&nbsp; Reviewed and Approved by '.$quesResult->contact.' on '.date('d-m-Y H:i:s').'.</span>';
            }
            if($request->status == 'Rejected') {
                $quesResult->questionnaire_status   =   'Pending Response';
                $quesResult->review_status          =   $request->status;

                $message = '<span class="text-warning fs-6"><i class="fa fa-question text-warning"></i>&nbsp; Rejected by '.$quesResult->contact.' on '.date('d-m-Y H:i:s').'.</span>';
            }
            if($request->status == 'Not Approved') {
                $quesResult->questionnaire_status   =   'Reviewed';
                $quesResult->review_status          =   $request->status;

                $message = '<span class="text-danger fs-6"><i class="fa fa-times text-danger"></i>&nbsp; Marked as not approved by '.$quesResult->contact.' on '.date('d-m-Y H:i:s').'.</span>';
            }
            $quesResult->save();
            return (new ApiResponseService())->apiSuccessResponseService($message);
        } catch (\Throwable $th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }

}
