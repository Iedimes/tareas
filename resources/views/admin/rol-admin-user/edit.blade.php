@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.rol-admin-user.actions.edit', ['name' => $rolAdminUser->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <rol-admin-user-form
                :action="'{{ $rolAdminUser->resource_url }}'"
                :data="{{ $rolAdminUser->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.rol-admin-user.actions.edit', ['name' => $rolAdminUser->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.rol-admin-user.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </rol-admin-user-form>

        </div>
    
</div>

@endsection