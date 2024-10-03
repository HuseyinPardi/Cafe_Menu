<nav class="navbar navbar-expand-lg custom-navbar py-4">
  @auth
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}">Kafe Sistemi</a>
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
            <button type="submit" class="auth-btn">Çıkış Yap</button>
        </form>
      </div>
    </div>
  @endauth

  @guest
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}">Kafe Sistemi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Ana Sayfa</a>
          </li>
        </ul>
        <div class="auth-buttons">
            <a href="{{ route('register') }}" class="auth-btn">Kayıt Ol</a>
            <a href="{{ route('login') }}" class="auth-btn">Giriş Yap</a>
        </div>
      </div>
    </div>
  @endguest
</nav>