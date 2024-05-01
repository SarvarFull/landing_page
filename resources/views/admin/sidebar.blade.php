<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: auto;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" fill="currentColor"
            class="bi bi-bootstrap-fill" viewBox="0 0 16 16">
            <path
                d="M6.375 7.125V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23zm0 3.762h1.898c1.184 0 1.81-.48 1.81-1.377 0-.885-.65-1.348-1.886-1.348H6.375z" />
            <path
                d="M4.002 0a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4zm1.06 12V3.545h3.399c1.587 0 2.543.809 2.543 2.11 0 .884-.65 1.675-1.483 1.816v.1c1.143.117 1.904.931 1.904 2.033 0 1.488-1.084 2.396-2.888 2.396z" />
        </svg>
        <span class="fs-4">Admin Dashboard</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#home" />
                </svg>
                Home
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-body-emphasis">
                Carousel
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-body-emphasis">
                Heading
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-body-emphasis">
                Main Section
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-body-emphasis">
                Users
            </a>
        </li>
        <li>
            <a href="#" class="nav-link link-body-emphasis">
                Subscribers
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                class="rounded-circle me-2">
            <strong>Sarvarbek Dev [>_-]</strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
            <li>
                <a class="dropdown-item" href="#">New project...</a>
            </li>
            <li>
                <a class="dropdown-item" href="#">Settings</a>
            </li>
            <li>
                <a class="dropdown-item" href="#">Profile</a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('main.page') }}">Back to Main Page</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('admin.register.page') }}">Sign out</a>
            </li>
        </ul>
    </div>
</div>
