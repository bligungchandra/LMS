@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Training List 
                </div>
                <div class="card-body">
                   <div class="row">
                       <table class="table table-border">
                            <thead>
                                <tr>
                                    <th>Training</th>
                                    <th>Schedulle</th>
                                    <th>Training Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                              <tbody>
                                @foreach ($index as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->trainingDate }}</td>
                                    <td>{{ $item->trainingDescription }}</td>
                                    <td>
                                        <div class="row">
                                        <a href="{{ route('EmployeeTraining.show', ['EmployeeTraining' => $item->trainingID ]) }}" class="btn btn-success ml-2" name="detail" value="detail">Detail</a>
                                        </div>
                                    </td>
                                </tr>   
                                @endforeach
                            </tbody>
                       </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection