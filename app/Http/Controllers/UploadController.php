<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Http\Requests\StoreUploadRequest;
use App\Http\Requests\UpdateUploadRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $uploads=Upload::all();
        return response(
            view('download')->with('uploads',$uploads)
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response(view('upload'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUploadRequest $request): RedirectResponse
    {
        $file=$request->file('file');
        $originalname=$file->getClientOriginalName();
        $filename=str_replace(' ','_',$originalname);
        $path='/myfiles/'.$filename;

        $upload=new Upload;
        $upload->name=$filename;
        $upload->path=$path;
        $upload->save();
        
        $file->storeAs('myfiles',$filename);

        return redirect('/uploads/create')->with('success', 'File uploaded succesfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(Upload $upload)//: Response
    {
        if(Storage::disk('local')->exists($upload->path)){
            return Storage::download($upload->path,$upload->name);
        }else{
            return response('File doesnt exist');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Upload $upload): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUploadRequest $request, Upload $upload): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Upload $upload): RedirectResponse
    {
        //
    }
}
