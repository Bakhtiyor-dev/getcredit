<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Subject\BulkDestroySubject;
use App\Http\Requests\Admin\Subject\DestroySubject;
use App\Http\Requests\Admin\Subject\IndexSubject;
use App\Http\Requests\Admin\Subject\StoreSubject;
use App\Http\Requests\Admin\Subject\UpdateSubject;
use App\Models\Subject;
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

class SubjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSubject $request
     * @return array|Factory|View
     */
    public function index(IndexSubject $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Subject::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'status'],

            // set columns to searchIn
            ['id', 'title']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.subject.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.subject.create');

        return view('admin.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSubject $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSubject $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Subject
        $subject = Subject::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/subjects'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/subjects');
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @throws AuthorizationException
     * @return void
     */
    public function show(Subject $subject)
    {
        $this->authorize('admin.subject.show', $subject);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Subject $subject
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Subject $subject)
    {
        $this->authorize('admin.subject.edit', $subject);


        return view('admin.subject.edit', [
            'subject' => $subject,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSubject $request
     * @param Subject $subject
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSubject $request, Subject $subject)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Subject
        $subject->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/subjects'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySubject $request
     * @param Subject $subject
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySubject $request, Subject $subject)
    {
        $subject->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySubject $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySubject $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Subject::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
