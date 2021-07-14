<div class="sidebar__nav border-top border-left  ">
    <span class="bars d-none padding-0-18"></span>
    <a class="header__logo  d-none" href=""></a>
    <div class="profile__info border cursor-pointer text-center">
        <div class="avatar__img"><img src="/admin/img/pro.jpg" class="avatar___img">
            <input type="file" accept="image/*" class="hidden avatar-img__input">
            <div class="v-dialog__container" style="display: block;"></div>
            <div class="box__camera default__avatar"></div>
        </div>
        <span class="profile__name">کاربر : احمد محمدی</span>
    </div>


    <ul>
        {{--<li class="item-li i-dashboard is-active"><a href="index.html">پیشخوان</a></li>
        <li class="item-li i-courses "><a href="courses.html">دوره ها</a></li>--}}
        <li class="item-li i-users @if(request()->routeIs('user.create')) is-active @endif"><a href="{{route('user.create')}}"> کاربران</a></li>
        <li class="item-li i-categories @if(request()->routeIs('category.create')) is-active @endif"><a href="{{route('category.create')}}">دسته بندی ها</a></li>
        <li class="item-li i-categories @if(request()->routeIs('featuredCategory.create')) is-active @endif"><a href="{{route('featuredCategory.create')}}">ایجاد دسته بندی ویژه</a></li>
        <li class="item-li i-categories @if(request()->routeIs('brand.create')) is-active @endif"><a href="{{route('brand.create')}}">برند ها</a></li>
        <li class="item-li i-slideshow @if(request()->routeIs('product.create')) is-active @endif"><a href="{{route('product.create')}}">محصولات</a></li>
        <li class="item-li i-slideshow @if(request()->routeIs('offer.create')) is-active @endif"><a href="{{route('offer.create')}}">کد تخفیف</a></li>
        <li class="item-li i-slideshow @if(request()->routeIs('slider.create')) is-active @endif"><a href="{{route('slider.create')}}">اسلایدر</a></li>
        <li class="item-li i-slideshow @if(request()->routeIs('propertyGroup.create')) is-active @endif"><a href="{{route('propertyGroup.create')}}">گروه مشخصات</a></li>
        <li class="item-li i-slideshow @if(request()->routeIs('properties.create')) is-active @endif"><a href="{{route('properties.create')}}"> مشخصات</a></li>
        <li class="item-li i-slideshow @if(request()->routeIs('role.create')) is-active @endif"><a href="{{route('role.create')}}">نقش ها</a></li>
        {{--<li class="item-li i-banners"><a href="banners.html">بنر ها</a></li>
        <li class="item-li i-articles"><a href="articles.html">مقالات</a></li>
        <li class="item-li i-ads"><a href="ads.html">تبلیغات</a></li>
        <li class="item-li i-comments"><a href="comments.html"> نظرات</a></li>
        <li class="item-li i-tickets"><a href="tickets.html"> تیکت ها</a></li>
        <li class="item-li i-discounts"><a href="discounts.html">تخفیف ها</a></li>
        <li class="item-li i-transactions"><a href="transactions.html">تراکنش ها</a></li>
        <li class="item-li i-checkouts"><a href="checkouts.html">تسویه حساب ها</a></li>
        <li class="item-li i-checkout__request "><a href="checkout-request.html">درخواست تسویه </a></li>
        <li class="item-li i-my__purchases"><a href="mypurchases.html">خرید های من</a></li>
        <li class="item-li i-notification__management"><a href="notification-management.html">مدیریت اطلاع رسانی</a>
        </li>
        <li class="item-li i-user__inforamtion"><a href="user-information.html">اطلاعات کاربری</a></li>--}}
    </ul>

</div>
