@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
      <ul class="m-0">
        @foreach ($errors->all() as $formerror)
          <li>
            {{ $formerror }}
            <button type="button" class="close" data-dismiss="alert">
              <span>&times;</span>
            </button>
          </li>
        @endforeach
      </ul>
    </div>
@endif

@php ($sessions = [0 => 'success', 1 => 'error', 2 => 'warning', 3 => 'info'])
@foreach ($sessions as $session)
  @if (session($session))
      <div class="alert alert-{{ $session }} alert-dismissible">
        {!! (session($session)) !!}
        <button type="button" class="close" data-dismiss="alert">
          <span>&times;</span>
        </button>
      </div>
  @endif
@endforeach
