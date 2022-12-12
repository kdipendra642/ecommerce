@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <aside class="profile-nav col-lg-3">
            <section class="panel">
                <div class="user-heading round">
                    <a href="{{ route('admin.profile.edit') }}">
                        <img src="{{ (!empty($adminData->profile_photo_path)) ? asset($adminData->profile_photo_path) : asset('backend/images/avatar/avatar-13.png')}}" alt="">
                    </a>
                    <h1>{{ $adminData->name  }}</h1>
                    <p>{{ $adminData->email  }}</p>
                </div>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="{{ route('admin.profile') }}"> <i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="{{ route('admin.profile.edit') }}"> <i class="fa fa-edit"></i> Edit profile</a></li>
                </ul>
            </section>
        </aside>
        <aside class="profile-info col-lg-9">
            <section class="panel">
                <div class="panel-body bio-graph-info">
                    <h1>Bio Graph</h1>
                    <div class="row">
                        <div class="bio-row">
                            <p><span>Name </span>: {{ $adminData->name  }}</p>
                        </div>
                        <div class="bio-row">
                            <p><span>Email </span>: {{ $adminData->email  }}</p>
                        </div>
                    </div>
                </div>
            </section>
        </aside>
    </div>

    <!-- page end-->
</section>

@endsection