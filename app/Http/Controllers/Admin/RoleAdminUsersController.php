<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleAdminUser\BulkDestroyRoleAdminUser;
use App\Http\Requests\Admin\RoleAdminUser\DestroyRoleAdminUser;
use App\Http\Requests\Admin\RoleAdminUser\IndexRoleAdminUser;
use App\Http\Requests\Admin\RoleAdminUser\StoreRoleAdminUser;
use App\Http\Requests\Admin\RoleAdminUser\UpdateRoleAdminUser;
use App\Models\RoleAdminUser;
use App\Models\Role;
use App\Models\AdminUser;
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

class RoleAdminUsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRoleAdminUser $request
     * @return array|Factory|View
     */
    public function index(IndexRoleAdminUser $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(RoleAdminUser::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'admin_user_id', 'role_id'],

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

        return view('admin.role-admin-user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.role-admin-user.create');
        $user=AdminUser::all();
        $role=Role::all();

        return view('admin.role-admin-user.create', compact('role', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleAdminUser $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRoleAdminUser $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['role_id']=  $request->getRoleId();
        $sanitized ['admin_user_id']=  $request->getUserId();


        // Store the RoleAdminUser
        $roleAdminUser = RoleAdminUser::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/role-admin-users'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/role-admin-users');
    }

    /**
     * Display the specified resource.
     *
     * @param RoleAdminUser $roleAdminUser
     * @throws AuthorizationException
     * @return void
     */
    public function show(RoleAdminUser $roleAdminUser)
    {
        $this->authorize('admin.role-admin-user.show', $roleAdminUser);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RoleAdminUser $roleAdminUser
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(RoleAdminUser $roleAdminUser)
    {
        $this->authorize('admin.role-admin-user.edit', $roleAdminUser);

        //return $roleAdminUser->admin_user_id;
        $id = $roleAdminUser->admin_user_id;


        $user=AdminUser::where('id', '=', $id)
                         ->first();

        $cod = $roleAdminUser->role_id;
        $roleA=Role::where('id', '=', $cod)
                    ->select('name')
                    ->first();

        // $role=Role::all();
        $role=Role::where('id', '<>', $cod)
                    ->get();


        return view('admin.role-admin-user.edit', [
            'roleAdminUser' => $roleAdminUser,
            'role' => $role,
            'roleA' => $roleA,
            'user' => $user,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleAdminUser $request
     * @param RoleAdminUser $roleAdminUser
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRoleAdminUser $request, RoleAdminUser $roleAdminUser)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['role_id']=  $request->getRoleId();
        $sanitized ['admin_user_id']=  $request->admin_user_id;

        // Update changed values RoleAdminUser
        $roleAdminUser->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/role-admin-users'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/role-admin-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRoleAdminUser $request
     * @param RoleAdminUser $roleAdminUser
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRoleAdminUser $request, RoleAdminUser $roleAdminUser)
    {
        $roleAdminUser->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRoleAdminUser $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRoleAdminUser $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    RoleAdminUser::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
