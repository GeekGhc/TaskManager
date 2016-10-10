<!-- Modal -->
<div class="modal fade" id="editModal-{{$project->id}}" tabindex="-1" role="dialog"
     aria-labelledby="editModalLabel-{{$project->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="editModalLabel-{{$project->id}}">编辑项目</h4>
            </div>
            <div class="modal-body">
                {!! Form::model($project,['route'=>['projects.update',$project->id],'method'=>'patch','files'=>'true']) !!}
                <div class="form-group">
                    {!! Form::label('name','项目名称 : ',['class'=>'control-label']) !!}
                    {!! Form::text('name',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('thumbnail','项目缩略图 : ',['class'=>'control-label']) !!}
                    {!! Form::file('thumbnail') !!}
                </div>
                @include('errors/formErrors')
                <div class="modal-footer">
                    {!! Form::submit('编辑项目',['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>