<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrthoChatRequest;
use App\Models\OrthoChat;
use App\Models\Location;
use App\Models\DoctorLocation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrthoChatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ortho_chat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orthoChats = OrthoChat::take(100)->get();
        $locations = Location::pluck('location_name', 'id');
        return view('admin.orthoChats.index', compact('orthoChats','locations'));
    }

    public function show(OrthoChat $orthoChat)
    {
        abort_if(Gate::denies('ortho_chat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.orthoChats.show', compact('orthoChat'));
    }

    public function destroy(OrthoChat $orthoChat)
    {
        abort_if(Gate::denies('ortho_chat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orthoChat->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrthoChatRequest $request)
    {
        OrthoChat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function saveLocation(request $request){
        // dd($request->toArray());
        $doctor_id = request('doctor_id');
        $locations = request('locations');
        $isCreated = 0;
        $oldLocation = DoctorLocation::where('userid',$doctor_id)->pluck('locationid')->toArray();
        // echo '<pre>';
        // print_r($oldLocation);
        // echo '<hr>';
        foreach ($locations as $key => $value) {
            if(!DoctorLocation::where([['locationid',$value],['userid',$doctor_id]])->first()){
                $locationName = Location::select('location_name')->where('id',$value)->first();
                if(!isset($locationName['location_name'])){
                    return response()->json(['msg' => 'Something Went Wrong.','status' => 'error']);
                }
                $data = ['location_name'=>$locationName['location_name'],'locationid' => $value,'userid'=>$doctor_id];
                $Cratelocation = DoctorLocation::create($data);
                if($Cratelocation){
                    $isCreated  = 1;
                }
            }
            // echo $value.' <br>';
            if (($key = array_search($value, $oldLocation)) !== false) {
                unset($oldLocation[$key]);
            }
        }
        // print_r($oldLocation);
        // echo '<hr>';
        if($oldLocation){
            foreach ($oldLocation as $key => $value) {
                if($value){
                    DoctorLocation::where([['locationid',$value],['userid',$doctor_id]])->delete();
                }
            }
        }
        // die;
        if($isCreated){
            $msg = 'Location saved Successfully.';
        }else{
            $msg = '';
        }
            return response()->json(['msg' => $msg,'status' => 'success']);
    }

    public function updateDoctorsStatus(request $request){
        
        if(request('id')){
            OrthoChat::where('id',request('id'))->update(['is_doctor' => request('isCheked')]);
            return response()->json(['msg' => 'Ortho Chat Access Updated','status' => 'success']);
        }
    }
}