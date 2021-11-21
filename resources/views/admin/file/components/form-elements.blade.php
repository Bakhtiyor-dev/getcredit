<div class="form-group row align-items-center" :class="{'has-danger': errors.has('url'), 'has-success': fields.url && fields.url.valid }">
    <label for="url" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.file.columns.url') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.url" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('url'), 'form-control-success': fields.url && fields.url.valid}" id="url" name="url" placeholder="{{ trans('admin.file.columns.url') }}">
        <div v-if="errors.has('url')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('url') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('subject_id'), 'has-success': fields.subject_id && fields.subject_id.valid }">
    <label for="subject_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.file.columns.subject_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.subject_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('subject_id'), 'form-control-success': fields.subject_id && fields.subject_id.valid}" id="subject_id" name="subject_id" placeholder="{{ trans('admin.file.columns.subject_id') }}">
        <div v-if="errors.has('subject_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('subject_id') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('imported'), 'has-success': fields.imported && fields.imported.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="imported" type="checkbox" v-model="form.imported" v-validate="''" data-vv-name="imported"  name="imported_fake_element">
        <label class="form-check-label" for="imported">
            {{ trans('admin.file.columns.imported') }}
        </label>
        <input type="hidden" name="imported" :value="form.imported">
        <div v-if="errors.has('imported')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('imported') }}</div>
    </div>
</div>


