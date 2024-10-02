@php
    $categories = getCategory();
@endphp
<style>
    .link-header {
        background-color: #29725e;
        border-bottom: 1px solid #dee2e6;
        z-index: 100;
    }

    .navbar-nav .nav-item {
        position: relative;
    }

    .dropdown-menu {
        top: 100%;
        left: 0;
        margin-top: 0;
        border-radius: 0;
        border-bottom: none;
        padding: 0;
    }

    .dropdown-menu li {
        border-bottom: 1px solid #ddd;
    }

    .dropdown-menu li:hover a {
        background: #ddd;
    }

    .dropdown-item {
        padding: 8px;
    }

    .nav-link {
        padding: 10px 12px;
        color: #fff;
        font-size: 16px;
    }

    .nav-link:hover {
        color: #ddd;
    }

    .nav-item:hover .dropdown-menu {
        display: block;
    }

    .navbar-expand-lg .navbar-nav {
        gap: 12px;
    }
</style>

{{-- navbar --}}

<header class="link-header d-none d-md-block">
    <div class="container">
        <nav class="navbar navbar-expand-lg p-0">
            <div class="navbar-nav">
                @foreach ($categories as $category)
                    <div class="nav-item dropdown">
                        @if ($category->subcategories->isNotEmpty())
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{ $category->id }}"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $category->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown{{ $category->id }}">
                                @foreach ($category->subcategories as $subcategory)
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ $subcategory->id }}">{{ $subcategory->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <a class="nav-link" href="{{ $category->id }}">{{ $category->name }}</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </nav>
    </div>
</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
