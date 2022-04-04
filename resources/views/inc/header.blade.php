@auth @include('inc.modal-profile') @include('inc.modal-search') @endauth
<div class="p-2 alert alert-primary shadow">
  <div class="container">
    <div class="row">
      <div class="col d-flex align-items-center justify-content-between">
        @auth
          <div class="w-100 d-flex align-items-center justify-content-between">
            <a class="btn btn-sm btn-secondary shadow-none" href="{{ route('logout') }}"><i class="fa fa-sign-out fa-flip-horizontal"></i> Выйти</a>
            <a class="btn pr-2 alert-link text-decoration-none" data-toggle="modal" data-target="#my_profile">
              @if (empty(Auth::user()->user_ava))
                <i class="fa fa-user"></i>
              @else
              @endif
              {{ Auth::user()->name }} {{ Auth::user()->user_age }} {{ Auth::user()->city }}
            </a>
          </div>
          <script>

          </script>
        @else
          <div class="m-auto">
            {{ __('Нажмите на кнопку "Начать" внизу экрана и сразу сможете общаться!') }}
          </div>

        @endauth
        <div class="d-flex">
          <select style="background: #ffffff40" onchange="if (this.value) window.location.href = this.value">
            @foreach (Config::get('languages') as $lang => $language)
                <option {{ ($lang == App::getLocale() ? "selected":"") }} value="{{ route('switchLang', $lang) }}">{{ $lang }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>
</div>
