<html lang="en">

<head>
    <?php include "head.php"?>
</head>

<body id="body" class="b-element">
    <!-- Preloader -->
    <div id="preloader" class="smooth-loader-wrapper">
        <div class="smooth-loader">
            <div class="loader1">
                <div class="loader-target">
                    <div class="loader-target-main"></div>
                    <div class="loader-target-inner"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include "nav.php";?>
    <div class="main-wrapper">
        <section class="">
            <div class="bg-image-holder bredcrumb bg-primary">
                <!-- style="background-image: url('img/promo-1.jpg');" -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h2>Gallery </h2>
                            <hr class="hr_narrow  hr_color">
                        </div>
                    </div>
                </div>
                <!-- container ends -->
            </div>
        </section>
        <section class="bg-sand hero-block home-about">
            <div class="container">
                <div class="row">
                    <div class="col-md-12" style="color: black">
                      <ul class="nav justify-content-center">
                        <li class="nav-item">
                          <a onclick="openGallery(event, 'night')" class="nav-link active" href="#">Night League</a>
                        </li>
                        <li class="nav-item">
                          <a onclick="openGallery(event, 'youth')" class="nav-link" href="#">Youth League</a>
                        </li>
                      </ul>
                    </div>
                </div>
              <div id="night" class="tabcontent">
                <div class="row">
                  <?
                    foreach(glob("img/gallery/night/*") as $image){
                      echo '
                      <div class="col-md-3">
                        <img src="'.$image.'" class="rounded" style="margin-bottom: 10px;" width="250px">
                      </div>
                      ';
                    }
                  ?>
              </div>
            </div>
            <div id="youth" class="tabcontent">
              <div class="row">
                <?
                  foreach(glob("img/gallery/youth/*") as $image){
                    echo '
                    <div class="col-md-3">
                      <img src="'.$image.'" class="rounded" style="margin-bottom: 10px;" width="250px">
                    </div>
                    ';
                  }
                ?>
            </div>
          </div>
          <a href="http://cpanel.anklebreaker.ca/cpsess6218831714/frontend/paper_lantern/filemanager/index.html" target="_blank">Edit Images</div>
        </div>
        </section>

        <!-- FOOTER -->
        <?php include "foot-nav.php";?>

    </div>


    <!-- JAVASCRIPTS -->
    <script>
        function openGallery(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
    <style>
      .tabcontent {
          display: none;
          padding: 6px 12px;
          border-top: none;
      }
      .table-index {
        background: lightgray
      }
    </style>
    <?php include "js-compile.php";?>

</body>

</html>
