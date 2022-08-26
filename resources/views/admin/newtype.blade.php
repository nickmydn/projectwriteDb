@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Stationery Type Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stationeryType as $st)
                <tr>
                    <th scope="row">{{ $st->id }}</th>
                    <td>{{ $st->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="col-sm-8">

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{url('/admin/newtype')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="file" name="photo" class="form-control-file">
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Add new stationery type"><br>
                    <button type="submit" class="btn btn-primary">Add new Stationery Type</button></td>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection