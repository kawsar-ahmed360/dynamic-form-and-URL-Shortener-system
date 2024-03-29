<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Form</title>
</head>
<body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500&display=swap');

* {
  box-sizing: border-box;
  font-family: 'Quicksand', sans-serif;
}

html,
body {
  margin: 0;
}

.full-screen-container {
  background-image: url('https://images.unsplash.com/photo-1573496782646-e8d943a4bdd1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1650&q=80');
  height: 100vh;
  width: 100vw;
  background-size: cover;
  background-position: center;
  display: flex;
  align-items: center;
  justify-content: center;
}

.login-container {
  background-color: hsla(201, 100%, 6%, 0.6);
  padding: 50px 30px;
  min-width: 400px;
  width: 50%;
  max-width: 600px;
}

.login-title {
  color: #fff;
  text-align: center;
  margin: 0;
  margin-bottom: 40px;
  font-size: 2.5em;
  font-weight: normal;
}

.input-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

.input-group label {
  color: #fff;
  font-weight: lighter;
  font-size: 1.5em;
  margin-bottom: 7px;
}

.input-group input {
  font-size: 1.5em;
  padding: 0.1em 0.25em;
  background-color: hsla(201, 100%, 91%, 0.3);
  border: 1px solid hsl(201, 100%, 6%);
  outline: none;
  border-radius: 5px;
  color: #fff;
  font-weight: lighter;
}

.input-group input:focus {
  border: 1px solid hsl(201, 100%, 50%);
}

.login-button {
  padding: 10px 30px;
  width: 100%;
  border-radius: 5px;
  background: hsla(201, 100%, 50%, 0.1);
  border: 1px solid hsl(201, 100%, 50%);
  outline: none;
  font-size: 1.5em;
  color: #fff;
  font-weight: lighter;
  margin-top: 20px;
  cursor: pointer;
}

.login-button:hover {
  background-color: hsla(201, 100%, 50%, 0.3);
}

.login-button:focus {
  background-color: hsla(201, 100%, 50%, 0.5);
}

</style>

<body>
    <div class="full-screen-container">
      <div class="login-container">
        <h3 class="login-title">User Login</h3>
        <form method="POST" action="{{route('login')}}">
        @csrf
          <div class="input-group">
            <label>Email</label>
            <input type="email"class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
            @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        
        </div>
          <div class="input-group">
            <label>Password</label>
            <input type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
          </div>
          <button type="submit" class="login-button">Sign In</button>
        </form>
      </div>
    </div>
  </body>
    
</body>
</html>



