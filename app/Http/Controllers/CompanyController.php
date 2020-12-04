<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class CompanyController extends Controller
{
    //
    public function index($id,Company $company){
        return view('company.index',compact('company')); 
    }

    public function page($id,Company $company){
        return view('company.index',compact('company')); 
    }
    public function applicant(){
        return view('company.seeker');
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
            'cover_photo'=>'required|mimes:jpg,png,jpeg|max:1024',
            ]);
        $user_id=Auth::user()->id;
      $cover = $request->file('cover_photo')->store('public/files');

      Company::where('user_id',$user_id)->update(['cover_photo'=>$cover]);
      return redirect()->back()->
      with('message','Cover Photo udpadted SuccessFully');        
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