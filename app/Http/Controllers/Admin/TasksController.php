<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Task\BulkDestroyTask;
use App\Http\Requests\Admin\Task\DestroyTask;
use App\Http\Requests\Admin\Task\IndexTask;
use App\Http\Requests\Admin\Task\StoreTask;
use App\Http\Requests\Admin\Task\UpdateTask;
use App\Models\Task;
use App\Models\DetailTask;
use App\Models\AdminUser;
use App\Models\State;
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
use Carbon\Carbon;


class TasksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTask $request
     * @return array|Factory|View
     */
    public function index(Task $task,IndexTask $request)
    {
        // create and AdminListing instance for a specific model and
        $id = $task->id;

        $data = AdminListing::create(Task::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'date_begin', 'date_end', 'obs', 'state_id', 'advance', 'place','priority'],

            // set columns to searchIn
            ['id', 'name', 'obs']
        );


        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.task.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.task.create');

        $state = State::all();


        return view('admin.task.create', compact('state'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTask $request
     * @return array|RedirectResponse|Redirector
     *
     *
     */


    public function createdetail()
    {

        $this->authorize('admin.detail-task.create');

        $state = State::all();
        $user = AdminUser::all();
        //$task = Task::find($id);
        $task = Task::all();

        return view('admin.detail-task.create', compact('state', 'task', 'user'));
    }


    public function store(StoreTask $request)
    {
        $request;
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['state_id']=  $request->getStateId();

        // Store the Task
        $task = Task::create($sanitized);

        $task1 = Task::find($task->id);
        $inicio = Carbon::create($request->date_begin);
        $fin = Carbon::create($request->date_end);
        $diferencia = $fin->diffInDays($inicio);
        $task1->place = $diferencia;
        $task1->save();


        if ($request->ajax()) {
            return ['redirect' => url('admin/tasks'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];


        }

        return redirect('admin/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @throws AuthorizationException
     * @return void
     */
    public function show(Task $task, IndexTask $request)
    {
       // $this->authorize('admin.task.show', $task);
        // TODO your code goes here

    $id = $task->id;


    $resto=Task::find($id);
    $fecha_fin = $resto->date_end;
    $fecha_actual = Carbon::now();
    $dif = $fecha_fin->diffInDays($fecha_actual);


      $data = AdminListing::create(DetailTask::class)->processRequestAndGet(
        // pass the request with params
        $request,

        // set columns to query
        ['id', 'name', 'task_id', 'state_id', 'date_begin', 'date_end', 'obs', 'user_id', 'advance', 'place'],

        // set columns to searchIn
        ['id', 'name', 'obs'],


            function ($query) use ($id) {
                                       $query
                    ->where('detail_tasks.task_id', '=', $id);

            }
        );

        return view('admin.task.show', compact('task', 'data', 'dif') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Task $task)
    {
        $this->authorize('admin.task.edit', $task);
        $state = State::all();


        return view('admin.task.edit', [
            'task' => $task,
            'state' => $state,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTask $request
     * @param Task $task
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTask $request, Task $task)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized ['state_id']=  $request->getStateId();

        //Actualizar calculo de fecha
        $task1 = Task::find($task->id);
        $inicio = Carbon::create($request->date_begin);
        $fin = Carbon::create($request->date_end);
        $diferencia = $fin->diffInDays($inicio);
        $task1->place = $diferencia;
        $task1->update();



        // Update changed values Task
        $task->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tasks'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTask $request
     * @param Task $task
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTask $request, Task $task)
    {
        $task->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTask $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTask $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Task::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
