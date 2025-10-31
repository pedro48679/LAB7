<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <form method="post" action="./password_action.php">
        <h3 class="mb-5" style="margin-top: 50px;">Change Password</h3>
        
        <!-- Email -->
        <div class="mb-4">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email" style="width: 500px;" value="{$email|default:''}">
          {if isset($errors_change.email)}
            <small class="text-danger">{$errors_change.email}</small>
          {/if}
        </div>

        <!-- New Password -->
        <div class="mb-4">
          <label for="new_password">New Password</label>
          <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New password" style="width: 500px;" value="{$new_password|default:''}">
          {if isset($errors_change.password)}
            <small class="text-danger">{$errors_change.password}</small>
          {/if}
        </div>

        <!-- Confirm New Password -->
        <div class="mb-4">
          <label for="confirm_new_password">Confirm New Password</label>
          <input type="password" class="form-control" id="confirm_newpassword" name="confirm_new_password" placeholder="Confirm new password" style="width: 500px;" value="{$confirm_new_password|default:''}">
          {if isset($errors_change.password)}
            <small class="text-danger">{$errors_change.password}</small>
          {/if}
        </div>

        <!-- Buttons -->
        <div style="padding-left: 100px;">
          <button type="submit" name="submit_password_change" class="btn btn-success">Change Password</button>     
          <a class="btn btn-danger" style="margin: 5px;" href="./login.php">Cancel</a>           
          <button type="reset" class="btn" style="background-color: #ff5733; color: white; margin-left: 10px;">Reset</button>
        </div>
      </form>
    </div>
  </body>
</html>
