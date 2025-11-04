<html>
  <head>
   <!-- Registration Message -->
   {if $message_type == 1 }
      <title>Registration Complete</title>
      <meta http-equiv="refresh" content="20; url=index.php" />
   {/if}

   <!-- Logout Message -->
   {if $message_type == 2 }
      <title>Goodbye page</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   {/if}

   <!-- Blog Messages -->
   {if $message_type == 3 }
      <title>SUCCESS: New Post Submitted. Redirecting to main page...</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   {/if}
   {if $message_type == 4 }
      <title>ERROR: Login first. Redirecting to main page...</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   {/if}
   {if $message_type == 5 }
      <title>SUCCESS: Post Updated. Redirecting to main page...</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   {/if}
   {if $message_type == 6 }
      <title>ERROR: Not Allowed. Redirecting to main page...</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   {/if}
   {if $message_type == 0 }
      <title>ERROR: Can't connect to Database. Try again later. <br> Redirecting to main page...</title>       
      <meta http-equiv="refresh" content="10; url=index.php" />
   {/if}
   {if $message_type == 9 }
      <title>ERROR: Password change successful</title>       
      <meta http-equiv="refresh" content="10; url=login.php" />
   {/if}
  </head>
  <body>
   {$message}
  </body>
</html>