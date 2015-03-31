<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Workoff;
use App\Permission;
use App\PermissionRole;
use App\Http\Requests\Admin\WorkoffRequest;
use App\Http\Requests\Admin\DeleteRequest;
use Datatables;

class WorkoffController extends AdminController {
    /*
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {
        // Show the page
        return view('admin.workoff.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate() {
        // Show the page
        return view('admin.workoff.create_edit');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate(WorkoffRequest $request) {
        $work = new Workoff();
        
        $work -> name = $request->name;
        $work -> position = $request->position;
        $work -> department = $request->department;
        $work -> reason = $request->reason;
        $work -> days = $request->days;
        $work -> datestart = $request->datestart;
        $work -> dateend = $request->dateend;
        $work -> status = 1;
        $work -> language_id = 1;
        $work -> save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $role
     * @return Response
     */
    public function getEdit($id) {
        $work = Workoff::find($id);

        // Show the page
        return view('admin.workoff.create_edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $role
     * @return Response
     */
    public function postEdit(WorkoffRequest $request, $id) {
        $work = Workoff::find($id);
        $work -> name = $request->name;
        $work -> position = $request->position;
        $work -> department = $request->department;
        $work -> reason = $request->reason;
        $work -> days = $request->days;
        $work -> language_id = 1;
        $work -> status = 1;
        $work -> datestart = $request->datestart;
        $work -> dateend = $request->dateend;
        $work -> save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $role
     * @return Response
     */

    public function getDelete($id)
    {
        $workoff = Workoff::find($id);
        // Show the page
        return view('admin.workoff.delete', compact('workoff'));
    }
    
    public function getApprove($id)
    {
        $workoff = Workoff::find($id);
        // Show the page
        return view('admin.workoff.approve', compact('workoff'));
    }
    
    public function getReject($id)
    {
        $workoff = Workoff::find($id);
        // Show the page
        return view('admin.workoff.reject', compact('workoff'));
    }
    
    public function postApprove(DeleteRequest $request,$id) {
        $workoff = Workoff::find($id);
        $workoff->status = 2;
        $workoff->save();
    }

    public function postReject(DeleteRequest $request,$id) {
        $workoff = Workoff::find($id);
        $workoff->status = 3;
        $workoff->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function postDelete(DeleteRequest $request,$id)
    {
        $workoff = Workoff::find($id);
        $workoff->delete();
    }
    /**
     * Show a list of all the languages posts formatted for Datatables.
     *
     * @return Datatables JSON
     */
    public function data()
    {
        $workoffs = Workoff::select(array('workoff.id','workoff.name','workoff.position', 'workoff.department', 'workoff.reason', 'workoff.days', 'workoff.datestart', 'workoff.dateend', 'workoff.status'));

        return Datatables::of($workoffs)
            -> edit_column('status', '@if ($status=="1") <b><i>pending</i></b> @elseif ($status=="2") <b><i>approved</i></b> @else <b><i>rejected</i></b> @endif')
            ->add_column('actions', '<a href="{{{ URL::to(\'admin/workoff/\' . $id . \'/edit\' ) }}}" class="btn btn-success btn-sm iframe" ><span class="glyphicon glyphicon-pencil"></span>  {{ Lang::get("admin/modal.edit") }}</a>
                    <a href="{{{ URL::to(\'admin/workoff/\' . $id . \'/delete\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-trash"></span> {{ Lang::get("admin/modal.delete") }}</a>
                    <a href="{{{ URL::to(\'admin/workoff/\' . $id . \'/approve\' ) }}}" class="btn btn-sm btn-success iframe"><span class="glyphicon glyphicon-thumbs-up"></span> {{ Lang::get("admin/workoff.approve") }}</a>
                    <a href="{{{ URL::to(\'admin/workoff/\' . $id . \'/reject\' ) }}}" class="btn btn-sm btn-danger iframe"><span class="glyphicon glyphicon-thumbs-down"></span> {{ Lang::get("admin/workoff.reject") }}</a>
                ')
            ->remove_column('id')
            ->make();
    }

}
