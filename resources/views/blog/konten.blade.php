@extends('template_blog.content')

@section('konten')


	@foreach($data as $konten)
	<!-- PAGE HEADER -->
		<div id="post-header" class="page-header">
			<div class="page-header-bg" style="background-image: url( {{ asset($konten->gambar) }} );" data-stellar-background-ratio="0.5 "></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">{{ $konten->category->name }}</a>
						</div>
						<h1>{{ $konten->judul }}</h1>
						<ul class="post-meta">
							<li><a href="author.html">{{ $konten->users->name }}</a></li>
							<li>{{ $konten->created_at->diffForHumans() }}</li>
							<!-- <li><i class="fa fa-eye"></i> 807</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	</header>
	<!-- /HEADER -->
	<div class="col-md-8 hot-post-left">


	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- post share -->
					<div class="section-row">
						<div class="post-share">
							<a href="#" class="social-facebook"><i class="fa fa-facebook"></i><span>Share</span></a>
							<a href="#" class="social-twitter"><i class="fa fa-twitter"></i><span>Tweet</span></a>
							<a href="#" class="social-pinterest"><i class="fa fa-pinterest"></i><span>Pin</span></a>
							<a href="#" ><i class="fa fa-envelope"></i><span>Email</span></a>
						</div>
					</div>
					<!-- /post share -->

					<!-- post content -->
					<div class="section-row">
						<h3>Ea vix periculis sententiae, ea blandit pericula abhorreant pri.</h3>
						<p>{{ $konten->content }}</p>
					</div>
					<!-- /post content -->

					<!-- post tags -->
					<div class="section-row">
						<div class="post-tags">
							<ul>
								<li>TAGS:</li>
								<li><a href="#">Social</a></li>
								<li><a href="#">Lifestyle</a></li>
								<li><a href="#">Fashion</a></li>
								<li><a href="#">Health</a></li>
							</ul>
						</div>
					</div>
					<!-- /post tags -->
				</div>
			</div>
		</div>
	</div>
		
	@endforeach
</div>

@stop