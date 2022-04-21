<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDocLibraryRequest;
use App\Http\Requests\UpdateDocLibraryRequest;
use App\Http\Resources\Admin\DocLibraryResource;
use App\Models\DocLibrary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DocLibraryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('doc_library_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocLibraryResource(DocLibrary::all());
    }

    public function store(StoreDocLibraryRequest $request)
    {
        $docLibrary = DocLibrary::create($request->all());

        if ($request->input('url_path', false)) {
            $docLibrary->addMedia(storage_path('tmp/uploads/' . basename($request->input('url_path'))))->toMediaCollection('url_path');
        }

        return (new DocLibraryResource($docLibrary))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DocLibrary $docLibrary)
    {
        abort_if(Gate::denies('doc_library_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DocLibraryResource($docLibrary);
    }

    public function update(UpdateDocLibraryRequest $request, DocLibrary $docLibrary)
    {
        $docLibrary->update($request->all());

        if ($request->input('url_path', false)) {
            if (!$docLibrary->url_path || $request->input('url_path') !== $docLibrary->url_path->file_name) {
                if ($docLibrary->url_path) {
                    $docLibrary->url_path->delete();
                }
                $docLibrary->addMedia(storage_path('tmp/uploads/' . basename($request->input('url_path'))))->toMediaCollection('url_path');
            }
        } elseif ($docLibrary->url_path) {
            $docLibrary->url_path->delete();
        }

        return (new DocLibraryResource($docLibrary))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DocLibrary $docLibrary)
    {
        abort_if(Gate::denies('doc_library_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $docLibrary->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
