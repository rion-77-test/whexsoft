<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/admin/dashboard') }}" class="brand-link">
                <img
                    src="{{ asset('assets/frontend/images/whexsoft-logo.jpg') }}"
                    alt="WhexSoft logo"
                    class="brand-image shadow"
                />
                <span class="brand-text fw-light">WhexSoft</span>
            </a>
        </div>
        <nav class="mt-2" aria-label="Admin navigation">
            <ul class="nav sidebar-menu flex-column" id="navigation">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Users</p>
                    </a>
                </li>
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
                <li class="nav-item">
                    <a href="{{ route('admin.services.index') }}"
                        class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-gear"></i>
                        <p>Services</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.service-categories.index') }}"
                        class="nav-link {{ request()->routeIs('admin.service-categories.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-diagram-3"></i>
                        <p>Service Categories</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.packages.index') }}"
                        class="nav-link {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box-seam"></i>
                        <p>Packages</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.testimonials.index') }}"
                        class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-chat-quote"></i>
                        <p>Testimonials</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
