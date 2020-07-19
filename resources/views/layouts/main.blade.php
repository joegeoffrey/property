<!DOCTYPE html>
<html lang="en">
  <head>
    @include('partials._head')
  </head>
  
  <body>
    <div id="wrapper">
      <div class="container">
        @include('partials._messages')

        @yield('content')

        @include('partials._footer')

      </div> <!-- end of .container -->
    </div> 

    @include('partials._javascript')

    @yield('scripts')

  </body>
</html>
