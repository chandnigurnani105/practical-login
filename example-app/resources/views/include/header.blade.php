<nav class="navbar bg-body-tertiary">
  <form class="container-fluid justify-content-start">
    @guest
    <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href = '{{route('registration')}}'">Registration</button>
    @endguest
    

    @auth
    <button class="btn btn-outline-success me-2" type="button" onclick="window.location.href = '{{route('logout')}}'">Logout</button>

    @else   
    <button class="btn btn-sm btn-outline-secondary" type="button" onclick="window.location.href = '{{route('login')}}'">Login</button>
    

    @endauth
  </form>
</nav>