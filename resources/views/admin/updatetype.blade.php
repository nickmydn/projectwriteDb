@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Stationery Type Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach($stationeryType as $st)
                <tr>
                    <th scope="row">{{ $st->id }}</th>
                    <td>{{ $st->name }}</td>
                    <td>
                    <form action="{{ url('admin/updatetype') }}" method="POST">
                    {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$st->id}}">
                        <input type="text" name="name" placeholder="Type Name">
                        <input type="submit" name="submitbtn" value="update" class="btn btn-info mr-1">
                        <input type="submit" name="submitbtn" value="delete" class="btn btn-danger mr-1">
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection