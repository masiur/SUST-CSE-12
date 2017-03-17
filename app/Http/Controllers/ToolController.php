<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Files;
class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fileshare.index')
                    ->with('title','Share Your File Online');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 
        ini_set('max_execution_time', 180);
        ini_set('upload_max_filesize', 100);
        ini_set('post_max_size', 100);
        $tmpfile = $request->file('thisfile');

        $data = $request->all();
        // $file_link = $request->input['file_link'];
        if ($tmpfile != null ) {
            $tmpfile = $request->file('thisfile');
            $destination = public_path().'/uploads/files';
            $file_name = $request->input('file_name') ? $request->input('file_name') : str_random(5);
            if(Files::where('fileName', $file_name)->exists()) {
                $file_name = str_random(5);
            }
            $filename = $file_name.'.'.$tmpfile->getClientOriginalExtension();
            $tmpfile->move($destination, $filename);
            $file_link = '/uploads/files/'.$filename;
        
            $file = new Files();
            $file->fileName = $file_name;
            $file->filePath = $file_link;
            // $file->file_link = $file_link;
            $file->save();
            $filelink = route('file.share.download', $file_name);
            $hardlink = url($file_link);
            return redirect()->route('file.share.show')->with('success','File Successfully Added')
                                ->with('filelink', $filelink)
                                ->with('hardlink', $hardlink);
            }
            return 'something went wrong';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('fileshare.show')
                    ->with('title','Share Your File Online');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $filePath = Files::where('fileName', $id)->pluck('filePath');
        $filePath = public_path($filePath);
        return response()->download($filePath);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
