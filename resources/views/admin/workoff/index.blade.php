@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get("admin/workoff.workoff") }}} :: @parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>  {{{ Lang::get("admin/workoff.workoff") }}}
	<div class="pull-right">
		<div class="pull-right">
            <a href="{{{ URL::to('admin/workoff/create') }}}" class="btn btn-sm  btn-primary iframe"><span class="glyphicon glyphicon-plus-sign"></span> {{ Lang::get("admin/modal.new") }}</a>
        </div>
	</div></h3>
</div>

<table id="table" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>{{{ Lang::get("admin/workoff.name") }}}</th>
			<th>{{{ Lang::get("admin/workoff.position") }}}</th>
            <th>{{{ Lang::get("admin/workoff.department") }}}</th>
            <th>{{{ Lang::get("admin/workoff.reason") }}}</th>
            <th>{{{ Lang::get("admin/workoff.days") }}}</th>
            <th>{{{ Lang::get("admin/workoff.datestart") }}}</th>
            <th>{{{ Lang::get("admin/workoff.dateend") }}}</th>
            <th>{{{ Lang::get("admin/workoff.status") }}}</th>
			<th>{{{ Lang::get("admin/admin.action") }}}</th>
		</tr>
	</thead>
	<tbody></tbody>
</table>
@stop

{{-- Scripts --}}
@section('scripts')
<script type="text/javascript">
	var oTable;
	$(document).ready(function() {
		oTable = $('#table').dataTable({
			"sDom" : "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
			"sPaginationType" : "bootstrap",
			
			"bProcessing" : true,
			"bServerSide" : true,
			"sAjaxSource" : "{{ URL::to('admin/workoff/data/') }}",
			"fnDrawCallback" : function(oSettings) {
				$(".iframe").colorbox({
					iframe : true,
					width : "80%",
					height : "80%",
					onClosed : function() {
						window.location.reload();
					}
				});
			}
		});
	}); 
</script>
@stop
