<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Lesson;
use DB;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::get();
        return view('Lesson.index', compact('lessons'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Lesson.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                        'oc1_z1'        =>  'required',
            'oc2_z1'        =>  'required',
            'oc3_z1'        =>  'required',
            'date_z1'      =>  'required',
            'nr_cw_z1'      =>  'required',
        ]);
        $group = new Lesson([
            'oc1_z1'        =>  $request->get('oc1_z1'),
            'oc2_z1'        =>  $request->get('oc2_z1'),
            'oc3_z1'        =>  $request->get('oc3_z1'),
            'date_z1'       =>  $request->get('date_z1'),
            'nr_cw_z1'      =>  $request->get('nr_cw_z1'),
        ]);
        $group->save();
        return redirect()->route('Lesson.create')->with('success','Data Added');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $Group)
    {
        return view('Lesson.show', compact('Lesson'));
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
    public function update(Request $request)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
    
}