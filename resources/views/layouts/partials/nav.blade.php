<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ route('admin.admins.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Admins
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.languages.index') }}" class="nav-link">
                <i class="nav-icon fas fa-language"></i>
                <p>
                    Languages
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.products.index') }}" class="nav-link">
                <i class="nav-icon fas fa-server"></i>
                <p>
                    Products
                </p>
            </a>
        </li>
    </ul>
</nav>
