<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/template.css">
  </head>
  <body id="blog-body">
    <div id="blog-particles-js"></div>
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
                {if isset($user_data.username) && $user_data.username != ""} 
                  <a class="nav-link">Welcome, {$user_data.username}!</a>
                {else} 
                  <a class="nav-link">Welcome!</a>
                {/if}
              </li>
            </ul>
            <ul class="navbar-nav mb-auto mb-2 mb-lg-0">
              <li class="nav-item-padding"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item-padding"><a class="nav-link" href="./blog.php">Post Blog</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container mt-5">
        <div class="card shadow-lg p-4 glassmorphism-card-blog">
          <div class="card-body">
            <form method="post" action="{$action}">
              <h3 class="text-center mb-5 text-success">Create/change a post</h3>

              <input type="hidden" name="micropost_id" value="{$micropost_id|default:''}">

              <!-- Blog Content -->
              <div class="mb-4">
                <label for="blog_content">Blog Content</label>
                <textarea class="form-control" id="blog_content" name="blog_content" rows="5" placeholder="Write your post here">{$blog|default:''}</textarea>
              </div>

              <!-- Buttons -->
              <div class="text-center">
                <button type="submit" name="submit_blog" class="btn btn-success">Go</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-6k+gYmM9mD8l7hYYh0pm60mcptTtqLVG6A9lMl60b6gXfh4yP5JHTJxlzFmjOks2" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
      particlesJS("blog-particles-js", {
        "particles": {
          "number": {
            "value": 150,
            "density": { "enable": true, "value_area": 700 }
          },
          "color": { "value": "#f2f2f2" },
          "shape": {
            "type": "circle",
            "stroke": { "width": 0, "color": "#000000" },
          },
          "opacity": { "value": 0.5},
          "size": { "value": 6, "random": true },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.5,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 7,
            "direction": "none",
            "out_mode": "out"
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": { "enable": true, "mode": "bubble" },
            "resize": true
          },
          "modes": {
            "bubble": {
              "distance": 175,
              "size": 50,
              "duration": 1,
              "opacity": 0.5,
              "speed": 3
            },
            "push": { "particles_nb": 4 }
          }
        },
        "retina_detect": false
      });
    </script>
  </body>
</html>
