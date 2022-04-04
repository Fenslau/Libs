<div id="#{{ $user->id }}" class="position-relative d-flex align-items-center justify-content-between border-bottom px-3 py-2 user-string
@auth @if($user->id == auth()->user()->id) alert alert-success m-0  @endif @endauth
">
  <div class="">
    <span class="text-dark">{{ $user->name }}</span>
    <span class="text-danger">{{ $user->user_age }}</span>
    <span class="text-primary">{{ $user->city }}</span>
    <a class="stretched-link" href="#"></a>
  </div>

  <div class="">
    @empty($user->online) @else <span class="badge badge-pill badge-success">online</span> @endempty
  </div>
</div>
