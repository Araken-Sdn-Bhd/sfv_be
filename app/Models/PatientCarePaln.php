<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCarePaln extends Model
{
    use HasFactory;

    protected $table = 'patient_care_paln';
    protected $fillable = [
        'appointment_details_id',
        'added_by',
        'patient_id',
        'plan_date',
        'reason_of_review',
        'diagnosis',
        'medication_oral',
        'medication_depot',
        'medication_im',
        'background_history',
        'staff_incharge_dr',
        'treatment_plan',
        'next_review_date',
        'case_manager_date',
        'case_manager_name',
        'case_manager_designation',
        'specialist_incharge_date',
        'specialist_incharge_name',
        'specialist_incharge_designation',
        'location_of_service',
        'type_of_diagnosis',
        'add_type_of_diagnosis',
        'category_of_services',
        'services',
        'complexity_of_services',
        'outcome',
        'icd_9_code',
        'icd_9_subcode',
        'medication_prescription',
        'created_at',
        'status',
        'add_code_id','add_sub_code_id'
    ];
}
