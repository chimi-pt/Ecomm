<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li class=""><a href="myorders">Orders</a></li>
      
      </ul>
      <form action="/search"  class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" name="query" class="form-control search-box" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/cartlist"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart<span id="cart-count" class="text-warning bg-light" style="text-align:center;padding: 0rem 0.9rem 0.1rem 0.9rem !important;border-radius: 3rem !important;"> {{$total}} </span></a></li>
       
        @if (Session::has('user'))
            
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('user')['name']}}
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="/logout">Log Out</a></li>
              
            </ul>
          </li>
          @else
          <li><a href="/login">Login</a></li>
          <li><a href="/register">Register</a></li>

          @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>













<div class="carousel-inner">
          @foreach ($products as $item)
        <div class="item {{$item['id']==1?'active':''}}">
        <a href="detail/{{$item['id']}}">
              <img class="slider-img" src="{{$item['gallery']}}">
            <div class="carousel-caption slider-text">
              <h3>{{$item['name']}}</h3>
              <p>{{$item['description']}}</p>
            </div>
            </a>
          </div>
    
          @endforeach
        </div>