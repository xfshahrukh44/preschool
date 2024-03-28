
<div class="col-lg-3 col-md-4">
    <div class="myaccount-tab-menu nav" role="tablist">
        <a href="{{ URL('account') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'account')  ? 'active' : '' ?>"><i class="fas fa-th"></i>
            Dashboard</a>


        <!--<a href="{{ URL('orders') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'orders')  ? 'active' : '' ?>"><i class="fa fa-cart-arrow-down"></i> Orders History</a>-->

        <a href="{{ URL('account-detail') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'account-detail')  ? 'active' : '' ?>"><i class="fa fa-user"></i> Account Details</a>

{{--        <a href="{{ URL('find-daycare') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'find-daycare')  ? 'active' : '' ?>"><i class="fa fa-search"></i> Find Daycare </a>--}}

{{--        <a href="{{ URL('my-claimed-daycare') }}" class="<?php echo (isset($segment[0]) AND $segment[0] == 'my-claimed-daycare')  ? 'active' : '' ?>"><i class="fa fa-search"></i> Claimed Daycare</a>--}}


        <a href="{{ URL('signout') }}"><i class="fas fa-arrow-circle-left"></i> Logout</a>
    </div>
</div>
