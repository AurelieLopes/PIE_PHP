<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Inscription</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css">
  <script src="main.js"></script>
</head>

<body>
  <form name="inscription" method="post" action="/login">
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input name="mail" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input name="pass" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>

</html>