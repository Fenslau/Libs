<form class="" name="my_profile" action="{{ route('my_profile') }}" method="post">
@csrf
<div class="modal fade" id="my_profile" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Моя анкета</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="my_id" class="col-form-label">Мой id: </label>
          <input readonly name="id" type="text" class="form-control form-control-sm col" id="my_id" value="{{ auth()->user()->id }}">
        </div>
        <div class="form-group">
          <label for="my_login" class="col-form-label">Мой логин: </label>
          <input name="login" type="text" class="form-control form-control-sm col" id="my_login" value="{{ auth()->user()->login }}">
          <small class="form-text text-muted">Вы можете его поменять на более удобный</small>
        </div>

        <div class="form-group">
          <label for="my_name">Имя: </label>
          <input name="name" type="text" class="form-control form-control-sm" id="my_name" value="{{ old('name', auth()->user()->name) }}">
        </div>

        <div class="form-group">
          <label for="my_city">Город: </label>
          <input name="city" type="text" class="form-control form-control-sm" id="my_city" value="{{ old('city', auth()->user()->city) }}">
        </div>

        <div class="form-group">
          <label for="my_age">Возраст: </label>
          <input name="user_age" class="form-control form-control-sm" id="my_age" type="number" min="16" name="120" value="{{ old('user_age', auth()->user()->user_age) }}">
        </div>

        <div class="form-group">
          <label for="my_height">Рост: </label>
          <input name="user_height" class="form-control form-control-sm" id="my_height" type="number" min="100" name="250" value="{{ old('user_height', auth()->user()->user_height) }}">
        </div>
        <div class="form-group">
          <label for="my_weight">Вес:</label>
          <input name="user_weight" class="form-control form-control-sm" id="my_weight" type="number" min="30" name="300" value="{{ old('user_weight', auth()->user()->user_weight) }}">
          <small class="form-text text-muted">Укажите, если хотите</small>
        </div>


      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
      </div>
    </div>
  </div>
  </form>
