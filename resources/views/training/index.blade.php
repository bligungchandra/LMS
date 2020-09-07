@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Training List 
                    <div class="float-right">
                        <form action="{{ route('training.create') }}" method="get">
                            @csrf
                         <button class="btn btn-primary" type="submit" name="btnNew"><i class="fas fa-plus"></i> New Training</button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                   <div class="row">
                       <table class="table table-border">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Training Name</th>
                                    <th>Training Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                              <tbody>
                                @foreach ($index as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->trainingTitle }}</td>
                                    <td>{{ $item->trainingDescription }}</td>
                                    <td>
                                        <div class="row">
                                        <a href="{{ route('training.edit', ['training' => $item->trainingID ]) }}" class="btn btn-primary" name="edit" value="edit">Edit</a><a href="{{ route('training.show', ['training' => $item->trainingID ]) }}" class="btn btn-success ml-2" name="detail" value="detail">Detail</a>
                                        <form action="{{ route('training.destroy',['training' => $item->trainingID]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger ml-2" type="submit" name="delete" value="Delete">Delete</button>
                                        </form>
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