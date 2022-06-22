<!-- navbar.html -->
<nav class="navbar p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
    <a class="navbar-brand brand-logo-mini text-white" href="/">D</a>
  </div>
  <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
    <ul class="navbar-nav w-100">
      <li class="nav-item w-100">
        <form action="{{ url('search') }}" method="get" class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
          @csrf
          <input type="search" class="w-50 m-1 rounded" name="search" placeholder="Search for products">
          
        </form>
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li>
        <x-app-layout> </x-app-layout>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="mdi mdi-format-line-spacing"></span>
    </button>
  </div>
</nav>