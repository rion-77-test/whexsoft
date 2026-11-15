<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-wrapper">
        <nav class="mt-2" aria-label="Admin navigation">
            <ul class="nav sidebar-menu flex-column" id="navigation">
                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}"
                        class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-journal-text"></i>
                        <p>Posts</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.post-categories.index') }}"
                        class="nav-link {{ request()->routeIs('admin.post-categories.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-tag"></i>
                        <p>Post Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.projects.index') }}"
                        class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-kanban"></i>
                        <p>Projects</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.project-categories.index') }}"
                        class="nav-link {{ request()->routeIs('admin.project-categories.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-tags"></i>
                        <p>Project Categories</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
