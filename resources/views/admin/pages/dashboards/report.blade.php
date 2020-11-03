@extends('admin.admin')

@section("title-admin", "Report Search")

@section('content-admin')
<section>
    <div class="container-full">
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-4">
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-3 mb-2">
                        <div class="select-time ml-3 ">
                            <select id="selectTimeWordCloudAndBarChart" class="js-states form-control">
                                @foreach ($time_chart3 as $index => $item)
                                    <option value={{$item}}>{{\Carbon\Carbon::parse($item)->format('m-Y')}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 mb-2">
                        <select id="selectBankWordCloudAndBarChart" placeholder="" class="js-states form-control" name="banks[]" multiple="multiple">
                            @foreach ($list_bank as $item)
                                <option value={{$item->id}}>{{$item->id}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-1 mb-2">
                        <button type="button" id="btnBankWordCloudAndBarChart" class="btn btn-primary">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div id="wordCloudAndBarChart" class="col-xs-12 col-sm-12 col-md-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script-admin')
<script src="{{ asset('js/bankWordCloudAndBarChart.js') }}"></script>
@endsection