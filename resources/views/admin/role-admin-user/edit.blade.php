@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.role-admin-user.actions.edit', ['name' => $roleAdminUser->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <role-admin-user-form
                :action="'{{ $roleAdminUser->resource_url }}'"
                :data="{{ $roleAdminUser->toJson() }}"
                :role="{{$role->toJson()}}"
                :user="{{$user->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        {{-- <i class="fa fa-pencil"></i> {{ trans('admin.role-admin-user.actions.edit', ['name' => $roleAdminUser->id]) }}--}} <h4>{{ $user->full_name }} <br> {{ $roleA->name }}</h4>
                    </div>

                    <div class="card-body">
                        @include('admin.role-admin-user.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </role-admin-user-form>

        </div>

</div>

@endsection
