<?php

namespace App\Http\Controllers;
use App\Models\Training;
use App\Models\TrainingDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Training::latest()->orderBy('created_at','DESC')->paginate(10);
        return view("training.index",compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("training.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
       $dateNow = \Carbon\Carbon::now();
       $dateFiles = $dateNow->format('YmdHis');
       
       /*try{
            $this->validate($request, [
                'trainingDocument' => 'required|mimes:.jpeg,.png,.jpg,.gif,.pdf,.docs,.mp4|max:5048',
            ]);
       }catch(Exception $ex){
            return back()->withInput();
       }*/

        $inputTraining = new Training;
        $inputTraining->trainingDate = $dateNow;
        $inputTraining->trainingTitle = $request->trainingName;
        $inputTraining->trainingDescription = $request->trainingDescription;
        $inputTraining->trainingGoals = $request->trainingGoals;
        $inputTraining->trainer = Auth::user()->name;
        $inputTraining->createdBy = Auth::user()->name;
        $inputTraining->save();
    
        $files = $request->file('trainingDocument');

        foreach ($files as $file) {
            $filename = $dateFiles.'-'.$file->getClientOriginalName();
            $patch = $file->storeAs('uploads',$filename); 
            $trainingDocument = new TrainingDocument();
            $trainingDocument->trainingID = $inputTraining->trainingID;
            $trainingDocument->patch = $patch;
            $trainingDocument->fileName = $file->getClientOriginalName();
            $trainingDocument->extension = strtolower($file->getClientOriginalExtension());
            $trainingDocument->createdBy = "admin";
            $trainingDocument->save();

        }
    
        return redirect()->route('training.index')->with(['Message' => 'Sukses Menambah Training Baru']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view("training.detail",compact('training'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        return view("training.edit",compact('training'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        //dd($request,$training);
        $dateNow = \Carbon\Carbon::now();
        $training->trainingDate = $dateNow;
        $training->trainingTitle = $request->trainingName;
        $training->trainingDescription = $request->trainingDescription;
        $training->trainingGoals = $request->trainingGoals;
        $training->trainer = Auth::user()->name;
        $training->createdBy = Auth::user()->name;
        $training->save();

        $files = $request->file('trainingDocument');
        $filename = $dateFiles.'-'.$files->getClientOriginalName();
        $patch = $files->storeAs('uploads',$filename);
        $training->trainingDocument()->update([
            'patch' => $patch,
            'fileName' => $files->getClientOriginalName(),
            'extension' => $files->getClientOriginalExtension(),
            'createdBy' => Auth::user()->name,
        ]);

        return redirect()->route('training.index')->with(['Message' => 'Sukses Menambah Training Baru']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::find($id);
        $training->delete();
        return redirect()->back()->withInput();
    }
}
