<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use App\Models\Job;

class CompanyController extends Controller
{
    //
    public function index($id,Company $company){
        return view('company.index',compact('company')); 
    }

    public function page($id,Company $company){
        return view('company.index',compact('company')); 
    }
    public function application(){
       
        $company_id=Auth::user()->company->id;
        $query = Job::all();
        $jobs=$query->where('company_id',$company_id);
        return view('company/application',compact('jobs'));
    }

    public function profile(){
        return view('company.profile');
    }
    public function store(Request $request){

        $user_id=Auth::user()->id; 
        
        Company::where('user_id',$user_id)->update([
            'address'=>request('address'),
            'phone'=>request('phonenumber'),
            'website'=>request('website'),
            'slogan'=>request('slogan'),
            'description'=>request('description'),
        ]);
        return redirect()->back()->
        with('message','Company Profile Update SuccessFully');
    }

    public function coverphoto(Request $request){
        $this->validate($request,[
            'cover_photo'=>'required|mimes:jpg,png,jpeg',
            ]);
        $user_id=Auth::user()->id;
        if($request->hasFile('cover_photo')){
            $file=$request->file('cover_photo');
            $text=$file->getClientOriginalExtension();
            $fileName=time().'.'.$text;
            $file->move('uploads/avatar',$fileName);
        
    //   $cover = $request->file('cover_photo')->move('uploads/avatar');

      Company::where('user_id',$user_id)->update(['cover_photo'=>$fileName]);
      return redirect()->back()->
      with('message','Cover Photo udpadted SuccessFully');        
    }
}
   
    public function logo(Request $request){
        $this->validate($request,[
            'logo'=>'required|mimes:jpg,png,jpeg|max:1024',
            ]);
    $user_id=Auth::user()->id;
      if($request->hasFile('logo')){
          $file=$request->file('logo');
          $text=$file->getClientOriginalExtension();
          $fileName=time().'.'.$text;
          $file->move('uploads/avatar',$fileName);

        Company::where('user_id',$user_id)->update(['logo'=>$fileName]);
        return redirect()->back()->
        with('message','Company Logo Update SuccessFully'); 
      }
    }

    public function dashboard(){
        return view('company.dashboard');
    }

   
}