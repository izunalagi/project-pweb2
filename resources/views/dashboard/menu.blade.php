<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @auth
            @if (Auth::user()->userRole->role->name == 'admin')
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.post') }}" class="nav-link">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            List User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.role.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            List Role
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.userrole.index') }}" class="nav-link">
                        <i class="nav-icon far fa-user-circle"></i>
                        <p>
                            User Role
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.post.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Promo
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>


                <li class="nav-item">
                    <a href="{{ route('admin.productdetail.index') }}" class="nav-link">
                        <i class="nav-icon 	fas fa-image"></i>
                        <p>
                            Product_Detail
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                </li>


                <li class="nav-item">
                    <a href="{{ route('category.crud') }}" class="nav-link">
                        <i class="nav-icon 	fas fa-braille"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('voucher.index') }}" class="nav-link">
                        <i class="nav-icon 	fas fa-credit-card"></i>
                        <p>
                            Voucher
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
            @endif

            </li>
            <li class="nav-item">
                <a href="{{ route('admin.product.index') }}" class="nav-link">
                    <i class="nav-icon 	fas fa-box-open"></i>
                    <p>
                        Product
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>

            </li>

            <li class="nav-item">
                <a href="{{ route('buyer.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Buyer
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>


            <li class="nav-item">
                <a href="{{ route('transaction.index') }}" class="nav-link">
                    <i class="nav-icon 	far fa-credit-card"></i>
                    <p>
                        Transaction
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            </li>


            <li class="nav-item">
                <a href="#" class="nav-link"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon far fa-credit-card"></i>
                    <p>
                        Logout
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>




        @endauth





    </ul>
</nav>
