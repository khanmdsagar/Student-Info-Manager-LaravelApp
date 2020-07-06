<!--Header-->
<div class="basic-nav bg-white user-sel-none">
    <div class="basic-navbody flex-space-between">
        <div class="logo flex-center"><a href="{{url('/home')}}" class="fblue">Student Management</a></div>
        <div class="profile flex-center">
            <p class="inline f15 p-right10">{{Session::get('name')}}</p>
            <img class="round-image height50px Width50px" src="{{Session::get('avatar')}}" alt="avatar">
            <span class="material-icons cursor-pointer p-left10"><a href="{{url('/logout')}}">exit_to_app</a></span>
        </div>
    </div>
 </div>
