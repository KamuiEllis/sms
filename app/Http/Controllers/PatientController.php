<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Worker;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();
        return view('patients', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $workers = Worker::all();
        return view('createPatient', ['workers' => $workers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'caretaker' => ['required', 'string', 'max:255'],
        ]);

        Patient::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'age' => $request->age,
            'caretaker' => $request->caretaker,
            'records' => $request->records
        ]);

        $workers = Worker::all();
        return view('createPatient', ['workers' => $workers, 'message' => 'Patient added!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function show($id)
    {
        $patient = Patient::where('id', $id)->first();
        $workers = Worker::all();
        return View('viewPatient', ['patient' => $patient, 'workers' => $workers]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Patient $patient)
    {
        $inputs = $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:255'],
            'caretaker' => ['required', 'string', 'max:255'],
        ]);
        $patient->update($inputs);
        $workers = Worker::all();
        return View('viewPatient', ['patient' => $patient, 'message' => 'Patient Updated',  'workers' => $workers]);
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
    public function destroy(Patient $patient)
    {
        $patient->delete();
        $patients = Patient::all();
        return view('patients', ['patients' => $patients, 'message' => "Patient Deleted"]);
    }
}
