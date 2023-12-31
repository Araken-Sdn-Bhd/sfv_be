<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RehabDischargeNote extends Model
{
    use HasFactory;

    protected $table = 'rehab_discharge_note';
    protected $fillable =  ['id', 'name', 'mrn','patient_mrn_id','appointment_details_id', 'added_by', 'date', 'time', 'staff_name', 'diagnosis_id',
    'intervention', 'discharge_category', 'comment', 'location_services', 'diagnosis_type', 'add_diagnosis_type','service_category',
    'services_id', 'code_id', 'sub_code_id', 'complexity_services', 'outcome',
    'medication', 'specialist_name', 'case_manager', 'verification_date_1', 'verification_date_2',
     'status','created_at','add_code_id','add_sub_code_id'];
}
