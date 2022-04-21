<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyLocationRequest;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;
use App\Models\Location;
use App\Models\LocationHoursDetails;
use Gate,Admin;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class LocationsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('location_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $locations = Location::with(['media'])->orderBy('id','desc')->get();

        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        abort_if(Gate::denies('location_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.locations.create');
    }

    public function store(StoreLocationRequest $request)
    {
        $location = Location::create($request->all());

        if ($request->input('location_imagepath', false)) {
            $location->addMedia(storage_path('tmp/uploads/' . basename($request->input('location_imagepath'))))->toMediaCollection('location_imagepath');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $location->id]);
        }
        Admin::saveHourArray($location->id,request('opening_time'),request('closing_time'));
        return redirect()->route('admin.locations.index');
    }

    public function edit(Location $location)
    {
        abort_if(Gate::denies('location_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // echo '<pre>';print_r($location);die;
        return view('admin.locations.edit', compact('location'));
    }

    public function update(UpdateLocationRequest $request, Location $location)
    {
        $location->update($request->all());

        if ($request->input('location_imagepath', false)) {
            if (!$location->location_imagepath || $request->input('location_imagepath') !== $location->location_imagepath->file_name) {
                if ($location->location_imagepath) {
                    $location->location_imagepath->delete();
                }
                $location->addMedia(storage_path('tmp/uploads/' . basename($request->input('location_imagepath'))))->toMediaCollection('location_imagepath');
            }
        } elseif ($location->location_imagepath) {
            $location->location_imagepath->delete();
        }
        Admin::saveHourArray($location->id,request('opening_time'),request('closing_time'),request('hourId'));
        
        return redirect()->route('admin.locations.index');
    }

    public function show(Location $location)
    {
        abort_if(Gate::denies('location_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $location->load('locationUsers');

        return view('admin.locations.show', compact('location'));
    }

    public function destroy(Location $location)
    {
        abort_if(Gate::denies('location_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $location->delete();

        return back();
    }

    public function massDestroy(MassDestroyLocationRequest $request)
    {
        Location::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('location_create') && Gate::denies('location_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Location();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
