<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocLibraryRequest;
use App\Http\Requests\StoreDocLibraryRequest;
use App\Http\Requests\UpdateDocLibraryRequest;
use App\Models\DocLibrary;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DocLibraryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('doc_library_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $docLibraries = DocLibrary::with(['media'])->get();
        return view('admin.docLibraries.index', compact('docLibraries'));
    }

    public function create()
    {
        abort_if(Gate::denies('doc_library_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.docLibraries.create');
    }

    public function store(StoreDocLibraryRequest $request)
    {
        $docLibrary = DocLibrary::create($request->all());

        if ($request->input('url_path', false)) {
            $docLibrary->addMedia(storage_path('tmp/uploads/' . basename($request->input('url_path'))))->toMediaCollection('url_path');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $docLibrary->id]);
        }

        return redirect()->route('admin.doc-libraries.index');
    }

    public function edit(DocLibrary $docLibrary)
    {
        abort_if(Gate::denies('doc_library_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.docLibraries.edit', compact('docLibrary'));
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

        return redirect()->route('admin.doc-libraries.index');
    }

    public function show(DocLibrary $docLibrary)
    {
        abort_if(Gate::denies('doc_library_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.docLibraries.show', compact('docLibrary'));
    }

    public function destroy(DocLibrary $docLibrary)
    {
        abort_if(Gate::denies('doc_library_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $docLibrary->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocLibraryRequest $request)
    {
        DocLibrary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('doc_library_create') && Gate::denies('doc_library_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DocLibrary();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
