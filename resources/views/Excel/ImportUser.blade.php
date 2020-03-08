@extends('admin.master')
@section('content')
<br><br><br>
<div class="container-fluid">
    <form action="/excel/import/user" method="post" enctype="multipart/form-data">
        @csrf
        <div class="text-center"><h4>Import User from excel file</h4></div><br>
        @include('layouts.message')
        <div class="row">
            <div class="col-md-4">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="file">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
        </div>
        
        <div class="row m-2">
            <div><button type="submit" class="btn btn-primary" id="btnImportUser">Import</button></div>
        </div>
    </form>
</div>
@endsection