 <!-- sidebar menu area start -->
 @php
 $usr = Auth::guard('admin')->user();
 @endphp

 <div class="sidebar-menu">
     <div class="sidebar-header">
         <div class="logo">
             <a href="{{ route('admin.dashboard') }}">
                 <h2 class="text-white">Admin</h2>
             </a>
         </div>
     </div>
     <div class="main-menu">
         <div class="menu-inner">
             <nav>
                 <ul class="metismenu" id="menu">

                     @if ($usr->can('dashboard.view'))
                     <li class="active">
                         <a href="javascript:void(0)" aria-expanded="true"><i
                                 class="ti-dashboard"></i><span>dashboard</span></a>
                         <ul class="collapse">
                             <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}"><a
                                     href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                         </ul>
                     </li>
                     @endif

                     @if ($usr->can('profile.view'))
                     <li>
                         <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cogs"></i><span>
                                 Profile
                             </span></a>
                         <ul
                             class="collapse {{ Route::is('admin.profiles.create') || Route::is('admin.profiles.index') || Route::is('admin.profiles.edit') || Route::is('admin.profiles.show') ? 'in' : '' }}">
                             <li
                                 class="{{ Route::is('admin.profiles.index')  || Route::is('admin.profiles.edit') ? 'active' : '' }}">
                                 <a href="{{ route('admin.profiles.index') }}">Edit Profile</a>
                             </li>
                         </ul>
                     </li>
                     @endif

                     @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') ||
                     $usr->can('role.delete'))
                     <li>
                         <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-tasks"></i><span>
                                 Roles & Permissions
                             </span></a>
                         <ul
                             class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                             @if ($usr->can('role.view'))
                             <li
                                 class="{{ Route::is('admin.roles.index')  || Route::is('admin.roles.edit') ? 'active' : '' }}">
                                 <a href="{{ route('admin.roles.index') }}">All Roles</a>
                             </li>
                             @endif
                             @if ($usr->can('role.create'))
                             <li class="{{ Route::is('admin.roles.create')  ? 'active' : '' }}"><a
                                     href="{{ route('admin.roles.create') }}">Create Role</a></li>
                             @endif
                         </ul>
                     </li>
                     @endif

                     @if($usr->can('permission.create') || $usr->can('permission.view') || $usr->can('permission.edit')
                     ||
                     $usr->can('permission.delete'))
                     <li>
                         <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                 Permissions
                             </span></a>
                         <ul
                             class="collapse {{ Route::is('admin.permissions.create') || Route::is('admin.permissions.index') || Route::is('admin.permissions.edit') || Route::is('admin.permissions.show') ? 'in' : '' }}">

                             @if ($usr->can('permission.view'))
                             <li
                                 class="{{ Route::is('admin.permissions.index')  || Route::is('admin.permissions.edit') ? 'active' : '' }}">
                                 <a href="{{ route('admin.permissions.index') }}">All Permissions</a>
                             </li>
                             @endif

                             @if ($usr->can('permission.create'))
                             <li class="{{ Route::is('admin.permissions.create')  ? 'active' : '' }}"><a
                                     href="{{ route('admin.permissions.create') }}">Create Permission</a>
                             </li>
                             @endif
                         </ul>
                     </li>
                     @endif

                     @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') ||
                     $usr->can('admin.delete'))
                     <li>
                         <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                 Counselors
                             </span></a>
                         <ul
                             class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">

                             @if ($usr->can('admin.view'))
                             <li
                                 class="{{ Route::is('admin.admins.index')  || Route::is('admin.admins.edit') ? 'active' : '' }}">
                                 <a href="{{ route('admin.admins.index') }}">All Counselors</a>
                             </li>
                             @endif

                             @if ($usr->can('admin.create'))
                             <li class="{{ Route::is('admin.admins.create')  ? 'active' : '' }}"><a
                                     href="{{ route('admin.admins.create') }}">Create Counselor</a></li>
                             @endif
                         </ul>
                     </li>
                     @endif


                     @if ($usr->can('staff.create') || $usr->can('staff.view') || $usr->can('staff.edit') ||
                     $usr->can('staff.delete'))
                     <li>
                         <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-user"></i><span>
                                 Staffs
                             </span></a>
                         <ul
                             class="collapse {{ Route::is('admin.staffs.create') || Route::is('admin.staffs.index') || Route::is('admin.staffs.edit') || Route::is('admin.staffs.show') ? 'in' : '' }}">

                             @if ($usr->can('staff.view'))
                             <li
                                 class="{{ Route::is('admin.staffs.index')  || Route::is('admin.staffs.edit') ? 'active' : '' }}">
                                 <a href="{{ route('admin.staffs.index') }}">All Staffs</a>
                             </li>
                             @endif

                             @if ($usr->can('staff.create'))
                             <li class="{{ Route::is('admin.staffs.create')  ? 'active' : '' }}"><a
                                     href="{{ route('admin.staffs.create') }}">Create Staff</a></li>
                             @endif
                         </ul>
                     </li>
                     @endif

                     @if ($usr->can('user.create') || $usr->can('user.view') || $usr->can('user.edit') ||
                     $usr->can('user.delete'))
                     <li>
                         <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-users "></i><span>
                                 Users
                             </span></a>
                         <ul
                             class="collapse {{ Route::is('admin.users.create') || Route::is('admin.users.index') || Route::is('admin.users.edit') || Route::is('admin.users.show') ? 'in' : '' }}">
                             @if ($usr->can('user.view'))
                             <li
                                 class="{{ Route::is('admin.users.index')  || Route::is('admin.users.edit') ? 'active' : '' }}">
                                 <a href="{{ route('admin.users.index') }}">All Users</a>
                             </li>
                             @endif
                             {{-- @if ($usr->can('user.create'))
                                <li class="{{ Route::is('admin.users.create')  ? 'active' : '' }}"><a
                                 href="{{ route('admin.users.create') }}">Create User</a>
                     </li>
                     @endif --}}
                 </ul>
                 </li>
                 @endif

                 @if ($usr->can('service.create') || $usr->can('service.view') || $usr->can('service.edit') ||
                 $usr->can('service.delete'))
                 <li>
                     <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cubes"></i><span>
                             Services
                         </span></a>
                     <ul
                         class="collapse {{ Route::is('admin.services.create') || Route::is('admin.services.index') || Route::is('admin.services.edit') || Route::is('admin.services.show') ? 'in' : '' }}">
                         @if ($usr->can('service.view'))
                         <li
                             class="{{ Route::is('admin.services.index')  || Route::is('admin.services.edit') ? 'active' : '' }}">
                             <a href="{{ route('admin.services.index') }}">All Services</a>
                         </li>
                         @endif
                         @if ($usr->can('service.create'))
                         <li class="{{ Route::is('admin.services.create')  ? 'active' : '' }}"><a
                                 href="{{ route('admin.services.create') }}">Create Service</a></li>
                         @endif
                     </ul>
                 </li>
                 @endif

                 @if ($usr->can('package.create') || $usr->can('package.view') || $usr->can('package.edit') ||
                 $usr->can('package.delete'))
                 <li>
                     <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-indent"></i><span>
                             Packages
                         </span></a>
                     <ul
                         class="collapse {{ Route::is('admin.packages.create') || Route::is('admin.packages.index') || Route::is('admin.packages.edit') || Route::is('admin.packages.show') ? 'in' : '' }}">
                         @if ($usr->can('package.view'))
                         <li
                             class="{{ Route::is('admin.packages.index')  || Route::is('admin.packages.edit') ? 'active' : '' }}">
                             <a href="{{ route('admin.packages.index') }}">All Packages</a>
                         </li>
                         @endif
                         @if ($usr->can('package.create'))
                         <li class="{{ Route::is('admin.packages.create')  ? 'active' : '' }}"><a
                                 href="{{ route('admin.packages.create') }}">Create Package</a></li>
                         @endif
                     </ul>
                 </li>
                 @endif

                 @if ($usr->can('setting.create') || $usr->can('setting.view') || $usr->can('setting.edit') ||
                 $usr->can('setting.delete'))
                 <li>
                     <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-cogs"></i><span>
                             Settings
                         </span></a>
                     <ul
                         class="collapse {{ Route::is('admin.settings.create') || Route::is('admin.settings.index') || Route::is('admin.settings.edit') || Route::is('admin.settings.show') ? 'in' : '' }}">
                         @if ($usr->can('setting.view'))
                         <li
                             class="{{ Route::is('admin.settings.index')  || Route::is('admin.settings.edit') ? 'active' : '' }}">
                             <a href="{{ route('admin.settings.index') }}">All Settings</a>
                         </li>
                         @endif
                         @if ($usr->can('setting.create'))
                         <li class="{{ Route::is('admin.settings.create')  ? 'active' : '' }}"><a
                                 href="{{ route('admin.settings.create') }}">Create Setting</a></li>
                         @endif
                     </ul>
                 </li>
                 @endif

                 <li>
                     <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-file-text"></i><span>
                             Pages
                         </span></a>
                     <ul
                         class="collapse {{ Route::is('admin.pages.create') || Route::is('admin.pages.index') || Route::is('admin.pages.edit') || Route::is('admin.pages.show') ? 'in' : '' }}">

                         <li
                             class="{{ Route::is('admin.pages.index')  || Route::is('admin.pages.edit') ? 'active' : '' }}">
                             <a href="{{route('admin.pages.index')}}">All Pages</a>
                         </li>

                         <li class="{{ Route::is('admin.pages.create')  ? 'active' : '' }}"><a
                                 href="{{route('admin.pages.create')}}">Create Pages</a></li>
                     </ul>
                 </li>

                 <li>
                     <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-file-text"></i><span>
                             Bookings
                         </span></a>
                     <ul
                         class="collapse {{ Route::is('admin.bookings.create') || Route::is('admin.bookings.index') || Route::is('admin.bookings.edit') || Route::is('admin.bookings.show') ? 'in' : '' }}">
                         <li
                             class="{{ Route::is('admin.bookings.index')  || Route::is('admin.bookings.edit') ? 'active' : '' }}">
                             <a href="{{route('admin.bookings.index')}}">All Bookings</a>
                         </li>
                         @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') ||
                         $usr->can('role.delete'))
                         @if ($usr->can('role.create'))
                         <li class="{{ Route::is('admin.bookings.create')  ? 'active' : '' }}"><a
                                 href="{{route('admin.bookings.create')}}">Create Bookings</a></li>
                         @endif
                         @endif
                     </ul>
                 </li>

                 @if($usr->can('chat.create') || $usr->can('chat.view'))
                 <li>
                     <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-file-text"></i><span>
                             Chat Support
                         </span></a>
                     <ul class="collapse {{ Route::is('chat.index') ? 'in' : '' }}">
                         <li class="{{ Route::is('chat.index') ? 'active' : '' }}"><a
                                 href="{{route('chat.index')}}">Chat</a></li>
                     </ul>
                 </li>
                 @endif

                 <li>
                     <a href="javascript:void(0)" aria-expanded="true"><i class="fa fa-file-video-o"></i><span>
                             Zoom Support
                         </span></a>
                     <ul>
                         <a href="{{route('video.index')}}">Join Meeting</a>
                     </ul>
                 </li>
                 </ul>
             </nav>
         </div>
     </div>
 </div>
 <!-- sidebar menu area end -->