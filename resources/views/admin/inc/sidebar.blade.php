<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset('admin/images/uploads/user/' . Auth::user()->image) }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }} | {{ $role_name_formal }}</div>
                <div class="email">{{ Auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li class="@yield('active_home')">
                    <a href="{{ route('home')}}">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>

                <li class="@yield('active_post')">
                    <a href="{{route('post.index')}}">
                        <i class="material-icons">local_post_office</i>
                        <span>Post</span>
                    </a>
                </li>

                @if ($role_id == 1 || $role_id == 2)                    
                <li class="@yield('widgets')">
                    <a class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">local_post_office</i>
                        <span>Widgets</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <a href="{{ route('showTopScrollbar') }}" class="waves-effect block m-l-10">
                            <li>
                                <span>
                                    Top scrollbar
                                </span>
                            </li>
                        </a>   
                    </ul>
                </li>
                @endif

                <li class="@yield('profile')">
                    <a href="{{route('profile.index')}}">
                        <i class="material-icons">contacts</i>
                        <span>Profile</span>
                    </a>
                </li>
                @if($role_id == 1)
                <li class="@yield('active_settings')">
                    <a class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">settings</i>
                        <span>Settings</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <a href="{{route('settings.index')}}" class="waves-effect block m-l-10">
                            <li>
                                <span>
                                    Blog Settings
                                </span>
                            </li>
                        </a>   
                        <a href="{{ route('user.index') }}" class="waves-effect block m-l-10">
                            <li>
                                <span>
                                   Manage Users
                                </span>
                            </li>
                        </a>   
                    </ul>
                </li>
                @endif

            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                {{-- &copy; 2016 - 2017 <a href="javascript:void(0);">Daily News Bangla</a>. --}}
                {!! $settings->blog_copyright !!}
            </div>
            <div class="version">
                <b>Version: </b> {!! $settings->dev_version !!}
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <p>There are currently no settings to display...</p>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>
