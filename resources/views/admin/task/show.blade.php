@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.task.actions.show'))

@section('body')

<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> TAREA
         {{-- @if ($help->statuses->state_id != 4)
         <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0 rounded-pill" href="{{ url('admin/helps') }}" role="button"><i class="fa fa-undo"></i>&nbsp; {{ trans('admin.help.show') }}</a>
         {{-- <a href='admin/helps' class="btn btn-primary"> VOLVER <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-undo'"></i></a> --}}<br>
         {{-- @else
         <a class="btn btn-primasry btn-spinner btn-sm pull-right m-b-0 rounded-pill" href="{{ url('admin/helps/finalizadas') }}" role="button"><i class="fa fa-undo"></i>&nbsp; {{ trans('admin.help.show') }}</a>
        @endif --}}
    </div>

    <div class="card-body">

        <div class="row">
            <div class="form-group col-sm-2">
            <p class="card-text"><strong>PROCESO:</strong>  {{ $task->name }}</p>
            </div>
            <div class="form-group col-sm-3">
                <p class="card-text"><strong>FEC INI:</strong> {{date("d/m/Y", strtotime($task->date_begin))}} </p>

            </div>
            <div class="form-group col-sm-3">
                <p class="card-text"><strong>FEC FIN:</strong> {{date("d/m/Y", strtotime($task->date_end))}}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>DESCRIPCIÓN PROCESO:</strong> {{$task->obs}} </p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-2">
                @if ($task->advance > '100')
                    <p class="card-text"><strong>AVANCE:</strong> 100 %</p>
                @else
                <p class="card-text"><strong>AVANCE:</strong> {{ $task->advance}} %</p>

                {{-- <div class="progress progress-thin">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $task->advance}}%" aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                     </div> --}}
                @endif


            </div>
            <div class="form-group col-sm-3">
                <p class="card-text"><strong>PLAZO_DÍAS:</strong> {{$task->place}} </p>
            </div>

            <div class="form-group col-sm-3">
                <p class="card-text"><strong>DÍAS_RESTANTES:</strong> {{ $dif }} </p>
            </div>

            <div class="form-group col-sm-3">
                @if ($task->priority == 'BAJO')
                    <span class="badge bg-primary">
                        <p class="card-text"><strong>PRIORIDAD:</strong> {{ $task->priority }} </p>
                    </span>
                @endif

                @if ($task->priority == 'MODERADO')
                    <span class="badge bg-warning">
                        <p class="card-text"><strong>PRIORIDAD:</strong> {{ $task->priority }} </p>
                    </span>
                @endif

                @if ($task->priority == 'URGENTE')
                    <span class="badge bg-danger">
                        <p class="card-text"><strong>PRIORIDAD:</strong> {{ $task->priority }} </p>
                    </span>
                @endif


            </div>

            <div class="form-group col-sm-3">
                <p class="card-text"><strong>RESPONSABLE PRINCIPAL:</strong> {{ $task->user->full_name}} </p>
            </div>


        </div>

        <div class="row">

            <div class="form-group col-sm-3">
                <span class="badge bg-success">
                    <p class="card-text"><strong>ESTADO:</strong><span style="text-align:center;"> {{$task->state->name }} </span></p>
                </span>
            </div>

        </div>




    </div>
  </div>

  <detail-task-listing
  :data="{{ $data->toJson() }}"
  :url="'{{ url('admin/detail-tasks') }}'"
  :role= "{{Auth::user()->rol_app->rol_name['id']}}"
  :logueado= "{{Auth::user()->id}}"
  inline-template>

  <div class="row">
      <div class="col">
          <div class="card">
              <div class="card-header">
                <i class="fa fa-align-justify"></i> DETALLE PROCESO
                {{-- Id Rol: {{Auth::user()->rol_app->rol_name['id']}} -- Rolname: {{Auth::user()->rol_app->rol_name['name']}} ---Id usuario.{{Auth::user()->id}} --}}
                {{-- <center><h3>DETALLE TAREA</h3></center> --}}
                    @if ($task->state_id==2 or Auth::user()->rol_app->rol_name['id']==3)

                    @else

                    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/tasks/'.$task->id.'/createdetail') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.detail-task.actions.create') }}</a>
                    @endif

              </div>
              <div class="card-body" v-cloak>
                  <div class="card-block">
                      <form @submit.prevent="">
                          {{-- <div class="row justify-content-md-between">
                              <div class="col col-lg-7 col-xl-5 form-group">
                                  <div class="input-group">
                                      <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                      <span class="input-group-append">
                                          <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                      </span>
                                  </div>
                              </div>
                              <div class="col-sm-auto form-group ">
                                  <select class="form-control" v-model="pagination.state.per_page">

                                      <option value="10">10</option>
                                      <option value="25">25</option>
                                      <option value="100">100</option>
                                  </select>
                              </div>
                          </div> --}}
                      </form>

                      <table class="table table-hover table-listing">
                          <thead>
                              <tr>
                                  {{-- <th class="bulk-checkbox">
                                      <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                      <label class="form-check-label" for="enabled">
                                          #
                                      </label>
                                  </th> --}}

                                  {{-- <th is='sortable' :column="'id'">{{ trans('admin.detail-task.columns.id') }}</th> --}}
                                  <th is='sortable' :column="'name'">{{ trans('admin.detail-task.columns.name') }}</th>
                                  {{-- <th is='sortable' :column="'task_id'">{{ trans('admin.detail-task.columns.task_id') }}</th> --}}
                                  <th is='sortable' :column="'state_id'">{{ trans('admin.detail-task.columns.state_id') }}</th>
                                  <th is='sortable' :column="'date_begin'">{{ trans('admin.detail-task.columns.date_begin') }}</th>
                                  <th is='sortable' :column="'date_end'">{{ trans('admin.detail-task.columns.date_end') }}</th>
                                  <th is='sortable' :column="'obs'">{{ trans('admin.detail-task.columns.obs') }}</th>
                                  <th is='sortable' :column="'user_id'">{{ trans('admin.detail-task.columns.user_id') }}</th>
                                  {{-- <th is='sortable' :column="'advance'">{{ trans('admin.detail-task.columns.advance') }}</th>
                                  <th is='sortable' :column="'place'">{{ trans('admin.detail-task.columns.place') }}</th> --}}

                                  <th></th>
                              </tr>
                              <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                  <td class="bg-bulk-info d-table-cell text-center" colspan="11">
                                      <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/detail-tasks')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                  href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                      <span class="pull-right pr-2">
                                          <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/detail-tasks/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                      </span>

                                  </td>
                              </tr>
                          </thead>
                          <tbody>


                              <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                  {{-- <td class="bulk-checkbox">
                                      <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                      <label class="form-check-label" :for="'enabled' + item.id">
                                      </label>
                                  </td> --}}

                              {{-- <td>@{{ item.id }}</td> --}}
                                  <td>@{{ item.name }}</td>
                                  {{-- <td>@{{ item.task.name}}</td> --}}
                                  <td>@{{ item.state.name }}</td>
                                  <td>@{{ item.date_begin | date }}</td>
                                  <td>@{{ item.date_end | date }}</td>
                                  <td>@{{ item.obs }}</td>
                                  <td>@{{ item.users.full_name }}</td>
                                  {{-- <td>@{{ item.roldetalle.role_id }} %</td>
                                  <td>@{{ logueado }}</td> --}}

                                  <td>
                                    <div class="row no-gutters">




                                        <div class="col-auto" v-if="role==3 && item.roldetalle.role_id==3 && item.users.id==logueado && item.state.name!='FINALIZADO'">



                                            <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                        </div>


                                        <div class="col-auto" v-if="role!=3 && item.state.name!='FINALIZADO'">



                                            <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>

                                        </div>

                                        <form class="col" @submit.prevent="deleteItem(item.resource_url)" v-if="role!=3 && item.state.name!='FINALIZADO'">
                                            <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                        </form>











                                        <form class="col" @submit.prevent="deleteItem(item.resource_url)" v-if="item.state.name=='FINALIZADO'">

                                        </form>

                                        {{-- <form class="col" @submit.prevent="deleteItem(item.resource_url)" v-else>
                                          <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                        </form> --}}



                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                      <div class="row" v-if="pagination.state.total > 0">
                          <div class="col-sm">
                              <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                          </div>
                          <div class="col-sm-auto">
                              <pagination></pagination>
                          </div>
                      </div>

                      <div class="no-items-found" v-if="!collection.length > 0">
                          {{-- <i class="icon-magnifier"></i>
                          <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                          <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                          <a class="btn btn-primary btn-spinner" href="{{ url('admin/detail-tasks/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.detail-task.actions.create') }}</a> --}}
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</detail-task-listing>


@endsection
