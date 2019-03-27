<!--start fixed-dash-menu-->
<div class="fixed-dash-menu">
    <div class="dash-menu-content">


        <!--start dash-side-->
        <div class="dash-side">
            <div class="user-div">
                <a href="profile.html"><img src="images/main/man.png" alt="user" /></a>
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

                    <li>
                        <a href="{{route('products.index')}}"><i class="fa fa-pagelines"></i>
                            {{trans('local.products')}}
                        </a>
                    </li>

                    <li>
                        <a href="{{route('permissions.index')}}">
                            <i class="fa fa-pagelines"></i>
                            {{trans('local.permissions')}}
                        </a>
                    </li>

                    <li><a href="dash-news.html"><i class="fa fa-file-text-o"></i>الأخبار</a></li>
                    <li><a href="dash-services.html"><i class="fa fa-cog"></i>الخدمات</a></li>

                    <li>
                        <a href="dash-gallery.html"><i class="fa fa-picture-o"></i>
                            الصور والفيديوهات
                        </a>
                    </li>


                    <li class="list-item-has-child">
                        <a href="#"><i class="fa fa-sitemap"></i> فروع الشركة </a>
                    </li>

                    <li><a href="dash-suppliers.html"><i class="fa fa-male"></i>الموردون</a></li>
                    <li><a href="dash-jobs.html"><i class="fa fa-briefcase"></i>سياسة العمل بالشركة</a></li>
                    <li class="list-item-has-child">
                        <a href="#"><i class="fa fa-files-o"></i>
                            من نحن
                        </a>
                        <div class="slide-dash-menu">
                            <a href="about-edit.html">تعديل المحتوي</a>
                            <a href="about-images.html">إضافة صور</a>
                            <a href="prize.html"> الجوائز الخاصة بالشركة</a>
                            <a href="dash-team.html"> أعضاء مجلس الإدارة وكبار الموظفين</a>

                        </div>
                    </li>
                    <li><a href="systems.html"><i class="fa fa-cog"></i> الأنظمة</a></li>
                    <li><a href="users.html"><i class="fa fa-users"></i> المستخدمين</a></li>
                    <li><a href="edit-site.html"><i class="fa fa-edit"></i> تعديل محتوي الموقع</a></li>

                    <li><a href="/logout"><i class="fa fa-power-off"></i> {{trans('local.logout_n')}}</a></li>



                </ul>
            </div>
            <!--end side-dash-menu-->
        </div>
        <!--end dash-side-->
    </div>
</div>

<!--end fixed-dash-menu-->