<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use App\Models\Departments;
use Auth;
use DB;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Mail;
use Hash;
use File;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FormsImport;
use App\Imports\FormsExport;
use \Illuminate\Support\Facades\URL;
use App\Http\Controllers\SignedrouteController;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
  
       $user=User:: find($id);
       return view('admin.profile.index',compact('user'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       if($request->password == ""){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user_image = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
       $request->file('image')->move(public_path('assets/images/profiles/'), $user_image);
                $profile = DB::table('users')
              ->where('id', $id)
              ->update(
                  [ 
                    'name' => $request->name,
                    'email' => $request->email,
                    'image' => $user_image
                ]);

        if ($profile) {
            Toastr::success('Profile Updated successfully :)','success');
            return back();
        }
       }elseif($request->image == ""){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);


            $profile = DB::table('users')
              ->where('id', $id)
              ->update(
                  [ 
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ]);

        if ($profile) {
            Toastr::success('Profile Updated successfully :)','success');
            return back();
               }
        }else{
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' =>'required'
        ]);

        $user_image = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
       $request->file('image')->move(public_path('assets/images/profiles/'), $user_image);
             $profile = DB::table('users')
              ->where('id', $id)
              ->update(
                  [ 
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'image' => $user_image
                ]);

        if ($profile) {
            Toastr::success('Profile Updated successfully :)','success');
            return back();
               }

        }
        
       
       Toastr::error('Something went wrong :)','error');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function edituser($id)
    {
  
       $user=User::find($id);
       return view('admin.userprofile.index',compact('user'));
    
    }

    public function updateuser(Request $request, $id)
    {

       if($request->password == ""){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'department' => 'required',
        ]);

        $user_image = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
       $request->file('image')->move(public_path('assets/images/profiles/'), $user_image);
                $profile = DB::table('users')
              ->where('id', $id)
              ->update(
                  [ 
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'department_name' => $request->department,
                    'image' => $user_image
                ]);

        if ($profile) {
            Toastr::success('Profile Updated successfully :)','success');
            return back();
        }
       }elseif($request->image == ""){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'department' => 'required',
        ]);


            $profile = DB::table('users')
              ->where('id', $id)
              ->update(
                  [ 
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'department_name' => $request->department,
                    'password' => Hash::make($request->password)
                ]);

        if ($profile) {
            Toastr::success('Profile Updated successfully :)','success');
            return back();
               }
        }else{
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'department' => 'required',
            'image' =>'required'
        ]);

        $user_image = time() . '-' . $request->file('image')->getClientOriginalName() . '.' . $request->file('image')->extension();
       $request->file('image')->move(public_path('assets/images/profiles/'), $user_image);
             $profile = DB::table('users')
              ->where('id', $id)
              ->update(
                  [ 
                    'name' => $request->name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'department_name' => $request->department,
                    'password' => Hash::make($request->password),
                    'image' => $user_image
                ]);

        if ($profile) {
            Toastr::success('Profile Updated successfully :)','success');
            return back();
               }

        }
        
       
       Toastr::error('Something went wrong :)','error');
        return back();
    }
}
