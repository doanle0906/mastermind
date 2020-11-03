@extends('admin.admin')

@section("title-admin", "Add User")

@section('content-admin')
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Add User</h1>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="form-group-material invalid-feedback error-flash">
                            {{ implode(' ', $errors->all(':message')) }}
                        </div>
                        @endif
                            <form class="form-horizontal form-validate mt-4" method="post" action='{{ route("usermanage.postAdd") }}'>
                            @csrf
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-1 form-control-label d-flex align-items-center">Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required data-msg="Please enter name"
                                        name="name" value="{{ !empty(old('name')) ? old('name') : ''}}"
                                        placeholder="Enter name" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-1 form-control-label d-flex align-items-center">Email</label>
                                <div class="col-sm-5">
                                    <input type="email" class="form-control" required 
                                        data-msg-required="Please enter email"
                                        data-msg-email="Please enter a valid email"
                                        name="email" value="{{ !empty(old('email')) ? old('email') : ''}}"
                                        placeholder="Enter email" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-1 form-control-label d-flex align-items-center">Password</label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" required
                                        data-msg="Please enter password" name="password"
                                        value="{{ !empty(old('password')) ? old('password') : ''}}"
                                        placeholder="Enter password" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-6 offset-sm-2">
                                <a class="btn btn-secondary" href="{{ route('usermanage.list')}}">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection