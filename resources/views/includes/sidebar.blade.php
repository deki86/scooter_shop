          <h1 class="my-4">Scooteri Shop</h1>




			<!-- User account -->
			<ul class="list-group d-block mt-3">

				<li class="list-group-item pl-0" data-toggle="tooltip" data-placement="right" title="user">
		          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseuser" data-parent="#exampleuser">

		            <span class="nav-link-text"><i class="fa fa-user-o fa-2x float-left" aria-hidden="true"></i> <h4 class="pl-5 pt-1">  User account</h4></span>
		          </a>

					  <ul class="sidenav-second-level collapse" id="collapseuser">
						@guest
						<li class="list-group">
			            	  <a  href="{{ route('login') }}">Login</a>
			            </li>
			            <li class="list-group">
			            	 <a href="{{ route('register') }}">Register</a>
			            </li>
			            @endauth
			            @auth
							<li class="list-group"><a href="{{ route('users.show', Auth::user()->id) }}">User profile</a></li>



			            	<li class="list-group">
							 <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                             </li>
			            @endauth


			          </ul>

			</ul>


			<!-- Shopping cart -->
			<ul class="list-group d-block mt-3">

				<li class="list-group-item pl-0" data-toggle="tooltip" data-placement="right" title="cart">
		          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsecart" data-parent="#examplecart">

		            <span class="nav-link-text"><i class="fa fa-shopping-cart fa-2x float-left" aria-hidden="true"></i> <h4 class="pl-5"> Cart <span class="badge badge-primary">{{ Session::has('cart') ? Session::get('cart')->quantityTotal : '' }}</span></h4>

		            </span>
		          </a>

					  <ul class="sidenav-second-level collapse" id="collapsecart">

						<li class="list-group">
			            	  <a  href="{{ route('parts.getCart') }}">View Shopping Cart</a>
			            </li>


			          </ul>

			</ul>






          <div class="list-group mt-3 mb-3">



		<!-- Category and subcategories -->
		<ul class="list-group">
			@foreach($sub as $cat)
			 <li class="list-group-item" data-toggle="tooltip" data-placement="right" title="{{ $cat->name }}">
		          <span class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapse{{$cat->name}}" data-parent="#example{{$cat->name}}">

		            <a href="{{ route('categories.parts.index', ['category' => $cat->id]) }}" class="nav-link-text">{{ $cat->name }}</a>
		          </span>

			          <ul class="sidenav-second-level collapse" id="collapse{{$cat->name}}">
						@foreach($cat->subcategories as $item)
						<li class="list-group">
			            	  <a  href="{{ route('subcategories.parts.index', ['subcategory'=> $item->id ]) }}">{{ $item->name }}</a>
			            </li>
						@endforeach

			          </ul>
	        </li>
	        @endforeach
		</ul>


          </div>
