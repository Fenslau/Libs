<div class="mb-5 p-2 m-0 alert alert-light shadow-lg text-center">
  <div class="container">
    <div class="row">
      <div class="col">
        @auth
          <div class="d-flex justify-content-around">
            <a class="btn btn-light shadow-none" id="search"><i class="fas fa-search"></i> {{ __('Поиск') }}</a>
            <a class="btn btn-light shadow-none" data-toggle="modal" data-target="#my_search" ><i class="fas fa-filter"></i> {{ __('Фильтры') }}</a>
            <a class="btn btn-light shadow-none" href="#"><i class="fas fa-envelope"></i> {{ __('Диалоги') }}</a>
          </div>
          <script>
          $(document).ready(function () {
            $(document).on('click', '#search', function (e) {
                e.preventDefault();
                axios.get("{{ route('home') }}", {
                })
                .then(function (response) {
                  $('#users').html(response.data.html);
                  window.location = "#users";
                })
                .catch(function (error) {
                  $('.toast-header').addClass('bg-danger');
                  $('.toast-header').removeClass('bg-success');
                  $('.toast-body').html('Что-то пошло не так. Попробуйте ещё раз или сообщите нам');
                  $('.toast').toast('show');
                });
            });
          });
          </script>
        @else
          <div class="">
            <a class="btn btn-success shadow-none" id="get_login" href="{{ route('get-login') }}" data-toggle="tooltip" title="{{ __('Автоматически, без регистрации и смс') }}">{{ __('Начать в один клик') }}</a>
            <button class="btn btn-primary shadow-none" data-toggle="popover-login">{{ __('У меня есть логин') }}</button>
              <script>
              $(document).ready(function () {
                  $(function () {
                      $('[data-toggle="popover-login"]').popover({
                      container: 'body',
                      html: true,
                      placement: 'top',
                      sanitize: false,
                      title: `{{ __('Залогиниться') }}:`,
                      content:
                      `<form action="/login" method="post">
                        @csrf
                        <div class="form-group">
                          <input class="form-control form-control-sm border" type="text" name="login" placeholder="Логин">
                        </div>
                        <div class="form-group">
                          <input class="form-control form-control-sm border" type="password" name="password" placeholder="Пароль">
                        </div>
                          <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-sign-in"></i> Войти</button>
                          <a href="#">Забыл пароль</a>
                      </form>`
                      })
                  });
              });
              </script>
          </div>

        @endauth
      </div>
    </div>
  </div>
</div>
