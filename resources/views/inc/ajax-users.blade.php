@forelse ($users as $user)
  @include('inc.user')
@empty

@endforelse
<div class="mt-3">
  {{ $users->onEachSide(4)->links() }}
</div>
