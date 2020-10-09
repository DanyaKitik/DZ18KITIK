<form method="POST" action="{{route('login')}}">
    @csrf
    @guest
        <h2>To log in as admin</h2>
        <h4>login: admin</h4>
        <h4>without password</h4>
    @endguest
    <div class="form-group">
        @error('email')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <label for="email">Email</label>
        <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Email</small>
    </div>
    <div class="form-group">
        @error('password')
        <div class="alert alert-danger" role="alert">
            {{$message}}
        </div>
        @enderror
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password ">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" name="remember" class="form-check-input" id="remember">
        <label class="form-check-label" for="remember">Remember me</label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
