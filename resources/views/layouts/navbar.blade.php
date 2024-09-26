<nav class="navbar navbar-expand-lg bg-body-tertiary py-4">
  @auth
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Kafe Sistemi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Ana Sayfa</a>
          </li>
           <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('cafe.categories',['first_name' => Auth::user()->cafe_slug])}}">Kategoriler</a>
          </li>
           <li class="nav-item">
              <a class="nav-link" href="{{ route('profile') }}">Profilim</a>
          </li>
        </ul>
          <form action="{{ route('logout') }}" method="POST" class="ms-auto" style="display: inline;">
            @csrf
            <button type="submit" class="auth-button">Çıkış Yap</button>
        </form>
      </div>
    </div>
  @endauth

  @guest
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Kafe Sistemi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Ana Sayfa</a>
          </li>
        </ul>
        <div class="ms-auto">
            <form action="{{ route('register') }}" method="GET" style="display: inline;">
              @csrf
              <button class="auth-button" type="submit">Kayıt Ol</button>
            </form>
            <form action="{{ route('login') }}" method="GET" style="display: inline;">
              @csrf
              <button  class="auth-button" type="submit">Giriş Yap</button>
            </form>
        </div>
      </div>
    </div>
  @endguest
</nav>