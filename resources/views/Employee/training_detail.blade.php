@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                 
                    <div class="float-right">
                        <a href="{{ route('EmployeeTraining.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <div class="card-body">
                   <div class="row">
                       <table class="table table-border">

                                <tr>
                                    <th rowspan="1">{{ $EmployeeTraining->trainingTitle }}</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Trainer</td>
                                    <td>{{ $EmployeeTraining->trainer }}</td>
                                </tr>
                               <tr>
                                    <td>Training Description</td>
                                    <td>{{ $EmployeeTraining->trainingDescription }}</td>
                                </tr>
                                <tr>
                                    <td>trainingGoals</td>
                                    <td>{{ $EmployeeTraining->trainingGoals }}</td>
                                </tr>
                                <tr>
                                    <td>Document Support</td>
                                    <td>
                                        @foreach ($EmployeeTraining->trainingDocument as $item)
                                            @if ($item->extension == "jpg" || $item->extension == "jpeg" || $item->extension == "png")
                                            <img src="{{Asset('storage/'.$item->patch)}}" height="40px" width="50px;" class="mt-2"/>
                                            <span class="ml-2"><a href="{{Asset('storage/'.$item->patch)}}"> {{ $item->fileName }}</a></span>

                                            @endif

                                            @if ($item->extension == "pdf" || $item->extension == "docs")
                                            <a href="#" class="ml-2">{{ $item->fileName }}</a>
                                            @endif

                                            @if ($item->extension == "mp4" || $item->extension == "alv")
                                            <video src="{{Asset('storage/'.$item->patch)}}" height="80px" width="100px;" class="mt-2"></video>
                                            @endif
                                        @endforeach

                                    </td>
                                </tr>
                       </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection