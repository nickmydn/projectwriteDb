@extends('layouts.app')


@section('content')

<div class="container">
    <p>Add new product!</p>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{url('/admin/newstationery')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Stationery Name">
        </div>
        <div class="form-group">
            <select class="form-control" name="stationery_type_id" id="stationery_type_id">
            @foreach($stationeryType as $st)
                <option value="{{ $st->id }}">
                    {{ $st->name }}
                </option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="number" name="stock" class="form-control" placeholder="Stationery Stock">
        </div>
        <div class="form-group">
            <input type="number" name="price" class="form-control" placeholder="Stationery Price">
        </div>
        <div class="form-group">
            <input type="text" name="description" class="form-control" placeholder="Description">
        </div>
        <form>
            <div class="form-group">
                <input type="file" name="photo" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Add new Stationery</button></td>
        </form>
    </form>
</div>

@endsection