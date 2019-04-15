<!--start fixed-dash-menu-->
<div class="fixed-dash-menu">
    <div class="dash-menu-content">


        <!--start dash-side-->
        <div class="dash-side">
            <div class="user-div">
                <a href="profile.html"><img src="{{asset('/public/images/main/man.png')}}" alt="user"/></a>
                <div class="user-side">
                    <h3>إســــــم المستخدم</h3>
                    <ul class="list-inline">
                        <li><a href="edit-data.html"><i class="fa fa-pencil-square"></i>تعديل بياناتي</a></li>
                    </ul>
                </div>
            </div>


            <!--start side-dash-menu-->

            <div class="side-dash-menu">
                <ul class="list-unstyled main-menu-dash">
                    <li class="active"><a href="{{route('dashboard')}}"><i class="fa  fa-clipboard"></i>{{trans('local.dashboard')}}</a></li>
                    <li class="list-item-has-child">
                        <a href="#"><i class="fa fa-files-o"></i>
                            {{trans('local.categories')}}
                        </a>
                        <div class="slide-dash-menu">
{{--                            {{dd(Route::current()->getName()=='categories.index')}}--}}
                            <a href="{{route('categories.index')}}" class="{{ url()->current() == route('categories.index') ? 'active' : '' }}">{{trans('local.main_categories')}}</a>
                            <a href="{{route('subcategories.index')}}">{{trans('local.subcategories')}}</a>
                        </div>
                    </li>
                    <li><a href="{{route('suppliers.index')}}"><i class="fa fa-male"></i>{{trans('local.suppliers')}}
                        </a></li>

                    <li class="list-item-has-child">
                        <a href="#"><i class="fa fa-files-o"></i>
                            {{trans('local.users')}}
                        </a>
                        <div class="slide-dash-menu">
                            {{--                            {{dd(Route::current()->getName()=='categories.index')}}--}}
                            <a href="{{route('users.index')}}">{{trans('local.list_users')}}</a>
                            <a href="{{route('admins')}}">{{trans('local.list_admins')}}</a>
                            <a href="{{route('blocked')}}">{{trans('local.list_blocked')}}</a>
                        </div>
                    </li>

                    <li class="list-item-has-child">
                        <a href="#"><i class="fa fa-files-o"></i>
                            {{trans('local.employees')}}
                        </a>
                        <div class="slide-dash-menu">
                            <a href="{{route('employees.index')}}">{{trans('local.employees')}}</a>
                            <a href="{{route('efollow_work')}}">{{trans('local.efollow_work')}}</a>
                            <a href="{{route('econtrol_supplier')}}">{{trans('local.econtrol_supplier')}}</a>
                            <a href="{{route('eorderproduct')}}"> {{trans('local.eorderproduct')}}</a>

                        </div>
                    </li>


                    <li>
                        <a href="{{route('products.index')}}"><i class="fa fa-pagelines"></i>
                            {{trans('local.products')}}
                        </a>
                    </li>
                    <li><a href="{{route('systems.index')}}"><i class="fa fa-cog"></i> {{trans('local.systems')}}</a>
                    </li>

                    <li>
                        <a href="{{route('permissions.index')}}">
                            <i class="fa fa-pagelines"></i>
                            {{trans('local.permissions')}}
                        </a>
                    </li>

                    <li><a href="{{route('news.index')}}"><i class="fa fa-file-text-o"></i>{{trans('local.news')}}</a>
                    </li>

                    <li class="list-item-has-child">
                        <a href="#"><i class="fa fa-files-o"></i>
                            من نحن
                        </a>
                        <div class="slide-dash-menu">
                            <a href="{{route('about_editcontent.index')}}">{{trans('local.edit_content')}}</a>
                            <a href="{{route('about_images.index')}}">{{trans('local.insert_photos')}}</a>
                            <a href="{{route('prize.index')}}">{{trans('local.company_awards')}}</a>
                            <a href="{{route('dash_team.index')}}"> {{trans('local.board_members')}}</a>

                        </div>
                    </li>

                    <li><a href="dash-services.html"><i class="fa fa-cog"></i>الخدمات</a></li>

                    <li>
                        <a href="dash-gallery.html"><i class="fa fa-picture-o"></i>
                            الصور والفيديوهات
                        </a>
                    </li>


                    <li class="list-item-has-child">
                        <a href="#"><i class="fa fa-sitemap"></i> فروع الشركة </a>
                    </li>

                    <li><a href="dash-jobs.html"><i class="fa fa-briefcase"></i>سياسة العمل بالشركة</a></li>

                    <li><a href="edit-site.html"><i class="fa fa-edit"></i> تعديل محتوي الموقع</a></li>

                    <li><a href="{{route('logout')}}"><i class="fa fa-power-off"></i> {{trans('local.logout_n')}}</a>
                    </li>



                </ul>
            </div>
            <!--end side-dash-menu-->
        </div>
        <!--end dash-side-->
    </div>
</div>

<!--end fixed-dash-menu-->