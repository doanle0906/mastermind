@extends('admin.admin')

@section("title-admin", "Edit Bank")

@section('content-admin')
<section class="forms">
    <div class="container-fluid">
        <!-- Page Header-->
        <header>
            <h1 class="h3 display">Edit Bank</h1>
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
                        <form class="form-horizontal form-validate mt-4" method="post" action="{{ route('bankmanage.update') }}" >
                            @csrf
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Select Bank Type</label>
                                <div class="col-sm-5 mb-3">
                                    <select name="bankType" class="form-control" required data-msg="Please select bank type" disabled>
                                        <option value="">Select Bank Type</option>
                                        @foreach(config("constants.TYPE_BANK") as $index => $item)
                                        <option value="{{ $index }}"
                                            {{ $bank->type == $index ? 'selected="selected"' : '' }}>{{ $item }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Bank Identifier</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required data-msg="Please enter bank identifier"
                                        name="displayIdentifier" value="{{ !empty(old('identifier')) ? old('identifier') : $bank->id}}"
                                        placeholder="Enter bank identifier" disabled/>
                                    <input type="text" class="form-control" required data-msg="Please enter bank identifier"
                                        name="identifier" value="{{ !empty(old('identifier')) ? old('identifier') : $bank->id}}"
                                        placeholder="Enter bank identifier" hidden="true"/>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <label class="col-sm-2 form-control-label d-flex align-items-center">Bank Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" required data-msg="Please enter bank name"
                                        name="bankName" value="{{ !empty(old('bankName')) ? old('bankName') : $bank->bank_name}}"
                                        placeholder="Enter bank name" />
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-sm-5 offset-sm-2">
                                    <a class="btn btn-secondary" href="{{ route('bankmanage.list')}}">Cancel</a>
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