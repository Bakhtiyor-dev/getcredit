<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\File\BulkDestroyFile;
use App\Http\Requests\Admin\File\DestroyFile;
use App\Http\Requests\Admin\File\IndexFile;
use App\Http\Requests\Admin\File\StoreFile;
use App\Http\Requests\Admin\File\UpdateFile;
use App\Models\File;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class FilesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexFile $request
     * @return array|Factory|View
     */
    public function index(IndexFile $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(File::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'url', 'subject_id', 'imported'],

            // set columns to searchIn
            ['id', 'url']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.file.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.file.create');

        return view('admin.file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFile $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreFile $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the File
        $file = File::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/files'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/files');
    }

    /**
     * Display the specified resource.
     *
     * @param File $file
     * @throws AuthorizationException
     * @return void
     */
    public function show(File $file)
    {
        $this->authorize('admin.file.show', $file);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param File $file
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(File $file)
    {
        $this->authorize('admin.file.edit', $file);


        return view('admin.file.edit', [
            'file' => $file,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFile $request
     * @param File $file
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateFile $request, File $file)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values File
        $file->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/files'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/files');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyFile $request
     * @param File $file
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyFile $request, File $file)
    {
        $file->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyFile $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyFile $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    File::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
