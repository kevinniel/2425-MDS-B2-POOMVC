<nav>
    <ul>
        {{-- <li>
            <a href="{{ route('pages.dashboard') }}">Dashboard</a>
        </li> --}}
        @include('layout.components.navitem', [
            'route' => route('pages.dashboard'),
            'name' => 'Dashboard',
        ])
        <li>
            <a href="{{ route('products.index') }}">Produits</a>
        </li>
    </ul>
</nav>