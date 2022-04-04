<form class="" name="my_search" action="{{ route('my_search') }}" method="post">
@csrf
<div class="modal fade" id="my_search" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Настройки поиска</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="find_city">Город: </label>
          <input name="find_city" class="form-control form-control-sm" id="find_city" value="{{ old('find_city', auth()->user()->find_city) }}">
        </div>

        <div class="form-group">
          <label for="find_age_from">Возраст от: </label>
          <input name="find_age_from" class="form-control form-control-sm" id="find_age_from" type="number" min="16" name="120" value="{{ old('find_age_from', auth()->user()->find_age_from) }}">
        </div>

        <div class="form-group">
          <label for="find_age_to">Возраст до: </label>
          <input name="find_age_to" class="form-control form-control-sm" id="find_age_to" type="number" min="16" name="120" value="{{ old('find_age_to', auth()->user()->find_age_to) }}">
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
