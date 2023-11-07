<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="./assets/img/h1.png" />
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- =====BOX ICONS===== -->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <!--===== SCROLL REVEAL =====-->
  <script src="https://unpkg.com/scrollreveal"></script>
  <title>Bayu Lobi</title>
</head>

<body>
  <!--===== HEADER =====-->
  <header class="l-header">
    <nav class="nav bd-grid">
      <div>
        <!-- &#60;&#62; -->
        <a href="#home" class="nav-logo">MyBioWeb</a>
      </div>

      <div class="nav-menu" id="nav-menu">
        <ul class="nav-list">
          <li class="nav-item">
            <a href="#home" class="nav-link home active">Home</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link about">Tentangku</a>
          </li>
          <li class="nav-item">
            <a href="#skills" class="nav-link skills">Biodata</a>
          </li>
          <li class="nav-item">
            <a href="#projects" class="nav-link projects">Tugas</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link contact">Kontaku</a>
          </li>
          <li class="nav-item">
          <a href = "#" onclick="myFunction()"> <img src="images/sumoon.png" alt="" height="20px" width="20px" style="background-color: transparent;"> </a>
          </li>
        </ul>
      </div>

      <div class="nav-toggle" id="nav-toggle">
        <i class="bx bx-menu"></i>
      </div>
    </nav>
  </header>

  <main class="l-main">
    <!--===== HOME =====-->
    <section class="home bd-grid section" id="home">
      <div class="home-data">
        <h2 class="home-title">
          Hi 👋,<br />I'am <span class="home-title-color">Bayu Lobi</span><br />
         <span id="jobTitle" ></span> 
        </h2>

      </div>

      <div class="home-social">
        
      </div>

      <div class="home-img">
        <img src="images/bayu.jpg" alt="" style="border-radius: 100%;width: 500px; height: 500px;border: 10px solid rgb(37, 52, 191);"/>
      </div>
    </section>

    <!--===== ABOUT =====-->
    <section class="about section" id="about">
      <h2 class="section-title">Tentangku</h2>

      <div class="about-container bd-grid">
        <div class="about-img">
          <img src="assets/img/profile_1.jpeg" alt="" />
        </div>

        <div style="text-align: center">
          <h2 class="about-subtitle">Perkenalkan Nama Saya Komang Bayu Lobi Hartawan</h2>
          <p class="about-text">
            Saya adalah seorang mahasiswa dari Universitas Udayana, Fakultas Teknik, Prodi Teknologi Informasi. Sekarang saya masih di semester 3, tapi belum 
            tau apa-apa sama sekali. kalau gabut biasanya sore-sore saya pergi ke pantai muaya untuk menenangkan diri.
          </p>
          <br />
          
          <p>
            Itu Tentang Saya Terimakasih
            <i class="" id="copy"></i>
          </p>
        </div>
      </div>
    </section>

    <!--===== SKILLS =====-->
    <section class="skills section" id="skills">
      <h2 class="section-title">Biodata</h2>

      <div class="skills-container bd-grid">
        <div>
          <!-- <h2 class="skills-subtitle">Front-end Skills</h2> -->
          <div class="skills-data">
            <div class="skills-names">
              <i class=""></i>
              <span class="skills-name">Nama: Komang Bayu Lobi Hartawan</span>
            </div>
            <!-- <div class="skills-bar skills-html"></div> 
             <div>
                <span class="skills-percentage">75%</span>
              </div>  -->
          </div>
          <div class="skills-data">
            <div class="skills-names">
              <i class=""></i>
              <span class="skills-name">Nim: 2205551025</span>
            </div>
             <!-- <div class="skills-bar skills-css"></div>  -->
            <!-- <div>
                <span class="skills-percentage">70%</span>
              </div>  -->
          </div>
          <div class="skills-data">
            <div class="skills-names">
              <i class=""></i>
              <span class="skills-name">Program Studi: Teknologi Informasi</span>
            </div>
            <!-- <div class="skills-bar skills-css"></div>  -->
            <div>
                <!-- <span class="skills-percentage">70%</span> -->
              </div> 

          </div>
          <div class="skills-data">
            <div class="skills-names">
              <i class=""></i>
              <span class="skills-name">Fakultas: Teknik</span>
            </div>
            <!-- <div class="skills-bar skills-react"></div> -->
            <div>
                <!-- <span class="skills-percentage">50%</span> -->
              </div>
          </div>
          <div class="skills-data">
            <div class="skills-names">
              <i class=""></i>
              <span class="skills-name">Universitas: Udayana</span>
            </div>
            <!-- <div class="skills-bar skills-redux"></div>  -->
            <!-- <div class="skills-bar skills-css"></div>  -->
            <div>
                <!-- <span class="skills-percentage">50%</span> -->
              </div> 

          </div>

          <div class="skills-data">
            <div class="skills-names">
              <img class="" alt="" />
              <span class="skills-name">Tanggal Lahir: 22-Januari-2004</span>
            </div>
          </div>
        </div>
        <div>
          <!-- <h2 class="skills-subtitle">Back-end Skills</h2> -->
          <div class="skills-data">
            <div class="skills-names">
              <img class="" alt="" />
              <span class="skills-name">Jenis Kelamin: Laki-Laki</span>
            </div>
            <!-- <div class="skills-bar skills-css"></div>  -->
            <div>
                <!-- <span class="skills-percentage">70%</span> -->
              </div> 
          </div>

          <div class="skills-data">
            <div class="skills-names">
              <i class=""></i>
              <span class="skills-name">NoWA: 081339707430</span>
            </div>
            <!-- <div class="skills-bar skills-css"></div> -->
            <div>
                <!-- <span class="skills-percentage">70%</span> -->
              </div> 
          </div>

          <div class="skills-data">
            <div class="skills-names">
              <img class="" alt="" />
              <span class="skills-name">Agama: Hindu</span>
            </div>
            <!-- <div class="skills-bar skills-css"></div>  -->
            <div>
                <!-- <span class="skills-percentage">70%</span> -->
              </div> 
          </div>
          <div>
             <!-- <h2 class="skills-subtitle">TOOLS</h2> --> 
             <div class="skills-data">
              <div class="skills-names">
                <img class="" alt="" />
                <span class="skills-name">Semester: 3</span>
              </div>
            </div>
            <div class="skills-data">
              <div class="skills-names">
                <img class="" alt="" />
                <span class="skills-name">Hobby: Musik</span>
              </div>

            </div>
            <div class="skills-data">
              <div class="skills-names">
                <img class="" alt="" />
                <span class="skills-name">Motto: Be Your Self and Never Surrender</span>
              </div>

            </div> 

          </div>
        </div>
    </section>

    <!--===== Projects =====-->
    <section class="projects section" id="projects">
      <h2 class="section-title">Tugas Prognet</h2>

      <div class="project-container">
        <div class="project-img">
          <img />
          <p class="project-title">Tugas 1</p>
          <div class="">
            <a href="" target="_blank" class="small-btn button">

              <i class="bx">Klik</i>
            </a>
            <!-- <a href="https://medium.com/@hgauba4/how-did-our-team-build-the-mednear-clone-241227129f79" target="_blank"
              class="small-btn button">
              Blog
              <i class="bx bx-blog"></i> -->
            </a>
          </div>
        </div>

        <div class="project-img">
          <img />
          <p class="project-title">Tugas CRUD Pada Laravel</p>
          <div class="">
            <a href="{{url('mahasiswa')}}" target="_blank" class="small-btn button">

              <i class="bx">Klik</i>
            </a>
            <!-- <a href="https://medium.com/@hgauba4/how-did-our-team-build-the-mednear-clone-241227129f79" target="_blank"
              class="small-btn button">
              Blog
              <i class="bx bx-blog"></i> -->
            </a>
          </div>
        </div>


        <div class="project-img">
          <img />
          <p class="project-title">Coming Soon</p>
          <div class="project-btns">
            <a href="" target="_blank" class="small-btn button">

              <i class="bx"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!--===== FOOTER + CONTACT=====-->
  
  <footer class="footer section" id="contact">
    <h2 class="section-title">My Social Media</h2>
    <p class="footer-title">Bayu Version</p>
    <div class="footer-social">
      <a href="https://instagram.com/komang.bayu.399?igshid=YTQwZjQ0NmI0OA==" target="_blank" class="footer-icon"><i class="bx bxl-instagram">
          <br />
          Instagram</i></a>
      <a href="mailto:hartawank3@gmail.com" target="_blank" class="footer-icon"><i class="bx bx-mail-send">
          <br />
          E-mail</i></a>
      <a href="tel:+62 081339707430" target="_blank" class="footer-icon"><i class="bx bx-phone">
          <br />
          Phone</i></a>
      <a href="https://github.com/greenday-wer" target="_blank" class="footer-icon"><i
            class="bx bxl-github">
          <br />
          GitHub
          </i></a>
    </div>
  </footer>

  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
</body>

</html>