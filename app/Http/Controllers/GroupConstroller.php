<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use DB;
use app\Home;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::where('id_user','=',$request->auth($id))->with(['users','users.id']);;
        return view('Group.index', compact('groups'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Group.create');
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
            'kierunek'               =>  'required',
            'semestr'                =>  'required',
            'gr_dziekanska'          =>  'required',
        ]);
        $group = new Group([
            'id_groups'              =>  $request->get('id_groups'),
            'kierunek'               =>  $request->get('kierunek'),
            'semestr'                =>  $request->get('semestr'),
            'gr_dziekanska'          =>  $request->get('gr_dziekanska'),
            'id_user'                   => $request->get('id_user'),
        ]);
        $group->save();
        return redirect()->route('Group.create')->with('success','Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $Group)
    {
        return view('Group.show', compact('Group'));
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
