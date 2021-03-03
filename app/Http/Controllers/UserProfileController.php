<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Storage;


class UserProfileController extends Controller
{
    public function myapplication(){
        // $user_id=Auth::user()->id;    
        // $user = User::find($user_id);
        $user=Auth::user();
        return view('profiles/myapplication',compact('user'));
    }

    public function index(){
        return view('profiles.index');
    }
    public function store(Request $request){
        // $this->validate($request,[
        //     'dob'=>'required',
        //     'gender'=>'required',
        //     'address'=>'required',
        //     'phone_number'=>'required|min:10|numeric',
        //     'experience'=>'required|min:20',
        //     'bio'=>'required|min:20'
        //     ]);
        //dd(request('address'));
        $user_id=Auth::user()->id; 
        
        Profile::where('user_id',$user_id)->update([
            'dob'=>request('dob'),
            'gender'=>request('gender'),
            'address'=>request('address'),
            'phone_number'=>request('phonenumber'),
            'experience'=>request('experience'),
            'bio'=>request('bio'),
        ]);
        return redirect()->back()->
        with('message','Your Profile Update SuccessFully');
    }

    public function coverletter(Request $request){
        $this->validate($request,[
            'cover_letter'=>'required|mimes:pdf,doc,docx|max:20000',
            ]);
        $user_id=Auth::user()->id;
      $cover = $request->file('cover_letter')->store('app\public\files');
      //dd($cover);
      Profile::where('user_id',$user_id)->update(['cover_letter'=>$cover]);
      return redirect()->back()->
      with('message','Cover Letter Profile Update SuccessFully');        
    }
    public function resume(Request $request){
    //     $this->validate($request,[
    //         'resume'=>'required|mimes:pdf,doc,docx|max:20000',
    //         ]);
    //     $user_id=Auth::user()->id;
    //     if($request->hasFile('resume')){
    //         $file=$request->file('resume');
    //         $text=$file->getClientOriginalExtension();
    //         $fileName=time().'.'.$text;
    //         $file->move('resume',$fileName);

    // //   $resume = $request->file('resume')->store('public/files');
    //   Profile::where('user_id',$user_id)->update(['resume'=>$fileName]);
    //   return redirect()->back()->
    //   with('message','Resume Profile Update SuccessFully');        
    //     }
        $validatedData = $request->validate([
            'file' => 'required|csv,txt,xlx,xls,pdf|max:2048',
    
           ]);
    
           $name = $request->file('file')->getClientOriginalName();
    
           $path = $request->file('file')->store('public/files');
           $user_id=Auth::user()->id;
           Profile::where('user_id',$user_id)->update(['resume'=>$path]);
           $save = new File;
    
           $save->name = $name;
           $save->path = $path;
    
           return redirect('file-upload')->with('status', 'Resume Profile Update SuccessFully');
    }
    public function avatar(Request $request){
        $this->validate($request,[
            'avatar'=>'required|mimes:jpg,png,jpeg|max:1024',
            ]);
    $user_id=Auth::user()->id;
      if($request->hasFile('avatar')){
          $file=$request->file('avatar');
          $text=$file->getClientOriginalExtension();
          $fileName=time().'.'.$text;
          $file->move('uploads/avatar',$fileName);

        Profile::where('user_id',$user_id)->update(['avatar'=>$fileName]);
        return redirect()->back()->
        with('message','Profile Picture Update SuccessFully'); 
      }
             
    }
    public function download_resume(){
        $filePath = public_path("dummy.pdf");
    	$headers = ['Content-Type: application/pdf'];
    	$fileName = time().'.pdf';

    	return response()->download($filePath, $fileName, $headers);
    }
    
  
}
