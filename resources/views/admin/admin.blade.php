@extends("admin.index")

@section("title")
    @yield("title-admin")
@endsection

@section("content")
    @include("admin.components.notification")
    @include("admin.components.sidebar")
    <div class="page">
        @include("admin.components.header")
        @include("admin.components.breadcrumb")
        <!-- navbar-->
        @yield("content-admin")
        @include("admin.components.modal-custom")
        @include("admin.components.footer")
    </div>
@endsection

@section("script")
    @yield("script-admin")
@endsection