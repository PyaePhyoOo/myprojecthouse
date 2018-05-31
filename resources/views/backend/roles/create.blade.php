@extends ('admin-layouts.master')

@section ('page-header')
<section class="content-header">
    <h1 class="has-line">Create New Role</h1>
    <ol class="breadcrumb">
        <li><a href="/backend/user/admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/backend/user/admin/roles">Roles</a></li>
        <li><a href="#">Create Roles</a></li>
    </ol>
</section>
@endsection

@section ('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-magic"></i> &nbsp;Create New Role
        </div>
        <br>
        <div class="panel-body">
            <form action="{{route('roles.store')}}" method="post" class="form-horizontal">
                {{csrf_field()}}

                <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                    <label for="name" class="col-md-2 control-label">Role Name:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Admin" required autofocus>
                    </div>
                    {{-- error msg --}}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            {{$errors->first('name')}}
                        </span>
                    @endif
                </div>

                <div class="form-group {{$errors->has('slug') ? 'has-error' : ''}}">
                    <label for="slug" class="col-md-2 control-label">Slug:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="slug" id="slug" placeholder="admin" required>
                    </div>
                    {{-- error msg --}}
                    @if ($errors->has('name'))
                        <span class="help-block">
                            {{$errors->first('name')}}
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="" class="control-label col-md-2">Select Permissions:</label>
                    <div class="col-md-10">
                        <div class="row">
                            @foreach ($permissions as $key => $permission)
                                <div class="col-md-3">
                                    <label class="pr-3"><input type="checkbox" name="permissions[{{ $key }}]" value="true">&nbsp;&nbsp; {{$key}}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <button type="submit" class="btn btn-primary mr-3 mt-2">CREATE</button>
                        <a href="{{route('roles.index')}}" class="btn btn-danger mt-2">CANCEL</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
