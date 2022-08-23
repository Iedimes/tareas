<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detail-task.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.detail-task.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('task_id'), 'has-success': fields.task_id && fields.task_id.valid }">
    <label for="task_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.state_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
            v-model="form.task"
            :options="task"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.task.columns.task_id') }}">
        </multiselect>
        <div v-if="errors.has('task_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('task_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('state_id'), 'has-success': fields.state_id && fields.state_id.valid }">
    <label for="state_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.state_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect
            v-model="form.state"
            :options="state"
            :multiple="false"
            track-by="id"
            label="name"
            :taggable="true"
            tag-placeholder=""
            placeholder="{{ trans('admin.task.columns.state_id') }}">
        </multiselect>
        <div v-if="errors.has('state_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('state_id') }}</div>
    </div>
</div>
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date_begin'), 'has-success': fields.date_begin && fields.date_begin.valid }">
    <label for="date_begin" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detail-task.columns.date_begin') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date_begin" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('date_begin'), 'form-control-success': fields.date_begin && fields.date_begin.valid}" id="date_begin" name="date_begin" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('date_begin')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date_begin') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('date_end'), 'has-success': fields.date_end && fields.date_end.valid }">
    <label for="date_end" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detail-task.columns.date_end') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.date_end" :config="datePickerConfig"  class="flatpickr" :class="{'form-control-danger': errors.has('date_end'), 'form-control-success': fields.date_end && fields.date_end.valid}" id="date_end" name="date_end" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('date_end')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('date_end') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('obs'), 'has-success': fields.obs && fields.obs.valid }">
    <label for="obs" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detail-task.columns.obs') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.obs"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('obs'), 'form-control-success': fields.obs && fields.obs.valid}" id="obs" name="obs" placeholder="{{ trans('admin.detail-task.columns.obs') }}">
        <div v-if="errors.has('obs')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('obs') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detail-task.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.user_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.detail-help.columns.user_id') }}"> --}}
        <multiselect
        v-model="form.user"
        :options="user"
        :multiple="false"
        track-by="id"
        label="full_name"
        :taggable="true"
        tag-placeholder=""
        placeholder="{{ trans('admin.detail-task.columns.user_id') }}">
    </multiselect>
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('advance'), 'has-success': fields.advance && fields.advance.valid }">
    <label for="advance" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.detail-task.columns.advance') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input readonly type="text" v-model="form.advance" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('advance'), 'form-control-success': fields.advance && fields.advance.valid}" id="advance" name="advance" placeholder="{{ trans('admin.detail-task.columns.advance') }}">
        <div v-if="errors.has('advance')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('advance') }}</div>
    </div>
</div>


