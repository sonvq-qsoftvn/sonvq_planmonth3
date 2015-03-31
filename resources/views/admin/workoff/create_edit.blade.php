@extends('admin.layouts.modal')
@section('content')
<ul class="nav nav-tabs">
    <li class="active">
        <a href="#tab-general" data-toggle="tab">{{{ Lang::get('admin/modal.general') }}}</a>
    </li>
</ul>
<form class="form-horizontal" method="post" action="" autocomplete="off">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="tab-content">
        <div class="tab-pane active" id="tab-general">
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('name') ? 'has-error' : '' }}}">
                    <label class="col-md-2 control-label" for="name">{!! Lang::get('admin/workoff.name') !!}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name" id="name" value="{{{ Input::old('name', isset($work) ? $work->name : null) }}}" />
                        {!!  $errors->first('name', '<span class="help-inline">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('position') ? 'has-error' : '' }}}">
                    <label class="col-md-2 control-label" for="position">{!! Lang::get('admin/workoff.position') !!}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="position" id="position" value="{{{ Input::old('position', isset($work) ? $work->position : null) }}}" />
                        {!!  $errors->first('position', '<span class="help-inline">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('department') ? 'has-error' : '' }}}">
                    <label class="col-md-2 control-label" for="department">{!! Lang::get('admin/workoff.department') !!}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="department" id="department" value="{{{ Input::old('department', isset($work) ? $work->department : null) }}}" />
                        {!!  $errors->first('department', '<span class="help-inline">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('reason') ? 'has-error' : '' }}}">
                    <label class="col-md-2 control-label" for="reason">{!! Lang::get('admin/workoff.reason') !!}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="reason" id="reason" value="{{{ Input::old('reason', isset($work) ? $work->reason : null) }}}" />
                        {!!  $errors->first('reason', '<span class="help-inline">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('days') ? 'has-error' : '' }}}">
                    <label class="col-md-2 control-label" for="days">{!! Lang::get('admin/workoff.days') !!}</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="days" id="days" value="{{{ Input::old('days', isset($work) ? $work->days : null) }}}" />
                        {!!  $errors->first('days', '<span class="help-inline">:message</span>') !!}
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('datestart') ? 'has-error' : '' }}}">
                    <label class="col-md-2 control-label" for="datestart">{!! Lang::get('admin/workoff.datestart') !!}</label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type='text' name="datestart" id="datestart" class="form-control" value="{{{ Input::old('datestart', isset($work) ? $work->datestart : null) }}}" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12">
                <div class="form-group {{{ $errors->has('dateend') ? 'has-error' : '' }}}">
                    <label class="col-md-2 control-label" for="dateend">{!! Lang::get('admin/workoff.dateend') !!}</label>
                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' name="dateend" id="dateend" class="form-control" value="{{{ Input::old('dateend', isset($work) ? $work->dateend : null) }}}" />
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <button type="reset" class="btn btn-sm btn-warning close_popup">
                <span class="glyphicon glyphicon-ban-circle"></span>  {{ Lang::get("admin/modal.cancel") }}
            </button>
            <button type="submit" class="btn btn-sm btn-success">
                <span class="glyphicon glyphicon-ok-circle"></span> @if (isset($work))  {{ Lang::get("admin/modal.edit") }} @else  {{ Lang::get("admin/modal.create") }} @endif
            </button>
        </div>
    </div>
</form>
@stop
@section('scripts')
<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker(
            {
                format: 'YYYY-MM-DD hh:mm:ss'
            }
        );
        $('#datetimepicker2').datetimepicker(
            {
                format: 'YYYY-MM-DD hh:mm:ss'
            }
        );
    });
</script>
<link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/d004434a5ff76e7b97c8b07c01f34ca69e635d97/src/js/bootstrap-datetimepicker.js"></script>
@stop
