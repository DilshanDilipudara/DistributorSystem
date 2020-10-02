@extends('layouts.app')

@section('content')
<br>
<h2 class="col-md-12 text-center"> Artical Category</h2>
<br>
<div class="container">
    <form action="/addarticalcategory" method="post">
        @csrf
        <div class="form-group row">
            <label for="inputarticalcategory" class="col-sm-2 col-form-label">Artical Category Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" id="articalcategoryname" placeholder="Tea">
            </div>
        </div>
        <div class="form-group row">
            <div class="form-check offset-6 tab-space">
                <input type="checkbox" class="form-check-input" name="buying">
                <label class="form-check-lable">Buying</label>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 offset-6 form-check tab-space">
                <input type="checkbox" class="form-check-input" name="selling">
                <label class="form-check-lable">Selling</label>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-lable">Comments</label>
            <div class="col-sm-8">
                <textarea name="" class="form-control" id="" rows="3" name="comments"></textarea>
            </div>
        </div>

        <div class="offset-6"><button type="submit" class="btn btn-outline-primary">Submit</button></div>
    </form>
    <br>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Artical Category Name</th>
                <th scope="col">Buying</th>
                <th scope="col">Selling</th>
                <th scope="col">Comments</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            @foreach($data as $val)
            <tr>
                <th scope="row">{{$val->id}}</th>
                <td>{{$val->name}}</td>
                <td>{{$val->buying}}</td>
                <td>{{$val->selling}}</td>
                <td>{{$val->comments}}</td>
                <td><button class="btn btn-outline-success" data-toggle="modal" data-name="{{$val->name}}" data-id="{{$val->id}}" data-buying="{{$val->buying}}" data-selling="{{$val->selling}}" data-selling="{{$val->selling}}" data-comments="{{$val->comments}}" type="button" onClick="triggerModel('{{$val->name}}', '{{$val->id}}')" data-target="#modal-update">Update</button></td>
                <td><a href="/deletearticalcategory/{{$val->id}}" class="btn btn-outline-danger">Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">articalcategory Update</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="" method="post" action="/updatearticalcategory" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="" class="col-form-label">articalcategory Name:</label>
                        <input type="text" class="form-control" id="modelFieldName" value="" name="name">
                    </div>
                    <input id="modelFieldId" type="hidden" class="form-control" name="id" value="">
                    <div class="modal-footer">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary "> Save </button>
                            <button type="button" class="btn btn-danger " data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

<script>
    function triggerModel(name, id) {
        document.getElementById("modelFieldName").value = name;
        document.getElementById("modelFieldId").value = id;
    }
</script>