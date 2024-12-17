<header class="container">
    @include('includes.nav')
    <div class="p-3 pb-md-4 mx-auto">
        @if(!Request::is('/'))
        <h1 class="display-4 fw-normal">@yield('title')</h1>
        @endif
    </div>
</headeR>
