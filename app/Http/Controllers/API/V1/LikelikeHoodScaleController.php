<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\LikelihoodScale;
use App\Services\Shared\ApiResponseService;

class LikelikeHoodScaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $data = LikelihoodScale::get();
            return (new ApiResponseService())
                ->apiSuccessResponseService($data);
        } catch (\Throwable$th) {
            return (new ApiResponseService())->apiFailedResponseService($th->getMessage());
        }
    }
}
