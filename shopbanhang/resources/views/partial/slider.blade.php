<section id="slider"><!--slider-->
		<div class="container">
		
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php $i=0; ?>
							@foreach($banner as $bn)
								<li data-target="#slider-carousel" data-slide-to="{{$i}}" 
								@if($i == 0)
									class="active"
								@endif
								></li>	
							<?php $i++; ?>				
							@endforeach
							
								<!-- <li data-target="#slider-carousel" data-slide-to="1"></li>
								<li data-target="#slider-carousel" data-slide-to="2"></li> -->
						</ol>
						
						<div class="carousel-inner">
							<?php $i=0; ?>
							@foreach($banner as $bn)
								<div 
								@if($i == 0)
									class="item active" 
								@else
									class="item"
								@endif
								>
								<?php $i++; ?>
									<div class="col-sm-6">
										<h1><span>22</span>{{$bn->name}}</h1>
										<h2>{{$bn->text1}}</h2>
										<p>{{$bn->text2}}</p>
										<a href="{{$bn->button}}" class="btn btn-default get">Get it now</a>
									</div>
									<div class="col-sm-6">
										<img src="{{asset('images')}}/{{$bn->imgmain}}" class="girl img-responsive" alt="" />
										<img src="{{asset('images')}}/{{$bn->imgextra}}"  class="pricing" alt="" />
									</div>
								</div>
							
							@endforeach
							<!-- <div class="item active" >
								<div class="col-sm-6">
									<h1><span>22</span>-DECEMBER</h1>
									<h2>Free 22-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('frontend/images/casual.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('frontend/images/casual.pg')}}"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>22</span>-DECEMBER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('frontend/images/casual2.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('frontend/images/casual.pg')}}"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>22</span>-DECEMBER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('frontend/images/casual3.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('frontend/images/casual.pg')}}" class="pricing" alt="" />
								</div>
							</div>
							
						</div> -->
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->