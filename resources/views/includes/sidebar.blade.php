          <h1 class="my-4">Scooteri Shop</h1>

		@guest
          <form class="border border-secondary rounded p-3" method="POST" action="{{ route('home') }}">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			  </div>
			  <button type="submit" class="btn btn-primary">Login</button>

			  <a class="float-right mt-2" href="{{ route('register') }}">Register</a>

			   <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                <span class="oi oi-cart"></span>
		  </form>
		@endauth

		@auth
			<p>Dobrodosli</p>


                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

		@endauth


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
