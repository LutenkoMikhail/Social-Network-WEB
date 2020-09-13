<div class="text-center mb-2">
  <h3>First time on {{ config('app.name') }}?</h3>
  <h6 class="text-secondary">Instant registration</h6>
</div>

<form method="POST" action="{{ route('auth.signup.post') }}"
      class="needs-validation mb-4" novalidate>
  @csrf

  <div class="form-group">
    <input type="email"
           name="email"
           class="form-control @error('email') is-invalid @enderror"
           placeholder="Email"
           value="{{ old('email')?:'' }}"
           autofocus>

    @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <input type="text"
           name="username"
           class="form-control @error('username') is-invalid @enderror"
           placeholder="Login"
           value="{{ old('username') ?:''}}">

    @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <input type="password"
           name="password"
           class="form-control @error('password') is-invalid @enderror"
           placeholder="Password">

    @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <div class="row col-md-7">
      <select name="gender"
              class="custom-select @error('gender') is-invalid @enderror">
        <option value="">What's your gender</option>
        <option value="m" {{ old('gender') === 'm' ? 'selected' : '' }}>Man</option>
        <option value="f" {{ old('gender') === 'f' ? 'selected' : '' }}>Woman</option>
      </select>
    </div>
  </div>

  <button type="submit" class="btn btn-primary btn-block">Register</button>
</form>
