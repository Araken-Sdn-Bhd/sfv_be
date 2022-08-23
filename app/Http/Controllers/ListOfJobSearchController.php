<?php

namespace App\Http\Controllers;

use Exception;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ListOfJobSearch; 
use App\Models\JobSearchList;

class ListOfJobSearchController extends Controller
{
    //
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
             'added_by' => 'required|integer',
             'patient_id' => 'required|integer',
             'location_services' => 'required',
             'services_id' => '',
             'code_id' => '',
             'sub_code_id' => '',
             'type_diagnosis_id' => 'required|integer',
             'category_services' => 'required',
             'complexity_services' => '',
             'outcome' => '',
             'medication_des' => '',
             'job_listed' =>'',
         ]);

         if ($validator->fails()) {
             return response()->json(["message" => $validator->errors(), "code" => 422]);
         }
 
            $listofjobsearch = [
            'added_by' => $request->added_by,
            'patient_id' => $request->patient_id,
            'location_services' => $request->location_services,
            'services_id' => $request->services_id,
            'code_id' => $request->code_id,
            'sub_code_id' => $request->sub_code_id,
            'type_diagnosis_id' => $request->type_diagnosis_id,
            'category_services' => $request->category_services,
            'complexity_services' => $request->complexity_services,
            'outcome' => $request->outcome,
            'medication_des' => $request->medication_des,
            'status' => "1"
            ];
 
            $validateListOfJobSearch = [];
 
         if ($request->category_services == 'assisstance' || $request->category_services == 'external') {
             $validateListOfJobSearch['services_id'] = 'required';
             $listofjobsearch['services_id'] =  $request->services_id;
         } else if ($request->category_services == 'clinical-work') {
             $validateListOfJobSearch['code_id'] = 'required';
             $listofjobsearch['code_id'] =  $request->code_id;
             $validateListOfJobSearch['sub_code_id'] = 'required';
             $listofjobsearch['sub_code_id'] =  $request->sub_code_id;
         }
         $validator = Validator::make($request->all(), $validateListOfJobSearch);
         if ($validator->fails()) {
             return response()->json(["message" => $validator->errors(), "code" => 422]);
         }

         $listofjobsearch=ListOfJobSearch::firstOrCreate($listofjobsearch); 
         $listofjobsearchid=($listofjobsearch->id);
         if(!empty($request->job_listed)){
            foreach($request->job_listed as $key) {
                $data = array('company_name' => $key['company_name'],'patient_id' =>$request->patient_id,'job_applied'=>$key['job_applied'],'application_date'=>$key['application_date'],'interview_date'=>$key['interview_date'],'list_of_job_search_id'=>$listofjobsearchid);
                JobSearchList::insert($data); 
            }
         }
        
         return response()->json(["message" => "Job Search List Created Successfully!", "code" => 200]);
        
    }

}