<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ url('admin/home') }}"><i class="fa fa-snowflake-o"></i> <span> Dashboard </span></a>
                </li>
                <li>
                    <a href="{{ route('category.show') }}"><i class="fa fa-list"></i> <span> Category </span></a>
                </li>
                <li>
                    <a href="{{ route('color.show') }}"><i class="fa fa-paint-brush"></i> <span> Color </span></a>
                </li>
                <li>
                    <a href="{{ route('product.show') }}"><i class="fa fa-shopping-cart"></i> <span> Product </span></a>
                </li>
                <li>
                    <a href="{{ route('order.show') }}"><i class="fa fa-money"></i> <span> Order </span></a>
                </li>
                <li>
                    <a href="{{ route('user.show') }}"><i class="fa fa-users"></i> <span> User </span></a>
                </li>
                <li>
                    <a href="{{ route('contact.show') }}"><i class="fa fa-users"></i> <span> Contact Feeds </span></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>