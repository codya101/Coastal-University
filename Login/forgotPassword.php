<!DOCTYPE html>
  <html lang=en>

            <head>
              <meta charset=utf-8>
              <meta http-equiv=X-UA-Compatible content=IE=edge>
              <title>Forgot Password</title>
              <meta name=keywords content=>
              <meta name=description content=>
              <meta name=author content=>
              <link rel=shortcut icon href=# type=image/x-icon />
              <link rel=stylesheet href=css/bootstrap.min.css />
              <link rel=stylesheet href=css/style.css />
              <link rel=stylesheet href=css/responsive.css />
              <script src=js/siteRedirect.js></script>
              <script src=js/jquery.min.js></script>
              <script src=js/popper.min.js></script>
              <script src=js/bootstrap.min.js></script>
              <!-- ALL PLUGINS -->
              <script src=js/jquery.magnific-popup.min.js></script>
              <script src=js/jquery.pogo-slider.min.js></script>
              <script src=js/slider-index.js></script>
              <script src=js/smoothscroll.js></script>
              <script src=js/form-validator.min.js></script>
              <script src=js/contact-form-script.js></script>
              <script src=js/isotope.min.js></script>
              <script src=js/images-loded.min.js></script>
              <script src=js/custom.js></script>

 
            <body id=home data-spy=scroll data-target=#navbar-wd data-offset=98>

              <div id=preloader>
                  <div class=loader>
                      <img src=images/loader.gif alt=# />
                  </div>
              </div>
    
              <header class="top-header">
                <nav class="navbar header-nav navbar-expand-lg">
                  <div class="container-fluid">
                      <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="image"></a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                      <span></span>
                      <span></span>
                      <span></span>
                      </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                      <ul class="navbar-nav">
                          <li><a class="nav-link active" href="index.php">Home</a></li>
                          <li><a class="nav-link" href="calendar.php">Academic Calendar</a></li>
                          <li><a class="nav-link" href="departmentList.php">Departments</a></li>
                          <li><a class="nav-link" href="majors.php">Majors & Minors</a></li>
                          <li><a class="nav-link" href="masterSchedule.php">Master Schedule</a></li>
                          <li><a class="nav-link" href="login.php">Login</a></li>
                      </ul>
                    </div>
                  </div>
                </nav>
              </header>
              <br>
              <br>
              <br>
              <br>
              <center>
                  <h1><strong>Forgot Password</strong></h1>
                  <br>
                  <h2>Enter Email</h2>
                  <br>
                  <form method=POST action=resetPassword.php>
                      <input type=text name=email>
                      <input type=submit value=Confirm>
                  </form>
              </center>

            </body>
          </html>