<form action="/auth/login" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="text" name="username" value="">
  <input type="password" name="password">
  <input type="submit" name="submit">
</form>
