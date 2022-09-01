@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.detail-task.actions.edit', ['name' => $detailTask->name]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <detail-task-form
                :action="'{{ $detailTask->resource_url }}'"
                :data="{{ $detailTask->toJson() }}"
                :state="{{$state->toJson()}}"
                :task="{{$task->toJson()}}"
                :user="{{$user->toJson()}}"

                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.detail-task.actions.edit', ['name' => $detailTask->name]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.detail-task.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </detail-task-form>

        </div>

</div>

@endsection
