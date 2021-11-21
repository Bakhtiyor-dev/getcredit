@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.file.actions.edit', ['name' => $file->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <file-form
                :action="'{{ $file->resource_url }}/updateFile'"
                v-cloak
                inline-template>
                
                <form class="form-horizontal form-edit" method="post" :action="action" novalidate>
                    @csrf
                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.file.actions.edit', ['name' => $file->id]) }}
                    </div>
                    <input type="hidden" name="url" value="{{$file->url}}">

                    <div class="card-body">
                        <textarea name="content" class="form-control" rows="50" autofocus >{{$content}}</textarea>
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </file-form>

        </div>
    
</div>

@endsection