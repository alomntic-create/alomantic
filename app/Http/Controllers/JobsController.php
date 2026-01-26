<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
 public  function  showJob(int $id)
 {
     $job = Job::with('media')->where('id', $id)->first();
     return view('job_show',['job'=>$job]);
 }
}
