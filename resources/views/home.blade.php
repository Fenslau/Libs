@extends('layouts.app')

@section('title-block', 'Анонимные гей-знакомства')
@section('description-block', '')

@section('content')

<div class="container">
  <div class="row">
    <div class="col">
        <div class="">
          @include('inc.toast')
          <h2>Test</h2>
          <div id="users">
            @include('inc.ajax-users')
          </div>
        </div>
    </div>
  </div>
</div>

@endsection
