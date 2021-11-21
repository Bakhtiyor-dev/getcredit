<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Test\BulkDestroyTest;
use App\Http\Requests\Admin\Test\DestroyTest;
use App\Http\Requests\Admin\Test\IndexTest;
use App\Http\Requests\Admin\Test\StoreTest;
use App\Http\Requests\Admin\Test\UpdateTest;
use App\Models\Test;
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

class TestsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTest $request
     * @return array|Factory|View
     */
    public function index(IndexTest $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Test::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'answers', 'correct_answer_id', 'subject_id', 'status'],

            // set columns to searchIn
            ['id', 'question', 'answers']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.test.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.test.create');

        return view('admin.test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTest $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTest $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Test
        $test = Test::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tests'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tests');
    }

    /**
     * Display the specified resource.
     *
     * @param Test $test
     * @throws AuthorizationException
     * @return void
     */
    public function show(Test $test)
    {
        $this->authorize('admin.test.show', $test);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Test $test
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Test $test)
    {
        $this->authorize('admin.test.edit', $test);


        return view('admin.test.edit', [
            'test' => $test,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTest $request
     * @param Test $test
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTest $request, Test $test)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Test
        $test->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tests'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTest $request
     * @param Test $test
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTest $request, Test $test)
    {
        $test->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTest $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTest $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Test::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
