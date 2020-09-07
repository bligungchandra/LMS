@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Training</div>
                <div class="card-body">
                  
                       <form action="{{ route('training.store') }}" method="post" class="form-horizontal"  enctype="multipart/form-data">
                           @csrf
                            <div class="form-group">
                               <label for="trainingName" class="col-md-2 label-control">Training Name</label>
                               <div class="col-md-10">
                               <input type="text" class="form-control" name="trainingName" value="{{ old('trainingName') }}" autocomplete="off" maxlength="50" placeholder="Ex: Training Basic Kepemimpinan">
                               </div>
                           </div>

                            <div class="form-group">
                               <label for="trainingDescription" class="col-md-2 label-control">Training Description</label>
                               <div class="col-md-10">
                                  <textarea name="trainingDescription" id="training_description" cols="30" rows="3" class="form-control" placeholder="Ex: Training Basic Kepemimpinan Untuk Karyawan">{{ old('trainingDescription') }}</textarea>
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="trainingGoals" class="col-md-2 label-control">Training Goals</label>
                               <div class="col-md-10">
                                  <textarea name="trainingGoals" id="training_goals" cols="30" rows="3" class="form-control" placeholder="Ex: Agar Tumbuh Jiwa Kepemimpinan Pada Masing - Masing Karyawan">{{ old('trainingGoals') }}</textarea>
                               </div>
                           </div>

                           <div class="form-group">
                               <label for="trainingGoals" class="col-md-2 label-control">Training Document (.pdf,.docs,.jpeg,.png) maks:50 MB </label>
                               <div class="col-md-10">
                               <input type="file" name="trainingDocument[]" id="trainingDocument" onchange="Filevalidation()" value="{{ old('trainingDocument') }}" class="form-control" multiple>
                               </div>
                           </div>

                           <div class="form-group">
                               <div class="col-md-10">
                               <button class="btn btn-primary" type="submit" name="btnSave" id="save" value="Save" onclick="Filevalidation()">Save</button>
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

@section('script')
 <script> 
    Filevalidation = () => { 
        var curFile = document.getElementById('trainingDocument'); 
        if (curFile.files.length > 0) { 
            for (var i = 0; i <= curFile.files.length - 1; i++) { 
                var fsize = curFile.files.item(i).size; 
                var file = Math.round((fsize / 1024));  
                if (file >= 3096) { 
                    alert( 
                      "File too Big, please select a file less than 3mb"); 
                } 
            } 
        } 
    } 
</script>    
@endsection
