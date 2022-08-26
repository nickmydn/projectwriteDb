@extends('layouts.app')


@section('content')


<div class="container">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ url('admin/editstationery') }}/{{ $stationery->id }}" method="POST">
        {{csrf_field()}}
        <div class="form-group">
            <input type="hidden" name="id" class="form-control" value="{{$stationery->id}}">
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Name" required="">
        </div>
        <div class="form-group">
            <input type="text" name="description" class="form-control" placeholder="Description" required="">
        </div>
        <div class="form-group">
            <input type="number" name="stock" class="form-control" placeholder="Stock" required="">
        </div>
        <div class="form-group">
            <input type="number" name="price" class="form-control" placeholder="Price" required="">
        </div>
        <input type="submit" value="Update Stationery Data" class="btn btn-info mr-1">
    </form>
</div>

@endsection