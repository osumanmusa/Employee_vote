<?php

namespace App\Http\Controllers;

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
        return view('user.profile.index');
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
          $users = DB::table('users')
            ->join('departments', 'departments.id', '=', 'users.department_id')
            ->select('users.*', 'departments.department_name')
            ->get();
       $user=User:: find($id);
       $department = Departments::select('department_name')->where('id','=',$user->department_id)->get();
       return view('user.profile.index',compact('user'))->with('department',$department)->with('users',$users);
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

        
                $profile = DB::table('users')
              ->where('id', $id)
              ->update(
                  [ 
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

        if ($profile) {
            Toastr::success('Profile Updated successfully :)','success');
            return back();
        }
       }else{
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' =>'required'
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
}
