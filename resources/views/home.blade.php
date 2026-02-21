<x-layouts::app :title="__('Home')">
<div>
    <header>
        @if (Route::has('login'))
            <nav>
                @auth
                    @can('edit notes')
                        <a href="{{ url('/dashboard') }}" >
                            Player Notes
                        </a>
                    @endcan
                @else
                    <a href="{{ route('login') }}">
                        Log in
                    </a>
                @endauth
            </nav>
        @endif
    </header>
</div>
</x-layouts::app>
