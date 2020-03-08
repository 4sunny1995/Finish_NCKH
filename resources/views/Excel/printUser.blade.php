@extends('master')
@section('content')
<div class="container-fluid">
    <form action="" method="post">
        @csrf
        <h4>Import User from excel file</h4>
        <div class="row">
            <div class="col-md-4"><input type="file" name="file" id="file" class=""></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>

        </div>
    </form>
</div>
@endsection