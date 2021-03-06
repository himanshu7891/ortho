<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffNotificationRequest;
use App\Http\Requests\UpdateStaffNotificationRequest;
use App\Http\Resources\Admin\StaffNotificationResource;
use App\Models\StaffNotification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StaffNotificationsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staff_notification_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StaffNotificationResource(StaffNotification::all());
    }

    public function store(StoreStaffNotificationRequest $request)
    {
        $staffNotification = StaffNotification::create($request->all());

        return (new StaffNotificationResource($staffNotification))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(StaffNotification $staffNotification)
    {
        abort_if(Gate::denies('staff_notification_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StaffNotificationResource($staffNotification);
    }

    public function update(UpdateStaffNotificationRequest $request, StaffNotification $staffNotification)
    {
        $staffNotification->update($request->all());

        return (new StaffNotificationResource($staffNotification))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(StaffNotification $staffNotification)
    {
        abort_if(Gate::denies('staff_notification_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staffNotification->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
