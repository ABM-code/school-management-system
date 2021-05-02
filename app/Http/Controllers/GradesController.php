<?php

namespace App\Http\Controllers;

use App\Grades;
use App\Http\Requests\StoreGradeRequest;
use Illuminate\Http\Request;

class GradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Grades = Grades::all();
        return view('pages.Grades.Grades', compact('Grades'));
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
    public function store(StoreGradeRequest $request)
    {

        try{

            $validated = $request->validated();
            $Grade = new Grades();


        $Grade->Name = ['en'=>$request->Name_en, 'ar'=>$request->Name];
        $Grade->Notes = $request->Notes;

        /*
        $translations = [     // another way to use translation in tables 'model'
            'en'=> $request->Name_en,
            'ar'=> $request->Name
        ];
        $Grade->setTranslations('Name',$translations);
        */
        $Grade->save();

        toastr()->success(trans('messages.success'));

            return redirect()->route('Grades.index');
        }

        catch(\Exception $e){
           return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function show(Grades $grades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function edit(Grades $grades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grades $grades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grades $grades)
    {
        //
    }
}
