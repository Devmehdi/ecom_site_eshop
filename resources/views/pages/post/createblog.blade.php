@extends('layouts.layout5')


@section('content')
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{url('blog')}}">Blog Single Sidebar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
    
<!-- Start Blog Single -->
<section class="blog-single section">
   <post-component></post-component>
</section>
<!--/ End Blog Single -->
@endsection