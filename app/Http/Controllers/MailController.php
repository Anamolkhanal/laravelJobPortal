<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendAcceptEmail($user_id)
    {
        $user=User::find("$user_id");
        $details=[
            'title'=>'Mail from Job Portal',
            'body'=>'Congarulation ! you have selected for the next stage of selection. Comapny will contact you as soon as possible.'
        ];
        Mail:: to($user->email)->send(new SendMail( $details));
    
        return redirect()->back()
        ->with('message','Acceptance Email Send to the Applicant Successfully');
    }
    public function sendDeclineEmail($user_id)
    {
        $user=User::find("$user_id");
        $details=[
            'title'=>'Mail from Job Portal',
            'body'=>'Sorry ! you are not selected for the next stage of selection.'
        ];
        Mail:: to($user->email)->send(new SendMail( $details));
        
        return "Decline Email Send to the Applicant Successfully";
        // return redirect()->back()
        // ->with('message','Acceptance Email Send to the Applicant Successfully');
    }
}
