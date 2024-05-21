<header>

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a href="{{ route('home') }}" target="_blank" class="navbar-brand"><i class="fa-solid fa-house"></i> Vai al tuo sito</a>
          <div class="d-flex align-items-center ">
            <p class="pt-3 me-3"><i class="fa-solid fa-user-tie"></i> {{ Auth::user()->name }}</p>
            <form action="{{ route('logout') }}" method="POST" >
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
          </div>
        </div>
      </nav>


</header>


