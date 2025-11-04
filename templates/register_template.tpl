<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/template.css">
  </head>
  <body id="register-body">
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient bg-opacity-75">
      <div class="container-fluid">
        <a class="navbar-brand">
          <img src="images/logo.png" alt="Logo" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              {if isset($username) && $username != ""}
                <a class="nav-link">Welcome, {$username}!</a>
              {elseif isset($user_data.username) && $user_data.username != ""}
                <a class="nav-link">Welcome, {$user_data.username}!</a>
              {else}
                <a class="nav-link">Welcome!</a>
              {/if}
            </li>
          </ul>

          <ul class="navbar-nav mb-auto mb-2 mb-lg-0" >
            <ul class="navbar-nav mb-auto mb-2 mb-lg-0">
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="./logout_action.php">Logout</a></li>
              <li class="nav-item"><a class="nav-link" href="./login.php">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
              <li class="nav-item"><a class="nav-link" href="./blog.php">Post blog</a></li>
            </ul>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="card shadow-lg p-4 glassmorphism-card">
      <div class="card-body">
        <form method="post" action="register_action.php">
          <a href="index.php" class="btn btn-outline-dark mb-3">
            <i class="bi bi-arrow-left"></i>
          </a>
          
          <h3 class="text-center mb-4 text-dark">Register</h3>

          <!-- Username -->
          <label for="username">Username</label>
          <input name="username" 
                value="{$username}"
                class="form-control" 
                type="text"
                maxlength="50"
                size="38"
                placeholder="Username" />
          {if isset($errors.username)}
            <small class="text-danger">{$errors.username}</small>
          {/if}
 

          <!-- Email -->
          <div class="mb-3">
              <label for="email">Email</label>
              <input type="text" 
                    value="{$email}"
                    class="form-control" 
                    id="email" name="email" 
                    placeholder="Enter email">
              {if isset($errors.email)}
                <small class="text-danger">{$errors.email}</small>
              {/if}
          </div>

          <!-- Password -->
          <div class="mb-3">
              <label for="password">Password</label>
              <input type="password" 
                    value="{$password}"
                    class="form-control" 
                    id="password" name="password" 
                    placeholder="Enter password">
              {if isset($errors.password)}
                <small class="text-danger">{$errors.password}</small>
              {/if}
          </div>

          <!-- Confirm Password -->
          <div class="mb-5">
              <label for="confirm-password">Confirm Password</label>
              <input type="password" 
                    class="form-control" 
                    id="confirm-password" name="confirm_password" 
                    placeholder="Confirm password" value="{$confirm_password}">
              {if isset($errors.confirm_password)}
                <small class="text-danger">{$errors.confirm_password}</small>
              {/if}
          </div>

          <button type="submit" name= "confirm" class="btn btn-dark w-100 btn-login" value="1">Create Account</button>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  </body>
</html>
