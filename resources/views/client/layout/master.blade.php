@include('client.layout.header')
@include('client.layout.menu')
@include('client.layout.slide')

<div class="container">
	<div class="row mt-5">

        @yield('content')
    </div>
</div>
