<?php

namespace App\Http\Controllers;

use App\Flyer;
use App\Photo;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\FlyerRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\AuthorizesUser;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class FlyersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
        parent::__construct();
    }

    public function index()
    {
        return view('pages.home');

    }

    public function create()
    {
        //flash()->success('success','Flyer has been created.');

        return view('flyers.create');

    }

    public function store(FlyerRequest $request)
    {


        /*$this->user->publish(
            new Flyer($request->all())
        );
        //Flyer::create($request->all());
        flash()->success('Success', 'Flyer has been created.');
        return redirect($flyer->path());*/
    }

    /*public function view(){

        $flyers=Flyer::all();
        dd($flyers);
    }*/
    public function show($zip, $street)
    {

        $flyer = Flyer::where(compact('$zip', '$street'))->first();
        return view('flyers.show', compact('flyer'));
    }

    public function destroy($id)
    {
        $pic=Photo::find($id);
        //$card=Card::find($cardim->cards_id);

        $files1="uploads/".$pic->photo;
        $files2="uploads/th".$pic->photo;
        \File::delete([
            $files1,$files2
        ]);
        $pic->delete();
        return back();
    }
    public function addPhoto($zip, $street, Request $request)
    {
        $flyer = Flyer::locatedAt($zip, $street)->first();
        if($flyer->user_id!=Auth::id())
        {
            if($request->ajax()){
                return response(['messages'=>'You Dont Have Permission To Upload Pic'],403);
            }
            flash()->error('no Way');
            return back();
        }
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('uploads', $name);
        $path="uploads/".$name;
        $th="uploads/th".$name;
        Image::make($path)->fit(200)->save($th);
        $flyer->photos()->create(['photo' => $name]);


    }

    }

