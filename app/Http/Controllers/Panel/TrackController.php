<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Track;
use App\Models\Province;
use App\Http\Requests\Panel\Track\CreateTrackRequest;
use Illuminate\Support\Facades\Auth;
use App\H;


class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tracks = Track::with(['user', 'city','province'])->orderBy('id', 'desc')->paginate(20);
        return View('panel.tracks.index', compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::with('cities')->get();
        return view('panel.tracks.create' , compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTrackRequest $request)
    {  
        // upload image to path      
        $path = H::uploadImage($request->image);
        if($path !== false){ 
            
            $track = Track::create([
                'user_id' => Auth::id(),  
                'name' => $request->name, 
                'lat' => $request->lat,           
                'long' => $request->long,
                'desc' =>$request->desc,  
                'ctiy_id' =>$request->ct,
                'province_id'=>$request->province,
                'image' => $path   
            ]);
 
            if($track){
                $request->session()->flash('status', 'پیست به درستی ثبت شد '); 
                return redirect()->route('track.index');  
            }
        } 
        $request->session()->flash('status', 'پیست به درستی ثبت نشد '); 
        return back();    
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
    public function edit(Track $track)
    { 
         if($track){ 
            $provinces = Province::with('cities')->get();
            return view('panel.tracks.edit', compact(['track' , 'provinces']));
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Track $track)
    {   //tofo refactor later
        $path = false;
        if($request->image){
            $path = H::uploadImage($request->image);
        } 
        if($path !== false){  
            $track = $track->update([
                'user_id' => Auth::id(),  
                'name' => $request->name, 
                'lat' => $request->lat,           
                'long' => $request->long,
                'desc' =>$request->desc,  
                'ctiy_id' =>$request->ct,
                'province_id'=>$request->province, 
                'image' => $path   
            ]);
 
            if($track){
                $request->session()->flash('status', 'پیست به درستی آپدیت شد '); 
                return redirect()->route('track.index');  
            }
        } else{ 
            $track = $track->update([
                'user_id' => Auth::id(),  
                'name' => $request->name, 
                'lat' => $request->lat,           
                'long' => $request->long,
                'desc' =>$request->desc,  
                'ctiy_id' =>$request->ct,
                'province_id'=>$request->province
            ]);
 
            if($track){
                $request->session()->flash('status', 'پیست به درستی آپدیت شد '); 
                return redirect()->route('track.index');  
            }
        }

        
        $request->session()->flash('status', 'پیست به درستی ثبت نشد '); 
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Track $track, Request $request)
    {
        if($track){
            $track->delete(); 
            $request->session()->flash('status', 'عملیات حذف با موفقیت انجام شد'); 
            return redirect()->route('track.index');
        }
        return back();
       
    }
}
