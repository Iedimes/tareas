<div class="form-group row align-items-center" :class="{'has-danger': errors.has('admin_users_id'), 'has-success': fields.admin_users_id && fields.admin_users_id.valid }">
    <label for="admin_users_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.role-admin-user.columns.admin_users_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.admin_users_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('admin_users_id'), 'form-control-success': fields.admin_users_id && fields.admin_users_id.valid}" id="admin_users_id" name="admin_users_id" placeholder="{{ trans('admin.role-admin-user.columns.admin_users_id') }}"> --}}
        <multiselect
        v-model="form.admin_user"
        :options="user"
        :multiple="false"
        track-by="id"
        label="full_name"
        :taggable="true"
        tag-placeholder=""
        placeholder="{{ trans('admin.role-admin-user.columns.admin_users_id') }}">
    </multiselect>
        <div v-if="errors.has('admin_users_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('admin_users_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('roles_id'), 'has-success': fields.roles_id && fields.roles_id.valid }">
    <label for="roles_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.role-admin-user.columns.roles_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.roles_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('roles_id'), 'form-control-success': fields.roles_id && fields.roles_id.valid}" id="roles_id" name="roles_id" placeholder="{{ trans('admin.role-admin-user.columns.roles_id') }}"> --}}
        <multiselect
        v-model="form.role"
        :options="role"
        :multiple="false"
        track-by="id"
        label="name"
        :taggable="true"
        tag-placeholder=""
        placeholder="{{ trans('admin.role-admin-user.columns.roles_id') }}">
    </multiselect>
        <div v-if="errors.has('roles_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('roles_id') }}</div>
    </div>
</div>


