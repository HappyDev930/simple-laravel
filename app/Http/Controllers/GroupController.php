<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use Validator;

class GroupController extends Controller
{
    public function list() {
        $groups = Group::All();
        return response()->json($groups);
    } 

    public function save(Request $request){
        if($request->input('id')){
            $group = Group::find($request->input('id'));
        } else {
            $group = new Group();
        }
        $group->code = $request->input('code');
        $group->name = $request->input('name');
        $group->maximum_students = $request->input('maximum_students');
        if($request->input('status')) {
            $status = 1;
        }
        else {
            $status = 0;
        }
        $group->status = $status;
        $group->description = $request->input('description');
        $group->save();
        return response()->json('Added Successfully');
    }

    public function getClassDetail($id) {
        $group = Group::find($id);
        return response()->json($group);
    }

    public function delete($id){
        $group = Group::find($id);
        $group->delete();
        return response()->json('deleted successfully');
    }
}
