<div class="container">
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav">
            <li><a class="home_link" title="خانه" href="/">خانه</a></li>
        @foreach($categories as $category)
            <li class="dropdown"><a href="category.html">{{$category->title_fa}}</a>
                <div class="dropdown-menu">
                    <ul>
                    @foreach($category->children as $categoryChildren)
                        <li><a href="category.html"> {{$categoryChildren->title_fa}} <span> @if ($categoryChildren->children->count() > 0) &rsaquo; @endif </span></a>
                            @if ($categoryChildren->children->count() > 0)
                                <div class="dropdown-menu">
                                    <ul>
                                        @foreach($categoryChildren->children as $subCategory)
                                            <li><a href="category.html"> {{$subCategory->title_fa}} </a> </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </li>
                    @endforeach
                    </ul>
                </div>
            </li>
        @endforeach

            <li class="menu_brands dropdown"><a href="#">برند ها</a>
                <div class="dropdown-menu">
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="/client/image/product/apple_logo-60x60.jpg" title="اپل" alt="اپل" /></a><a href="#">اپل</a></div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="/client/image/product/canon_logo-60x60.jpg" title="کنون" alt="کنون" /></a><a href="#">کنون</a></div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"> <a href="#"><img src="/client/image/product/hp_logo-60x60.jpg" title="اچ پی" alt="اچ پی" /></a><a href="#">اچ پی</a></div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="/client/image/product/htc_logo-60x60.jpg" title="اچ تی سی" alt="اچ تی سی" /></a><a href="#">اچ تی سی</a></div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="/client/image/product/palm_logo-60x60.jpg" title="پالم" alt="پالم" /></a><a href="#">پالم</a></div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="/client/image/product/sony_logo-60x60.jpg" title="سونی" alt="سونی" /></a><a href="#">سونی</a> </div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="/client/image/product/canon_logo-60x60.jpg" title="test" alt="test" /></a><a href="#">تست</a> </div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="/client/image/product/apple_logo-60x60.jpg" title="test 3" alt="test 3" /></a><a href="#">تست 3</a></div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="/client/image/product/canon_logo-60x60.jpg" title="test 5" alt="test 5" /></a><a href="#">تست 5</a> </div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="/client/image/product/canon_logo-60x60.jpg" title="test 6" alt="test 6" /></a><a href="#">تست 6</a></div>
                    <div class="col-lg-1 col-md-2 col-sm-3 col-xs-6"><a href="#"><img src="/client/image/product/apple_logo-60x60.jpg" title="test 7" alt="test 7" /></a><a href="#">تست 7</a> </div>


                </div>
            </li>
            <li class="dropdown wrap_custom_block hidden-sm hidden-xs"><a>بلاک سفارشی</a>
                <div class="dropdown-menu custom_block">
                    <ul>
                        <li>
                            <table>
                                <tbody>
                                <tr>
                                    <td><img alt="" src="image/banner/cms-block.jpg"></td>
                                    <td><img alt="" src="image/banner/responsive.jpg"></td>
                                    <td><img alt="" src="image/banner/cms-block.jpg"></td>
                                </tr>
                                <tr>
                                    <td><h4>بلاک های محتوا</h4></td>
                                    <td><h4>قالب واکنش گرا</h4></td>
                                    <td><h4>پشتیبانی ویژه</h4></td>
                                </tr>
                                <tr>
                                    <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                    <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                    <td>این یک بلاک مدیریت محتواست. شما میتوانید هر نوع محتوای html نوشتاری یا تصویری را در آن قرار دهید.</td>
                                </tr>
                                <tr>
                                    <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                                    <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                                    <td><strong><a class="btn btn-primary btn-sm" href="#">ادامه مطلب</a></strong></td>
                                </tr>
                                </tbody>
                            </table>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown information-link"><a>برگه ها</a>
                <div class="dropdown-menu">
                    <ul>
                        <li><a href="login.html">ورود</a></li>
                        <li><a href="register.html">ثبت نام</a></li>
                        <li><a href="category.html">دسته بندی (شبکه/لیست)</a></li>
                        <li><a href="product.html">محصولات</a></li>
                        <li><a href="cart.html">سبد خرید</a></li>
                        <li><a href="checkout.html">تسویه حساب</a></li>
                        <li><a href="compare.html">مقایسه</a></li>
                        <li><a href="wishlist.html">لیست آرزو</a></li>
                        <li><a href="search.html">جستجو</a></li>
                    </ul>
                    <ul>
                        <li><a href="about-us.html">درباره ما</a></li>
                        <li><a href="404.html">404</a></li>
                        <li><a href="elements.html">عناصر</a></li>
                        <li><a href="faq.html">سوالات متداول</a></li>
                        <li><a href="sitemap.html">نقشه سایت</a></li>
                        <li><a href="contact-us.html">تماس با ما</a></li>
                    </ul>
                </div>
            </li>
            <li class="custom-link-right"><a href="#" target="_blank"> همین حالا بخرید!</a></li>
        </ul>
    </div>
</div>
