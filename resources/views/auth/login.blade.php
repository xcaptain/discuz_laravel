@extends('layouts.basic')

@section('loginCss')
<link rel="stylesheet" href="{{ config('app.fe') }}/zeze/v/{{ env('cssversion', '1.0') }}/css/login-debug.css">
@endsection

@section('contents')
  <form action="{{ url('/auth/login/') }}" method="POST" target="_self">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="text" name="username" value="">
    <input type="password" name="password">
    <input type="submit" name="submit">
  </form>
@endsection
