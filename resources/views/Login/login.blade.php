<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SignIn&SignUp</title>
  <link rel="stylesheet" type="text/css" href="./style.css" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form action='{{route("loginPost")}}' method="POST" class="sign-in-form">
          @csrf
          <h2 class="title">Sign In</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="email" placeholder="Username" name="email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" />
          </div>
          <input type="submit" value="Login" class="btn solid" />
        </form>

      </div>
    </div>
    <div class="panels-container">

      <div class="panel left-panel">
        <div class="content">
          <h3>Nomad Partners</h3>
          <p>Welcome to the Nomad Partners admin panel. Sign in to manage platform features, edit content, and oversee operations. For assistance, reach out to our support team.</p>
        </div>
        <img src="./img/log.svg" class="image" alt="">
      </div>

      <div class="panel right-panel">
        <div class="content">
          <h3>One of us?</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio minus natus est.</p>
          <button class="btn transparent" id="sign-in-btn">Sign In</button>
        </div>
        <img src="./img/register.svg" class="image" alt="">
      </div>
    </div>
  </div>

  <script src="./app.js"></script>
</body>

</html>