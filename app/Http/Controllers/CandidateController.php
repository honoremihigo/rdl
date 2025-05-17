<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function addCandidate(Request $request){
        $request->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'gender' => 'required|min:3',
            'dob' => 'required|date',
            'examDate' => 'required|date',
            'phone' => 'required'
        ]);

        Candidate::create([
            'firstname' => $request->fname,
            'lastname' => $request->lname,
            'gender' => $request->gender,
            'DOB' => $request->dob,
            'ExamDate' => $request->examDate,
            'PhoneNumber' => $request->phone
        ]);

        return redirect()->route('candidatePage')->with('success','adding candidate sucessfully');
    }


    public function getAllCandidates($request){
    }
}
