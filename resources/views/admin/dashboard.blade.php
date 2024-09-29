@extends('layouts.app')
@section('title', 'PharmaHub | Dashboard')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            {{-- custom cards --}}
            @include('admin.partials.custom-cards')
            {{--  --}}
            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">
                    <!-- small cards -->
                    {{-- @include('admin.partials.small-cards') --}}
                    <!-- Recent Sales -->
                    @include('admin.partials.sales')
                    <!-- End Recent Sales -->
                    <!-- Reports -->
                    {{-- @include('admin.partials.reports') --}}
                    <!-- End Reports -->

                    <!-- Recent Sales -->
                    {{-- @include('admin.partials.sales') --}}
                    <!-- End Recent Sales -->

                    <!-- Top Selling -->
                    @include('admin.partials.product-table')
                    <!-- End Top Selling -->

                </div>
            </div>
            <!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                {{-- @include('admin.partials.recent-activity') --}}
                <!-- End Recent Activity -->

                <!-- Budget Report -->
                @include('admin.partials.budget')
                <!-- End Budget Report -->

                <!-- Website Traffic -->
                @include('admin.partials.chart')
                <!-- End Website Traffic -->

                <!-- News & Updates Traffic -->
                {{-- @include('admin.partials.news-update') --}}
                <!-- End News & Updates -->

            </div><!-- End Right side columns -->

        </div>
    </section>

@endsection
