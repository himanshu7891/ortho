<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCasesModalRequest;
use App\Http\Requests\StoreCasesModalRequest;
use App\Http\Requests\UpdateCasesModalRequest;
use App\Models\CasesModal;
use App\Models\OrthoChat;
use App\Models\Status;
use App\Models\Collaborator;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CasesModalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cases_modal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casesModals = CasesModal::orderBy('id','desc')->get();

        return view('admin.casesModals.index', compact('casesModals'));
    }

    public function create()
    {
        abort_if(Gate::denies('cases_modal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $doctors = OrthoChat::orderBy('id','desc')->get();
        return view('admin.casesModals.create',compact('doctors'));
    }

    public function store(StoreCasesModalRequest $request)
    {
        // $status = Status::first();
        $data = $request->all();
        $status_id = $data['status_id'] == 0 ? 1 : 2;
        $data['status_id'] = $status_id;
        $data['originator_id'] = $data['originator'];
        if($data['originator_id']){
            $originator_name = OrthoChat::select('first_name','last_name')->where('id',$data['originator_id'])->first();
            if($originator_name){
                $data['originator_name'] = $originator_name->first_name ." ". $originator_name->last_name;
            }
        }
        if($data['collaborator']){
            $collaborators = OrthoChat::select('id','first_name','last_name')->whereIn('id',$data['collaborator'])->get();
            $collaboratorsName = [];
            foreach ($collaborators as $key => $value) {
                if($collaborators){
                    array_push($collaboratorsName, ['s' => $value->first_name ." ". $value->last_name]);
                }
            }
                    $data['colobrator_name'] = json_encode($collaboratorsName);
        }
        $casesModal = CasesModal::create($data);
        foreach ($data['collaborator'] as $key => $value) {
            $collaboratorArray[] = ['originator_id' => $data['originator_id'],'collaborator_id' => $value,'case_id' => $casesModal->id,'status_id' => $status_id];
        }
        Collaborator::insert($collaboratorArray);
        // echo '<pre>';
        // print_r($data);
        // echo '<hr>';
        // print_r($collaboratorArray);
        // echo  $casesModal->id;die;
        return redirect()->route('admin.cases-modals.index');
    }

    public function edit(CasesModal $casesModal)
    {
        abort_if(Gate::denies('cases_modal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $doctors = OrthoChat::orderBy('id','desc')->get();
        $collaborators = Collaborator::where([['case_id',$casesModal->id],['originator_id',$casesModal->originator_id]])->pluck('id')->toArray();
        return view('admin.casesModals.edit', compact('casesModal','doctors','collaborators'));
    }

    public function update(UpdateCasesModalRequest $request, CasesModal $casesModal)
    {
        $data = $request->all();
        $oldCollaborator = Collaborator::where([['case_id',$casesModal->id],['originator_id',$casesModal->originator_id]])->pluck('collaborator_id')->toArray();
        // echo '<pre>';
        // print_r($data);
        // echo $casesModal->id;
        // die;
        $status_id = $data['status_id'] == 0 ? 1 : 2;
        $data['status_id'] = $status_id;
        $data['originator_id'] = $data['originator'];
        if($data['originator_id']){
            $originator_name = OrthoChat::select('first_name','last_name')->where('id',$data['originator_id'])->first();
            if($originator_name){
                $data['originator_name'] = $originator_name->first_name ." ". $originator_name->last_name;
            }
        }
        //Collaborator
        if($data['collaborator']){
            $collaborators = OrthoChat::select('id','first_name','last_name')->whereIn('id',$data['collaborator'])->get();
            $collaboratorsName = [];
            foreach ($collaborators as $key => $value) {
                if(!Collaborator::where([['case_id',$casesModal->id],['originator_id',$casesModal->originator_id],['collaborator_id',$value->id]])->first()){
                    if($collaborators){
                        array_push($collaboratorsName, ['s' => $value->first_name ." ". $value->last_name]);
                    }
                }
            }
            $data['colobrator_name'] = json_encode($collaboratorsName);
        }
        //--------------------------
        foreach ($data['collaborator'] as $key => $value) {
            if(!Collaborator::where([['case_id',$casesModal->id],['originator_id',$casesModal->originator_id],['collaborator_id',$value]])->first()){
                $collaboratorArray[] = ['originator_id' => $data['originator_id'],'collaborator_id' => $value,'case_id' => $casesModal->id,'status_id' => $status_id];
            }
            if (($key = array_search($value, $oldCollaborator)) !== false) {
                unset($oldCollaborator[$key]);
            }
        }
        //Delete Collaborator
        if($oldCollaborator){
            foreach ($oldCollaborator as $key => $value) {
                if($value){
                    Collaborator::where([['case_id',$casesModal->id],['originator_id',$casesModal->originator_id],['collaborator_id',$value]])->delete();
                }
            }
        }
        echo '<pre>';
        print_r($request->all());
        echo '<hr>';
        print_r($data);
        echo '<hr>';
        print_r($collaboratorArray);
        // $casesModal->update($data);
        // Collaborator::insert($collaboratorArray);
        
        return redirect()->route('admin.cases-modals.index');
    }

    public function show(CasesModal $casesModal)
    {
        abort_if(Gate::denies('cases_modal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.casesModals.show', compact('casesModal'));
    }

    public function destroy(CasesModal $casesModal)
    {
        abort_if(Gate::denies('cases_modal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casesModal->delete();

        return back();
    }

    public function massDestroy(MassDestroyCasesModalRequest $request)
    {
        CasesModal::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
