<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    li {
        list-style: none;
    }

    .topNavbar {
        background: #29725e;
        width: 100%;
        height: 60px;
        display: flex;
        align-items: center;
        padding: 0 10px;
        padding-right: 15px;
    }

    .icon {
        color: #fff;
        font-size: 24px;
        cursor: pointer;
    }

    .nav-item {
        display: flex;
        gap: 30px;
        white-space: nowrap;
        overflow-x: auto;
        margin: 0;
        padding: 0;
        width: 100%;
        padding-left: 1px;
    }

    .nav-item::-webkit-scrollbar {
        height: 2px;
    }

    .nav-item::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.5);
        border-radius: 10px;
    }

    .nav-item::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.2);
    }

    .nav-item .item {
        display: flex;
        gap: 30px;
    }

    .nav-item li .nav-link {
        color: #fff;
        font-weight: 500;
        font-size: 20px;
    }

    .dropdown-menu {
        margin: 0;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        top: 100%;
        padding: 0;
        color: #333;
        border: 1px solid #ccc;
    }

    .dropdown-content li {
        display: flex;
        flex-direction: column;
    }

    .dropdown-content li a {
        border-bottom: 1px solid #ccc;
        padding: 6px 14px;
        font-size: 20px;
        background: #fff;
        min-width: 120px;
    }

    .dropdown-content li a:hover {
        background: #e9e9e9;
    }

    .dropdown-content li a:last-child {
        border: none;
    }
</style>

<div class="topNavbar">
    <div class="container">
        <div class="nav-content">
            <ul class="nav-item">
                @foreach ($categories as $category)
                    @if ($category->subcategories->isNotEmpty())
                        <li>
                            <ul class="nav-item">
                                <li class="item">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button">
                                        {{ $category->name }}
                                    </a>
                                    <ul class="dropdown-content" aria-labelledby="navbarDropdown">
                                        @foreach ($category->subcategories as $subcategory)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('subcategory.post', ['id' => $subcategory->id, 'name' => $subcategory->name]) }}">
                                                    {{ $subcategory->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="item">
                            <a class="nav-link"
                                href="{{ route('category.post', ['id' => $category->id, 'name' => $category->name]) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>

<script>
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const dropdownContent = this.nextElementSibling;

            document.querySelectorAll('.dropdown-content').forEach(content => {
                if (content !== dropdownContent) {
                    content.style.display = 'none';
                }
            });

            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' :
                'block';
        });
    });

    window.addEventListener('click', function(e) {
        if (!e.target.matches('.dropdown-toggle')) {
            document.querySelectorAll('.dropdown-content').forEach(content => {
                content.style.display = 'none';
            });
        }
    });
</script>
