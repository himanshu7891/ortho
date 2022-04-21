<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCasesModalApiRequest;
use App\Http\Requests\UpdateCasesModalRequest;
use App\Http\Resources\Admin\CasesModalResource;
use App\Models\CasesModal;
use App\Models\OrthoChat;
use App\Models\Collaborator;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CasesModalApiController extends Controller
{
    public function index()
    {
        // abort_if(Gate::denies('cases_modal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CasesModalResource(CasesModal::all());
    }

    public function store(StoreCasesModalApiRequest $request)
    {
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
        // echo '<pre>';
        // print_r();
        // echo '<hr>';
        // print_r($collaboratorArray);
        // die;
        Collaborator::insert($collaboratorArray);
        return (new CasesModalResource($casesModal))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CasesModal $casesModal)
    {
        abort_if(Gate::denies('cases_modal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CasesModalResource($casesModal);
    }

    public function update(StoreCasesModalApiRequest $request, CasesModal $casesModal)
    {
        $casesModal->update($request->all());

        return (new CasesModalResource($casesModal))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CasesModal $casesModal)
    {
        abort_if(Gate::denies('cases_modal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $casesModal->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
