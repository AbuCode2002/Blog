<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{ route('personal.main') }}" class="nav-link">
                <i class="fa-solid fa-house"></i>
                <p>
                    Главная
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('personal.liked.index') }}" class="nav-link">
                <i class="fa-solid fa-heart"></i>
                <p>
                    Понравившиеся посты
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('personal.comment.index') }}" class="nav-link">
                <i class="fa-solid fa-comment"></i>
                <p>
                    Комментарий
                </p>
            </a>
        </li>
    </ul>
</aside>
