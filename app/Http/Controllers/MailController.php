<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Job;
use App\Models\Company;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index($user_id,$job_id,$type){

        if ($type=="accept")
        {
            return $this->sendAcceptEmail($user_id,$job_id);
        }
        elseif ($type="reject")
        {
            return $this->sendDeclineEmail($user_id,$job_id);
        }

    }
    public function sendAcceptEmail($user_id,$job_id)
    {
        $job=Job::find("$job_id");
        $user=User::find("$user_id");
        $company=Company::find("$job->company_id");
        $details=[
            'title'=>'Job Application Acceptance Letter',
            'job_title'=>$job->title,
            'user'=>$user->name,
            'body'=>'Congarulation ! you have selected for the next stage of selection for '.$job->title.'.'. $company->cname .'will contact you as soon as possible.',
            'company_name'=>$company->cname,
            'company_phone'=>$company->phone,
            'company_website'=>$company->website,
            'company_address'=>$company->address,

        ];
        Mail:: to($user->email)->send(new SendMail( $details));
    
        return redirect()->back()
        ->with('message','Acceptance Email Send to the Applicant Successfully');
    }
    public function sendDeclineEmail($user_id,$job_id)
    {
        $job=Job::find("$job_id");
        $user=User::find("$user_id");
        $company=Company::find("$job->company_id");
        $details=[
            'title'=>'Job Application Rejected Letter',
            'job_title'=>$job->title,
            'user'=>$user->name,
            'body'=>'Sorry ! you are not selected for the next stage of selection.',
            'company_name'=>$company->cname,
            'company_phone'=>$company->phone,
            'company_website'=>$company->website,
            'company_address'=>$company->address,

        ];
        Mail:: to($user->email)->send(new SendMail( $details));
        
        return redirect()->back()
        ->with('message','Rejected Email Send to the Applicant Successfully');
    }
}
