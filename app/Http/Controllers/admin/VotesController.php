<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departments;
use App\Models\Election;
use App\Models\Votes;
use App\Models\Poll;
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

class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::guard('web')->user()->id);
        $session_election=Election::where('vote_session','=',1)->first();
         $elect = Votes::select('employee_id')->where('voter_id','=',$user->id)->where('election_id', '=',  $session_election->id )->get();
        $election = Election::where('vote_session','=',1)->first();
        $employees =User::where('id', '!=', auth()->id())->whereNotIn('id', $elect) // exclude already voted
    ->where('type','=',0)->get();
     //User::select('*')->where('type','=',0)->WhereNull('voted_id')->get();
       /* $employees = DB::table('users') 
            ->join('departments', 'users.department_id', '=', 'departments.id') 
            ->where('users.type', '=',  0 )->WhereNull('users.voted_id')->get();
             DB::table('users_vote')  
          ->join('elections', 'users_vote.election_id', '=', 'elections.id') 
          ->where('elections.vote_session', '=',  1 )->where('voter_id','=',$user->id)*/
        $v_employees =DB::table('users_vote')  
          ->join('elections', 'users_vote.election_id', '=', 'elections.id') 
          ->join('users', 'users_vote.employee_id', '=', 'users.id') 
          ->where('elections.vote_session', '=',  1 )->where('voter_id','=',$user->id)->get();



       // DB::table('poll') 
           // ->join('users', 'poll.employee_id', '=', 'users.id') 
           // ->join('elections', 'poll.election_id', '=', 'elections.id') 
           // ->where('elections.vote_session', '=',  1 )->where('voter_id','=',$user->id)->get();
         // User::select('*')->where('type','=',0)->where('voted_id','=',$user->id)->get();
   
     return view('admin.vote.index')
     ->with('election',$election)
     ->with('employees',$employees)
     ->with('v_employees',$v_employees);
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
    public function store($id)
    {
        $user = User::find(Auth::guard('web')->user()->id);

       $electcheck = DB::table('users_vote')  
          ->join('elections', 'users_vote.election_id', '=', 'elections.id') 
          ->join('users', 'users_vote.employee_id', '=', 'users.id') 
          ->where('elections.vote_session', '=',  1 )->where('voter_id','=',$user->id)->count();

       if($electcheck < 3){
        //$max_voted= Votes::max('enrolled');
        //$max_vote= $max_voted + 1;
        $employee = User::find($id);
        $election= Election::where('vote_session','=',1)->first();
        $user = User::find(Auth::guard('web')->user()->id);
        //$max_vote= votes::where('employee_id','=',$employee->id)->max('vote_max');
        //$max_voted= $max_vote + 1;

       
        $voted = new Votes();
        $voted->election_id = $election->id;
        $voted->employee_id = $employee->id;
        $voted->voter_id = $user->id;
        $voted->save();

        if ($voted) {

        $check_availability = Poll::where('employee_id','=',$employee->id)->where('election_id','=',$election->id)->first();
            if (is_null($check_availability)) {
            $cont = new Poll();
            $cont->election_id = $election->id;
            $cont->employee_id = $employee->id;
            $cont->save();

           $counted=votes::where('employee_id','=',$employee->id)->where('election_id','=',$election->id)->count(); 
            $counting= Poll::where('employee_id','=',$employee->id)->where('election_id','=',$election->id)
            ->update(
            ['votes' => $counted,'election_id' => $election->id,'employee_id' => $employee->id]
            ); 

            }
            else{


            $counted=votes::where('employee_id','=',$employee->id)->where('election_id','=',$election->id)->count(); 
            $counting= Poll::where('employee_id','=',$employee->id)->where('election_id','=',$election->id)
            ->update(
            ['votes' => $counted]
            );

            }
           
            Toastr::success('voted successfully :)','success');
            return redirect()->route('admin.vote');
        }
        else {
             Toastr::error('Something went wrong :)','error');
            return redirect()->route('admin.vote');
        }

             Toastr::error('Something went wrong :)','error');
            return redirect()->route('admin.vote');

        }else{
             Toastr::error('vote cant exceed 3 :)','error');
            return redirect()->route('admin.vote');
        }


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
        //
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
        //
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
