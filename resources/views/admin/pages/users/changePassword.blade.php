@extends('admin.admin')

@section("title-admin", "Change Password")

@section('content-admin')
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Change Password</h1>
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
                        <form id="formChangePassword" class="form-horizontal form-validate mt-4" method="post" action="{{ route("user.postChangePassword") }}">
                            @csrf
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Current Password</label>
                                <div class="col-sm-5">
                                    <input 
                                        type="password" 
                                        class="form-control" 
                                        data-rule-required="true"
                                        data-msg-required="Please enter current password" 
                                        name="currentPassword"
                                        value="{{ !empty(old('currentPassword')) ? old('currentPassword') : ''}}"
                                        placeholder="Enter current password" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">New Password</label>
                                <div class="col-sm-5">
                                    <input
                                        type="password" 
                                        class="form-control" 
                                        id="newPassword"
                                        name="newPassword"
                                        data-rule-required="true"
                                        data-msg-required="Please enter new password"
                                        value="{{ !empty(old('newPassword')) ? old('newPassword') : ''}}"
                                        placeholder="Enter new password" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Confirm Password</label>
                                <div class="col-sm-5">
                                    <input
                                        type="password"
                                        class="form-control" 
                                        data-rule-required="true"
                                        data-rule-equalTo="#newPassword"
                                        data-msg-required="Please confirm new password" 
                                        data-msg-equalTo="Please enter the same password again." 
                                        name="rePassword"
                                        value="{{ !empty(old('rePassword')) ? old('rePassword') : ''}}"
                                        placeholder="Confirm new password"
                                    />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-5 offset-sm-2">
                                    <a class="btn btn-secondary"  href="{{ URL::previous() }}">Cancel</a>
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