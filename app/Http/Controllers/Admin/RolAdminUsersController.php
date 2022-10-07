<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RolAdminUser\BulkDestroyRolAdminUser;
use App\Http\Requests\Admin\RolAdminUser\DestroyRolAdminUser;
use App\Http\Requests\Admin\RolAdminUser\IndexRolAdminUser;
use App\Http\Requests\Admin\RolAdminUser\StoreRolAdminUser;
use App\Http\Requests\Admin\RolAdminUser\UpdateRolAdminUser;
use App\Models\RoleAdminUser;
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

class RolAdminUsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRolAdminUser $request
     * @return array|Factory|View
     */
    public function index(IndexRolAdminUser $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(RolAdminUser::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'user_id', 'rol_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.rol-admin-user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.rol-admin-user.create');

        return view('admin.rol-admin-user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRolAdminUser $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRolAdminUser $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the RolAdminUser
        $rolAdminUser = RolAdminUser::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/rol-admin-users'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/rol-admin-users');
    }

    /**
     * Display the specified resource.
     *
     * @param RolAdminUser $rolAdminUser
     * @throws AuthorizationException
     * @return void
     */
    public function show(RolAdminUser $rolAdminUser)
    {
        $this->authorize('admin.rol-admin-user.show', $rolAdminUser);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RolAdminUser $rolAdminUser
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(RolAdminUser $rolAdminUser)
    {
        $this->authorize('admin.rol-admin-user.edit', $rolAdminUser);


        return view('admin.rol-admin-user.edit', [
            'rolAdminUser' => $rolAdminUser,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRolAdminUser $request
     * @param RolAdminUser $rolAdminUser
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRolAdminUser $request, RolAdminUser $rolAdminUser)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values RolAdminUser
        $rolAdminUser->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/rol-admin-users'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/rol-admin-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRolAdminUser $request
     * @param RolAdminUser $rolAdminUser
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRolAdminUser $request, RolAdminUser $rolAdminUser)
    {
        $rolAdminUser->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRolAdminUser $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRolAdminUser $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    RolAdminUser::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
