<!DOCTYPE html>
<html lang="en">
      @include('layouts.head')
<body>

      @include('layouts.header')    

            @include('layouts.navigation')

                  @yield('content')

      @include('layouts.footer')
      @include('layouts.scripts')
      
</body>
</html>