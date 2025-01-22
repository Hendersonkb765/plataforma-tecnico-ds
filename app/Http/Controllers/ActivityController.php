<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Requests\StoreActivityRequest;
use Inertia\Inertia;



class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('RegisterActivity');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreActivityRequest $request)
    {
        $validated = $request->validated();
        $activity = Activity::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'expiration_date' => $validated['expirationDate'],
            'max_grade' => $validated['maxGrade'],
            'max_score' => $validated['maxScore'],
            'link' => $validated['link'],
            'discipline_id' => $validated['disciplineId'],
            'teacher_id' => $validated['teacherId']
            
        ]);

        return response()->json(['status'=>200, $activity]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
