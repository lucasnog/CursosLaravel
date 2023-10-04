<div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page"
                    href="{{ route('dashboard.index') }}">
                    <svg class="bi">
                        <use xlink:href="#house-fill" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('vendas.index') }}">
                    <svg class="bi">
                        <use xlink:href="#file-earmark" />
                    </svg>
                    Venda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('produto.index') }}">
                    <svg class="bi">
                        <use xlink:href="#cart" />
                    </svg>
                    Produto
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('clientes.index') }}">
                    <svg class="bi">
                        <use xlink:href="#people" />
                    </svg>
                    Clientes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('usuario.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                    </svg>
                    Usuário
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2" href="#">
                    <svg class="bi">
                        <use xlink:href="#door-closed" />
                    </svg>
                    Sair
                </a>
            </li>

        </ul>


    </div>
</div>
