<?php

namespace App\Http\Controllers;

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
      $user =  User::find(Auth::user()->id);
      // $elected = Votes::where('voter_id','=',$user->id)->count();  DB::table('poll') 
           // ->join('users', 'poll.employee_id', '=', 'users.id') 
           // ->join('elections', 'poll.election_id', '=', 'elections.id') 
           // ->where('elections.vote_session', '=',  1 ) 
        $elected =DB::table('users_vote')  
          ->join('elections', 'users_vote.election_id', '=', 'elections.id') 
          ->join('users', 'users_vote.employee_id', '=', 'users.id') 
          ->where('elections.vote_session', '=',  1 )->where('voter_id','=',$user->id)->count();

    if($elected < 3){

        $employee = User::find($id);
        $election= Election::where('vote_session','=',1)->first();
        $user = User::find(Auth::guard('web')->user()->id);
       // $max_vote= votes::where('employee_id','=',$employee->id)->max('vote_max');
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
            return redirect()->route('user.home');
        }
        else {
             Toastr::error('Something went wrong :)','error');
            return redirect()->route('user.home');
        }

             Toastr::error('Something went wrong :)','error');
            return redirect()->route('user.home');
}
else{
     Toastr::error('Vote Max Exceeded :)','error');
     return redirect()->route('user.home');
}
       




    }

    public function unvote($id)
    {
       
      $user =  User::find(Auth::user()->id);
      
        $employee = User::find($id);
        
        
        $election= Election::where('vote_session','=',1)->first();

        $check_poll= Poll::select('votes')->where('employee_id','=',$employee->id)->where('election_id','=',$election->id)->first();
        $undid= $check_poll->votes - 1;
        $update_poll= Poll::where('employee_id','=',$employee->id)->where('election_id','=',$election->id)->update(['votes' => $undid]); 
        
        $delvote=votes::where('employee_id','=',$employee->id)->where('voter_id','=',$user->id)->where('election_id','=',$election->id)->delete(); 
      
        
        Toastr::success('Change made successfully :)','success');
      return redirect()->route('user.home');
          
     
            

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
