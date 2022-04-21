<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\OrthoChatResource;
use App\Http\Requests\StoreOrthoChatRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\OrthoChat;
// use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrthoChatApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        // abort_if(Gate::denies('ortho_chat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return new OrthoChatResource(OrthoChat::all());
    }

    public function store(StoreOrthoChatRequest $request)
    {
        $imageUrl = '';
        $orthoChat = OrthoChat::create($request->all());
        if($request->hasFile('user_image_url') && $request->file('user_image_url')->isValid()){
            $orthoChat->addMediaFromRequest('user_image_url')->toMediaCollection('user_image_url');
            $imageUrl = $orthoChat->user_image_url->url;
        }
        
        $data = [
            'first_name'    =>  $orthoChat->first_name,
            'last_name'     =>  $orthoChat->last_name,
            'phone_number'  =>  $orthoChat->phone_number,
            'email'         =>  $orthoChat->email,
            'os'            =>  $orthoChat->os,
            'device_id'     =>  $orthoChat->device_id,
            'is_doctor'     =>  $orthoChat->is_doctor ?? false,
            'userId'        =>  $orthoChat->id,
            'dateCreated'   =>  $orthoChat->created_at,
            'userImageURL'  =>  $imageUrl
        ];
        return (new OrthoChatResource($data))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(OrthoChat $orthoChat)
    {
        // abort_if(Gate::denies('ortho_chat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrthoChatResource($orthoChat);
    }

    public function update(StoreOrthoChatRequest $request, OrthoChat $orthoChat)
    {
        $orthoChat->update($request->all());

        return (new CasesModalResource($orthoChat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(OrthoChat $orthoChat)
    {
        // abort_if(Gate::denies('ortho_chat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orthoChat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function allDoctors(request $request){
        if(request('id')){
            $id = request('id');
            $data = OrthoChat::where('id',$id)->orderBy('id','desc')->first();
        }else{
            $data = OrthoChat::orderBy('id','desc')->get();
        }
        return new OrthoChatResource($data);
    }
}
