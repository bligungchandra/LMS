@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-12">
        
            <div class="card">
                <div class="card-header">Update Training 
                 <div class="float-right">
                    <a href="{{ route('training.index') }}" class="btn btn-primary">Back To List</a>
                </div>
            </div>
                <div class="card-body">
                       <form action="{{ route('training.update', ['training'=> $training->trainingID]) }}" method="post" class="form-horizontal" role="form">
                        @csrf
                        @method('PUT')   
                        <div class="form-group">
                               <label for="trainingName" class="col-md-2 label-control">Training Name</label>
                               <div class="col-md-10">
                               <input type="text" class="form-control" name="trainingName" value="{{ $training->trainingTitle }}" autocomplete="off" maxlength="50" placeholder="Ex: Training Basic Kepemimpinan">
                               </div>
                           </div>

                            <div class="form-group">
                               <label for="trainingDescription" class="col-md-2 label-control">Training Description</label>
                               <div class="col-md-10">
                                  <textarea name="trainingDescription" id="training_description" cols="30" rows="3" class="form-control" placeholder="Ex: Training Basic Kepemimpinan Untuk Karyawan">{{ $training->trainingDescription }}</textarea>
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="trainingGoals" class="col-md-2 label-control">Training Goals</label>
                               <div class="col-md-10">
                                  <textarea name="trainingGoals" id="training_goals" cols="30" rows="3" class="form-control" placeholder="Ex: Agar Tumbuh Jiwa Kepemimpinan Pada Masing - Masing Karyawan">{{ $training->trainingGoals }}</textarea>
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="trainingGoals" class="col-md-2 label-control">Training Document (.pdf,.docs,.jpeg,.png) maks:50 MB </label>
                               <div class="col-md-10">
                                  <input type="file" name="trainingDocument[]" class="form-control" multiple />
                                  <div class="row d-inline">
                                  @foreach ($training->trainingDocument as $item)
                                        @if ($item->extension == "jpg" || $item->extension == "jpeg" || $item->extension == "png")
                                        <img src="{{Asset('storage/'.$item->patch)}}" height="40px" width="50px;" class="mt-2"/>
                                        <span class="ml-2">{{ $item->fileName }}</span>

                                        @endif

                                        @if ($item->extension == "pdf" || $item->extension == "docs")
                                        <a href="#" class="ml-2">{{ $item->fileName }}</a>
                                        @endif

                                        @if ($item->extension == "mp4" || $item->extension == "alv")
                                        <video src="{{Asset('storage/'.$item->patch)}}" height="80px" width="100px;" class="mt-2"></video>
                                        @endif
                                       
                                  @endforeach
                                  </div>
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="col-md-10">
                               <button class="btn btn-primary" name="btnSave" value="Save">Update</button>
                               <button class="btn btn-danger" name="btnSave" value="Save">Cancel</button>
                           </div>
                           </div>
                       </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection