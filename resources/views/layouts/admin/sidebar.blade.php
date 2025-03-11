<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item">

                <a href="javascript:;"><i class="la la-home"></i><span class="menu-title" data-i18n="Dashboard">Home</span></a>

                <ul class="menu-content">

                    <li class="{{ (request()->routeIs('admin.dashboard'))? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/dashboard')}}"><i></i>
                            <span data-i18n="eCommerce">Dashboard</span>
                    </a>
                    </li>
                    <li class="{{ (request()->routeIs('home'))? 'active' : '' }}">
                        <a class="menu-item" href="{{ URL('') }}"><i></i>
                            <span data-i18n="Crypto">Visit Website</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.favicon.edit'))? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/favicon/edit')}}"><i></i>
                            <span data-i18n="Crypto">Favicon Management</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.logo.edit'))? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/logo/edit')}}"><i></i>
                            <span data-i18n="Sales">Logo Management</span>
                        </a>
                    </li>
                     <li class="{{ (request()->routeIs('admin.banner.index') || request()->routeIs('admin.banner.create') || request()->routeIs('admin.banner.edit')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/banner')}}"><i></i>
                            <span data-i18n="Sales">Banner Management</span>
                        </a>
                    </li>
                    <li class="{{ (request()->routeIs('admin.config.setting'))? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/config/setting')}}"><i></i>
                            <span data-i18n="Sales">Config</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="javascript:;"><i class="la la-share-alt"></i><span class="menu-title" data-i18n="Dashboard">Inquires</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/contact/inquiries') || request()->is('admin/contact/inquiries/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/contact/inquiries')}}"><i></i>
                            <span data-i18n="eCommerce">Contact Inquiries</span>
                    </a>
                    </li>
                    <li class="{{ (request()->is('admin/newsletter/inquiries')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/newsletter/inquiries')}}"><i></i>
                            <span data-i18n="Crypto">Newsletter Inquiries</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="javascript:;"><i class="la la-list"></i><span class="menu-title" data-i18n="Dashboard">CMS</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/page') || request()->is('admin/page/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('admin/page') }}"><i></i>
                            <span data-i18n="eCommerce">Pages Content</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="javascript:;"><i class="la la-list"></i><span class="menu-title" data-i18n="Dashboard">Teacher Section</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('users2/users2') || request()->is('users2/users2/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('users2/users2') }}"><i></i>
                            <span data-i18n="eCommerce"> View All Teachers </span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="javascript:;"><i class="la la-list"></i><span class="menu-title" data-i18n="Dashboard">Provider Section</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('users3/users3') || request()->is('users3/users3/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('users3/users3') }}"><i></i>
                            <span data-i18n="eCommerce"> View All Providers </span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="javascript:;"><i class="la la-list"></i><span class="menu-title" data-i18n="Dashboard"> Jobs Management</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('job_post/job_post') || request()->is('job_post/job_post/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('job_post/job_post') }}"><i></i>
                            <span data-i18n="eCommerce"> Post New Job </span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="javascript:;"><i class="la la-list"></i><span class="menu-title" data-i18n="Dashboard"> Application </span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('request_job/request_job') || request()->is('request_job/request_job/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('request_job/request_job') }}"><i></i>
                            <span data-i18n="eCommerce"> Recieve Application </span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="javascript:;"><i class="la la-list"></i><span class="menu-title" data-i18n="Dashboard">Chidcares</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/childcares') || request()->is('admin/childcare/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('admin/childcares') }}"><i></i>
                            <span data-i18n="eCommerce"> View All Chidcares </span>
                        </a>
                    </li>
                </ul>
            </li>



            <!-- <li class="nav-item">
                <a href="javascript:;"><i class="la la-list"></i><span class="menu-title" data-i18n="Dashboard"> Post </span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('post/post') || request()->is('post/post/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('post/post') }}"><i></i>
                            <span data-i18n="eCommerce"> Add Post </span>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item">
                <a href="javascript:;"><i class="la la-list"></i><span class="menu-title" data-i18n="Dashboard"> Comments </span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('comment/comment') || request()->is('comment/comment/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{ url('comment/comment') }}"><i></i>
                            <span data-i18n="eCommerce"> Add Comments </span>
                        </a>
                    </li>
                </ul>
            </li> -->


            <!-- <li class="nav-item">
                <a href="javascript:;"><i class="la la-shopping-cart"></i><span class="menu-title" data-i18n="Dashboard">Ecommerce</span></a>
                <ul class="menu-content">
                    <li class="{{ (request()->is('admin/attributes') || request()->is('admin/attributes/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/attributes')}}"><i></i>
                            <span data-i18n="eCommerce">Attributes</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/attributes-value') || request()->is('admin/attributes-value/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/attributes-value')}}"><i></i>
                            <span data-i18n="eCommerce">Attributes Values</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/category') || request()->is('admin/category/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/category')}}"><i></i>
                            <span data-i18n="eCommerce">Categories</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/product') || request()->is('admin/product/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/product')}}"><i></i>
                            <span data-i18n="eCommerce">Products</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('admin/order/list') || request()->is('admin/order/list/*')) ? 'active' : '' }}">
                        <a class="menu-item" href="{{url('admin/order/list')}}"><i></i>
                            <span data-i18n="eCommerce">Orders</span>
                        </a>
                    </li>
                </ul>
            </li> -->


            <!-- <li class="nav-item">
            <!--    <a href="{{url('admin/blog')}}" target="_blank"><i class="la la-tags"></i>-->
            <!--        <span class="menu-title" data-i18n="eCommerce">Blog</span>-->
            <!--    </a>-->
            <!--</li>-->

            <li class="nav-item {{ (request()->is('payment/payment') || request()->is('payment/payment/*')) ? 'active' : '' }}">
                <a href="{{url('payment/payment')}}"><i class="la la-user"></i>
                    <span class="menu-title" data-i18n="eCommerce">User Payment</span>
                </a>
            </li>


            <li class="nav-item {{ (request()->is('admin/shared-gallery/shared-gallery') || request()->is('admin/shared-gallery/shared-gallery/*')) ? 'active' : '' }}">
                <a href="{{url('admin/shared-gallery/shared-gallery')}}"><i class="la la-picture-o"></i>
                    <span class="menu-title" data-i18n="eCommerce">Shared Gallery</span>
                </a>
            </li>


            <li class="nav-item {{ (request()->is('review/review') || request()->is('review/review/*')) ? 'active' : '' }}">
                <a href="{{url('review/review')}}"><i class="la la-picture-o"></i>
                    <span class="menu-title" data-i18n="eCommerce">Daycare Reviews</span>
                </a>
            </li>



            @php
                $url = '/'.request()->segment(1).'/'. request()->segment(2);
            @endphp
            @foreach($laravelAdminMenus->menus as $section)
                @if(count(collect($section->items)) > 0)
                    @foreach($section->items as $menu)
                    <li class="nav-item {{ ($url == $menu->url) ? 'active' : '' }}">
                        <a href="{{ url($menu->url) }}" target="_blank">{!! $menu->icon !!}
                            <span class="menu-title" data-i18n="eCommerce">{{ $menu->title }}</span>
                        </a>
                    </li>
                    @endforeach
                @endif
            @endforeach
            <li class="nav-item">
                <a href="{{url('admin/account/settings')}}"><i class="la la-shopping-cart"></i>
                    <span class="menu-title" data-i18n="eCommerce">Account Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>
