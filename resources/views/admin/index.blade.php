<style>
body {
  background-color: aqua;
  margin: 0px;
  font-family: "Ubuntu", sans-serif;
  background-size: 100% 110%;
}
h1,
h2,
h3,
h4,
h5,
h6,
a {
  margin: 0;
  padding: 0;
}
.login {
  margin: 0 auto;
  max-width: 500px;
}
.login-header {
  color: black;
  font-size: 160%;
}

.go-admin {
  color: #fff;
  text-align: center;
  font-size: 120%;
}
/* .login-header h1 {
     text-shadow: 0px 5px 15px #000; */

.login-form {
  border: 0.5px solid #fff;
  background: #4facff;
  border-radius: 10px;
  box-shadow: 0px 0px 10px #000;
}
.login-form h3 {
  text-align: left;
  margin-left: 40px;
  color: #fff;
}
.login-form {
  box-sizing: border-box;
  padding-top: 15px;
  padding-bottom: 10%;
  margin: 5% auto;
  text-align: center;
}
.login input[type="text"],
.login input[type="password"] {
  max-width: 400px;
  width: 80%;
  line-height: 3em;
  font-family: "Ubuntu", sans-serif;
  margin: 1em 2em;
  border-radius: 5px;
  border: 2px solid #f2f2f2;
  outline: none;
  padding-left: 10px;
}
.login-form input[type="button"] {
  height: 30px;
  width: 100px;
  background: #fff;
  border: 1px solid #f2f2f2;
  border-radius: 20px;
  color: slategrey;
  text-transform: uppercase;
  font-family: "Ubuntu", sans-serif;
  cursor: pointer;
}

/*Media Querie*/
@media only screen and (min-width: 150px) and (max-width: 530px) {
  .login-form h3 {
    text-align: center;
    margin: 0;
  }

  .login-button {
    margin-bottom: 10px;
  }
}
</style>
<p></p>
<br><br><br><br><br><br>
<div class="login">
    <div class="login-header">
        <h3>Admin panel developed by laravel</h3>
    </div>
        <p class="go-admin">Go to admin panel</p>
    <div class="login-form">
        <a href="/login">
            <input type="button" value="Sign In" class="login-button" />
        </a>
        <br><br>
        <h4>Or</h4>
        <br>
        <a href="/register">
            <input type="button" value="Sign Up" class="login-button" />
        </a>
    </div>
</div>
</body>
</html>