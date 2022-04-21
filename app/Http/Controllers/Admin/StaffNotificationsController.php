<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStaffNotificationRequest;
use App\Http\Requests\StoreStaffNotificationRequest;
use App\Http\Requests\UpdateStaffNotificationRequest;
use App\Models\StaffNotification;
use App\Models\Location;
use App\Models\LocationUser;
use App\Models\User;
use App\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffNotificationsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $locations = Location::pluck('location_name', 'id');
        $staffNotifications = StaffNotification::orderBy('id','desc')->get();
        $roles = Role::get();
        return view('admin.staffNotifications.index', compact('staffNotifications','locations','roles'));
    }

    public function create()
    {
        abort_if(Gate::denies('staff_notification_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staffNotifications.create');
    }

    public function store(StoreStaffNotificationRequest $request)
    {
        $staffNotification = StaffNotification::create($request->all());

        return redirect()->route('admin.staff-notifications.index');
    }

    public function edit(StaffNotification $staffNotification)
    {
        abort_if(Gate::denies('staff_notification_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staffNotifications.edit', compact('staffNotification'));
    }

    public function update(UpdateStaffNotificationRequest $request, StaffNotification $staffNotification)
    {
        $staffNotification->update($request->all());

        return redirect()->route('admin.staff-notifications.index');
    }

    public function show(StaffNotification $staffNotification)
    {
        abort_if(Gate::denies('staff_notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staffNotifications.show', compact('staffNotification'));
    }

    public function destroy(StaffNotification $staffNotification)
    {
        abort_if(Gate::denies('staff_notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffNotification->delete();

        return back();
    }

    public function massDestroy(MassDestroyStaffNotificationRequest $request)
    {
        StaffNotification::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function getUser(request $request){
        if(request('id')){
            $id = request('id');
            $user = User::where('id',$id)->first();
            $userLocation = LocationUser::where('user_id',$id)->pluck('location_id');
            return response()->json(['data' => $user,'userLocation' => $userLocation,'msg' => 'Staff retrieve successfully.','status' => 'success']);
        }
    }
    public function updateStaff(request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        unset($data['locations']);
        staffNotification::where('id',request('id'))->update($data);
        $user = User::where('id',$data['id'])->first();
        $user->locations()->sync($request->input('locations', []));
        return response()->json(['msg' => 'Staff updated successfully.','status' => 'success']);
    }
}
