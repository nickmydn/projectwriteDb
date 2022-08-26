@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm">
                        <img src="{{asset('storage/'.$stationery->photo)}}" class="rounded mx-auto
                        d-block" width="80%" alt="">
                    </div>
                    <div class="col-sm mt-4">
                        <p>Stationery Name: {{ $stationery->name }}</p>
                        <p>Stationery Price: {{ $stationery->price }}</p>
                        <p>Stationery Stock: {{ $stationery->stock }}</p>
                        <p>Stationery Type: {{ $stationery->stationeryType->name }}</p>
                        <p>Description: {{ $stationery->description }}</p>
                    </div>
                    <div class="col-sm float-right">
                        <br><br><br><br><br><br><br><br>
                        <form action="{{ url('/deletestationery') }}" method="POST">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$stationery->id}}">
                            <input type="submit" value="Delete" class="btn btn-danger mr-1"></a>
                        </form>
                        <a href="{{ url('admin/editstationery') }}/{{ $stationery->id }}" class="btn btn-info mr-1">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection