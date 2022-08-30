<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.task.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>



<div class="form-group row align-items-center" :class="{'has-danger': errors.has('obs'), 'has-success': fields.obs && fields.obs.valid }">
    <label for="obs" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.obs') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.obs"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('obs'), 'form-control-success': fields.obs && fields.obs.valid}" id="obs" name="obs" placeholder="{{ trans('admin.task.columns.obs') }}">
        <div v-if="errors.has('obs')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('obs') }}</div>
    </div>
</div>

{{-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('state_id'), 'has-success': fields.state_id && fields.state_id.valid }">
    <label for="state_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.state_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.state_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('state_id'), 'form-control-success': fields.state_id && fields.state_id.valid}" id="state_id" name="state_id" placeholder="{{ trans('admin.task.columns.state_id') }}">
        <div v-if="errors.has('state_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('state_id') }}</div>
    </div>
</div> --}}

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

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('advance'), 'has-success': fields.advance && fields.advance.valid }">
    <label for="advance"  class="col-form-label text-md-right"   :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.advance') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input readonly type="text" v-model="form.advance"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('advance'), 'form-control-success': fields.advance && fields.advance.valid}" id="advance" name="advance" placeholder="{{ trans('admin.task.columns.advance') }}">
        <div v-if="errors.has('advance')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('advance') }}</div>
    </div>
</div>


<div class="form-group row align-items-center" :class="{'has-danger': errors.has('priority'), 'has-success': fields.priority && fields.priority.valid }">
    <label for="priority"  class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.task.columns.priority') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input  type="select" v-model="form.priority"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('priority'), 'form-control-success': fields.priority && fields.priority.valid}" id="priority" name="priority" placeholder="{{ trans('admin.task.columns.priority') }}"> --}}
        <select name="priority" id="priority" v-model="form.priority" class="form-control">
            <option value="URGENTE">URGENTE</option>
            <option value="MODERADO">MODERADO</option>
            <option value="BAJO">BAJO</option>


             </select>
        <div v-if="errors.has('priority')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('priority') }}</div>
    </div>
</div>

