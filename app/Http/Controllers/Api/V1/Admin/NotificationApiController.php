<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\OrthoChatResource;
use App\Http\Requests\StoreOrthoChatRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Notification;
// use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotificationApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        // abort_if(Gate::denies('ortho_chat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return new OrthoChatResource(Notification::all());
    }

    // public function store(StoreOrthoChatRequest $request)
    // {
    //     $imageUrl = '';
    //     $notification = Notification::create($request->all());
    //     if($request->hasFile('user_image_url') && $request->file('user_image_url')->isValid()){
    //         $notification->addMediaFromRequest('user_image_url')->toMediaCollection('user_image_url');
    //         $imageUrl = $notification->user_image_url->url;
    //     }
        
    //     $data['items'] = [
    //         'first_name'    =>  $notification->first_name,
    //         'last_name'     =>  $notification->last_name,
    //         'phone_number'  =>  $notification->phone_number,
    //         'email'         =>  $notification->email,
    //         'os'            =>  $notification->os,
    //         'device_id'     =>  $notification->device_id,
    //         'is_doctor'     =>  $notification->is_doctor ?? false,
    //         'userId'        =>  $notification->id,
    //         'dateCreated'   =>  $notification->created_at,
    //         'userImageURL'  =>  $imageUrl
    //     ];
    //     return (new OrthoChatResource($data))
    //         ->response()
    //         ->setStatusCode(Response::HTTP_CREATED);
    // }

    public function show(Notification $notification)
    {
        // abort_if(Gate::denies('ortho_chat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new OrthoChatResource($notification);
    }

    public function update(StoreOrthoChatRequest $request, Notification $notification)
    {
        $notification->update($request->all());

        return (new CasesModalResource($notification))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Notification $notification)
    {
        // abort_if(Gate::denies('ortho_chat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $notification->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function allDoctors(request $request){
        if(request('id')){
            $id = request('id');
            $data = Notification::where('id',$id)->orderBy('id','desc')->first();
        }else{
            $data = Notification::orderBy('id','desc')->get();
        }
        return new OrthoChatResource($data);
    }
}
