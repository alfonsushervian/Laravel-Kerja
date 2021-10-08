<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        // $datas = user::all();
        $datas = User::where('username', 'LIKE', '%'.$keyword.'%')
            ->orWhere('password', 'LIKE', '%'.$keyword.'%')
            ->orWhere('hak', 'LIKE', '%'.$keyword.'%')
            ->paginate();
        $datas->withPath('user');
        $datas->appends($request->all());
        return view('user.index', compact(
            'datas', 'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new User;
        return view('user.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $model = new User;

        $model->username = $request->username;
        $model->password = $request->password;
        $model->hak = $request->hak;

        $model->save();

        return redirect('user')->with('success', "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::find($id);
        return view('user.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $model = User::find($id);
        $model->username = $request->username;
        $model->password = $request->password;
        $model->hak = $request->hak;
        $model->save();

        return redirect('user')->with('success', "Data berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = User::find($id);
        $model->delete();
        return redirect('user');
    }
}
