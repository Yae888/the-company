<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

    <div class="border rounded-2 my-5 mx-auto w-25 p-3">
        <h1 class="display text-uppercase text-center">Login</h1>

        <form action="../actions/login.php" method="post">
            <input type="text" name="username" id="username" class="form-control" placeholder="USERNAME">

            <input type="password" name="password" id="password" class="form-control mt-2" placeholder="PASSWORD">

            <input type="submit" value="Log in"name="login"  class="btn btn-primary w-100 my-4">

            <div class="text-center">
                <a href="register.php" class="text-decoration-none text-center">Create account</a>
            </div>
        </form>
    </div>

</body>
</html>