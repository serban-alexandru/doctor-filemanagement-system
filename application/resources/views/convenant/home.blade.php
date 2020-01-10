@extends('layouts.convenants')

@section('content')

<div class="container-fluid">

    <div class="table-responsive">
        <form action="{{ url('/zip_files') }}" method="POST">
        @csrf
        <div class="alert alert-primary">
            <h1>Your documents</h1>
        </div>
        <table class="table">
        <thead>
            <tr>
            <th scope="col"></th>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scopt="col">Receipt date</th>
            <th>Downloaded</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $key=>$document)                
            <tr>
            <th><input type="checkbox" name="check[{{$document->id}}]"></th>
            <th scope="col">{{$key+1}}</th>
            <th scope="col">{{$document->title}}</th>
            <td>{{$document->created_at}}</td>
            <td>@if($document->downloaded == 1) Yes @else No @endif</td>
            <td>
            {{-- <a download="{{$document->id.'.'.$document->extension}}" href="{{ url('/gg/'.$document->id.'.'.$document->extension) }}"><button class="btn btn-success"><i class="fas fa-download"></i></button></a>                <button class="btn btn-danger"><i class="fas fa-trash"></i></button> --}}
            <a href="{{ url('/download_document/'.$document->id) }}">
                <button type="button" class="btn btn-success"><i class="fas fa-download"></i></button>
            </a>            
            </td>     
            </tr>
            @endforeach
        </tbody>
        </table>
            {{$documents->render()}}
            <button class="btn btn-success" style="margin-bottom: 10px"><i class="fas fa-download"></i> Download as zip file</button>
        </form>
        {{-- <a href="{{ url('/document-search') }}"><button class="btn btn-success"><i class="fas fa-eye"></i> See document </button></a> --}}
    
        <!-- Modal -->
        <div class="modal fade" id="viewDocument" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal view document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Document protocol:</label>
                    <input type="text" placeholder="protocol" name="protocol" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Document password:</label>
                    <input type="text" placeholder="password" name="password" required class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Search <i class="fas fa-search"></i></button>
            </div>
            </div>
        </div>
        </div>
        
    </div>

</div>

@endsection