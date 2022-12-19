<!DOCTYPE html>
<html lang="en">
@include('backend.include.head_link')
<body>
<div class="container-scroller">
    @include('backend.include.header')
    <div class="container-fluid page-body-wrapper">
        @include('backend.include.side_bar')
        <div class="main-panel">
            <div class="text-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="content-wrapper">
                @yield('content')
            </div>
            @include('backend.include.footer')
        </div>
    </div>
</div>
<a id="button"></a>
@include('backend.include.js')
</body>
</html>
</html>

