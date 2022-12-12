<img src="{{ (!empty(Auth::user()->profile_photo_path)) ? url('upload/user_images/'.Auth::user()->profile_photo_path) : asset('backend/images/avatar/avatar-13.png')}}" alt="" class="card-img-top" style="border-radius: 50%; width: 100%; height: 100%; margin-bottom:10px;">
<ul class="list-group list-group-flush">
    <li style="margin-bottom: 2px;"><a href="{{ route('user.dashboard')  }}" class="btn btn-primary btn-sm btn-block">Home</a></li>
    <li style="margin-bottom: 2px;"><a href="{{ route('profile.show')  }}" class="btn btn-primary btn-sm btn-block">Profile Update</a></li>
    <li style="margin-bottom: 2px;"><a href="{{ route('change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a></li>
    <li style="margin-bottom: 2px;"><a href="{{ route('my.orders')}}" class="btn btn-primary btn-sm btn-block">My Orders</a></li>
    <li style="margin-bottom: 2px;"><a href="{{ route('return.orders.list')}}" class="btn btn-primary btn-sm btn-block">Return Orders</a></li>
    <li style="margin-bottom: 2px;"><a href="{{ route('cancel.orders')}}" class="btn btn-primary btn-sm btn-block">Cancel Orders</a></li>
    <li style="margin-bottom: 2px;">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="Logout" class="btn btn-danger btn-sm btn-block">
        </form>
    </li>
</ul>