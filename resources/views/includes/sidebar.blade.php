          <h1 class="my-4">Scooteri Shop</h1>


          <form class="border border-secondary rounded p-3">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-primary">Log in</button>
			  <a class="float-right mt-2" href="{{ route('register') }}">Register</a>

			   <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
		  </form>



          <div class="list-group mt-3 mb-3">



		<!-- Category and subcategories -->
		<ul class="list-group">
			@foreach($sub as $cat)
			 <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="{{ $cat->name }}">
		          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapse{{$cat->name}}" data-parent="#example{{$cat->name}}">

		            <span class="nav-link-text">{{ $cat->name }}</span>
		          </a>

			          <ul class="sidenav-second-level collapse" id="collapse{{$cat->name}}">
						@foreach($cat->subcategories as $item)
						<li class="list-group">
			            	  <a  href="">{{ $item->name }}</a>
			            </li>
						@endforeach

			          </ul>
	        </li>
	        @endforeach
		</ul>


          </div>
