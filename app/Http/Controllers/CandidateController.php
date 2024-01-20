<?php

namespace App\Http\Controllers;

use App\Models\CandidateJobSkill;
use App\Models\CandidateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(request()->ajax()){
            $data = CandidateProfile::with('candidateJobSkill')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('action', function($row){
                //     $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                //     return $actionBtn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }
        return view('candidate');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'dob_month' => 'nullable|integer|between:1,12',
            'dob_year' => 'nullable|integer|between:1945,2010',
            'dob_day' => 'nullable|integer|between:1,31',
            'area_code' => 'required|integer|max_digits:2',
            'phone_number' => 'required|integer|digits:10',
            'email_address' => 'nullable|email',
            'address_line1' => 'required|string',
            'address_line2' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'pincode' => 'required|integer|digits:6',
            'skills' => 'required|string',
            'training_or_certifications' => 'nullable|string',
            'reffered_through' => 'required',
            'reffered_through_others' => 'nullable|string',
            'resume' => 'nullable|max:2048|mimes:pdf'
        ]);

        $data['mobile_number'] = $data['phone_number'];
        $data['date_of_birth'] = ($data['dob_year'] == null || $data['dob_month'] == null || $data['dob_day'] == null) ? null : date('Y/m/d', strtotime($data['dob_year'].'/'.$data['dob_month'].'/'.$data['dob_day']));
        $data['reffered_through'] = implode(',', $data['reffered_through']);

        $saveCPData = CandidateProfile::create($data);

        if ($saveCPData) {
            $data['candidate_profile_id'] = $saveCPData->id;
            $saveCSPData = CandidateJobSkill::create($data);

            if ($request->resume) {
                $fileName = time().'_'.$request->resume->getClientOriginalName();
                $filePath = $request->file('resume')->storeAs('uploads', $fileName, 'public');

                $resumePath = base64_encode('/storage/' . $filePath);
                $saveCPData->resume_path = $resumePath;
                $saveCPData->save();
            }

        }

        return back()->with('success','Candidate Profile Created Successfully!');
    }

    public function getData(Request $request) {
        if(request()->ajax()){
            $data = CandidateProfile::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('candidate');
    }

    /**
     * Display the specified resource.
     */
    public function show(CandidateProfile $candidateProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CandidateProfile $candidateProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CandidateProfile $candidateProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CandidateProfile $candidateProfile)
    {
        //
    }
}
