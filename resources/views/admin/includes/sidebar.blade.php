<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('admin.main') }}" class="nav-link">
                <i class="fa-solid fa-house"></i>
                <p>
                    Главная
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.category.index') }}" class="nav-link">
                <i class="navbar-icon fas fa-th-list"></i>
                <p>
                    Категории
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.tag.index') }}" class="nav-link">
                <i class="fa-solid fa-tags"></i></i>
                <p>
                    Тэги
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.post.index') }}" class="nav-link">
                <i class="fa-regular fa-clipboard"></i></i>
                <p>
                    Посты
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.user.index') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i></i>
                <p>
                    Пользователи
                </p>
            </a>
        </li>
    </ul>
</aside>
