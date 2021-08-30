<ul>
    @if (auth()->user()->role === 'admin')

        <li class="item-li i-dashboard @if (request()->is('dashboard')) is-active @endif"><a href="{{ route('dashboard') }}">پیشخوان</a></li>
        <li class="item-li i-users @if (request()->is('panel/users') || request()->is('panel/users/*')) is-active @endif"><a href="{{ route('users.index') }}"> کاربران</a></li>
        <li class="item-li i-categories @if (request()->is('panel/categories') || request()->is('panel/categories/*')) is-active @endif"><a href="{{ route('categories.index') }}">
                دسته بندی
                ها</a></li>
        <li class="item-li i-categories @if (request()->is('panel/admin.categoryshop') || request()->is('panel/admin.categoryshop/*')) is-active @endif"><a href="{{ route('admin.categoryshop.index') }}">
                categoryshop
            </a></li>

        <li class="item-li i-comments @if (request()->is('panel/comments') || request()->is('panel/comments/*')) is-active @endif"><a href="{{ route('comments.index') }}"> نظرات</a>
        </li>
        <li class="item-li i-comments @if (request()->is('panel/track') || request()->is('panel/track/*')) is-active @endif"><a href="{{ route('track.index') }}"> پیست</a></li>



        <li class="item-li i-categories @if (request()->is('panel/admin/product') || request()->is('panel/admin/product/*')) is-active @endif"><a href="{{ route('admin.product.index') }}">
            product
        </a></li>
        <li class="item-li i-categories @if (request()->is('panel/admin/attributegroup') || request()->is('panel/admin/attributegroup/*')) is-active @endif"><a href="{{ route('admin.attributegroup.index') }}">
            attributegroup
        </a></li>


    @endif



    @if (auth()->user()->role === 'admin' || auth()->user()->role === 'author')
        <li class="item-li i-articles @if (request()->is('panel/posts') || request()->is('panel/posts/*')) is-active @endif"><a href="{{ route('posts.index') }}">مقالات</a></li>
    @endif


    <li class="item-li i-user__inforamtion @if (request()->is('profile')) is-active @endif"><a href="{{ route('profile') }}">اطلاعات
            کاربری</a></li>
</ul>
