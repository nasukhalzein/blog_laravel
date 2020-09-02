	<!-- SECTION -->
	@include('template_blog.header')
	<div class="section">
		<!-- container -->
		<div class="container">
			<div id="hot-post" class="row hot-post">
				
			@yield('konten')

			@include('template_blog.widged')
		</div>
	</div>
	@include('template_blog.footer')