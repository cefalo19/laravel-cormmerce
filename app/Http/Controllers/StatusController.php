<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests\StatusRequest;
use CodeCommerce\Status;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

class StatusController extends Controller
{

    /**
     * @var \CodeCommerce\Status
     */
    private $status;


    /**
     * @param Status $status
     */
    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $statuses = $this->status->paginate(10);

        return view('status.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StatusRequest $request)
    {
        $input = $request->all();

        $this->status->create($input);

        return redirect()->route('admin.statuses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $status = $this->status->find($id);

        return view('status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(StatusRequest $request, $id)
    {
        $this->status->find($id)->update($request->all());

        return redirect()->route('admin.statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->status->find($id)->delete();

        return redirect()->route('admin.statuses.index');
    }
}
