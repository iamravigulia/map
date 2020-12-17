<?php

namespace edgewizz\map\Controllers;
use App\Http\Controllers\Controller;
use Edgewizz\Edgecontent\Models\ProblemSetQues;
use Edgewizz\Map\Models\MapQues;
use Illuminate\Http\Request;

class MapController extends Controller
{
    //
    public function test(){
        dd('hello lara');
    }
    public function store(Request $request){
        $Q = new MapQues();
        $Q->question = $request->paragraph;
        $Q->difficulty_level_id = $request->difficulty_level_id;
        $Q->error = $request->error;
        $Q->save();
        if($request->problem_set_id && $request->format_type_id){
            $pbq = new ProblemSetQues();
            $pbq->problem_set_id = $request->problem_set_id;
            $pbq->question_id = $Q->id;
            $pbq->format_type_id = $request->format_type_id;
            $pbq->save();
        }
        return back();
    }
    public function update($id, Request $request){
        $Q = MapQues::findOrFail($id);
        $Q->question = $request->paragraph;
        $Q->error = $request->error;
        $Q->difficulty_level_id = $request->difficulty_level_id;
        $Q->save();
    }
    public function inactive($id){
        $f = MapQues::where('id', $id)->first();
        $f->active = '0';
        $f->save();
        return back();
    }
    public function active($id){
        $f = MapQues::where('id', $id)->first();
        $f->active = '1';
        $f->save();
        return back();
    }
}
