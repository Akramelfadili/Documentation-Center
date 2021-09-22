<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet"  href="{{ url('/css/style.css') }}" />
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

     <title>DRAO</title>
</head>
<body>

     <div class="container">
          <div class="top">
               <div class="header">
                   <div class="logo_div">
                          <img class="logo" src="images/logo.jpg" alt="">
                    <p>La direction regional de l'agriculture de l'oriental(DRAO)</p>
                   </div>
                    <nav>
                         <ul class="nav_links">
                              <li><a href="">Home</a></li>
                              <li><a href="">Projets</a></li>
                              <li><a href="">Partenaire</a></li>
                              <li><a href="">A Propos</a></li>
                             
                         </ul>
                        
                    </nav>
                 <button class="dropbtn"> <a  href="{{ route('login') }}">Connexion</a></button>
               </div>

            
                    <div id="slider">
                         <input type="radio" name="slider" id="slide1" checked>
                         <input type="radio" name="slider" id="slide2">
                         <input type="radio" name="slider" id="slide3">
                         <input type="radio" name="slider" id="slide4">
                         <div id="slides">
                            <div id="overflow">
                               <div class="inner">
                                  <div class="slide slide_1">
                                    <div class="slide-content">
                                        <p>Lorem ipsum, dolor sit amet</p>
                                        <h1> Quae deleniti enim cumque rerum odit?  deleniti .</h1>
                                        <p>Lorem ipsum dolor sit, amet consectetur  elit. Quasi, amet . Neque id quibusdam inventore</p>
                                        <button>Lire Plus</button>
                                     </div>
                                  </div>
                                  <div class="slide slide_2">
                                    <div class="slide-content">
                                        <p>Quae deleniti enim cumque</p>
                                        <h1> Quae deleniti enim cumque rerum odit?  deleniti .</h1>
                                        <p>Lorem ipsum dolor sit, amet consectetur  elit. Quasi, amet . Neque id quibusdam inventore</p>
                                        <button>Lire Plus</button>
                                     </div>
                                  </div>
                                  <div class="slide slide_3">
                                    <div class="slide-content">
                                        <p> Neque id quibusdam inventore</p>
                                        <h1> Quae deleniti enim cumque rerum odit?  deleniti .</h1>
                                        <p >Lorem ipsum dolor sit, amet  adipisicing elit. Quasi, amet . Neque id quibusdam inventore</p>
                                        <button>Lire Plus</button>
                                     </div>
                                  </div>
                                  <div class="slide slide_4">
                                   <div class="slide-content">
                                        <p> Amet consectetur adipisicing elit</p>
                                        <h1> Quae deleniti enim cumque rerum odit?  deleniti .</h1>
                                        <p>Lorem ipsum dolor sit, amet consectetur  elit. Quasi, amet . Neque id quibusdam inventore</p>
                                        <button>Lire Plus</button>
                                     </div>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <div id="controls">
                            <label for="slide1"></label>
                            <label for="slide2"></label>
                            <label for="slide3"></label>
                            <label for="slide4"></label>
                         </div>
                         <div id="bullets">
                            <label for="slide1"></label>
                            <label for="slide2"></label>
                            <label for="slide3"></label>
                            <label for="slide4"></label>
                         </div>
                    </div>
            
              
          </div>
         


          <div class="bottom">
               <div class="column1">
                     <h1>Bienvenue dans notre centre Documentaire</h1>
                     <p>Sous titre de la description</p>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, cum vitae repellat dignissimos asperiores deserunt nihil recusandae distinctio eaque nobis maxime obcaecati perspiciatis consequuntur, facilis, quasi sequi dolor blanditiis ad.
                     Temporibus eligendi amet reiciendis eius asperiores? Tempore itaque quaerat ipsum beatae, dolores quisquam illo nihil tempora, corrupti a, cumque nam commodi? Recusandae molestiae minima, ipsum et qui sequi? Delectus, voluptate?
                     Quod, explicabo eveniet. Porro alias necessitatibus perspiciatis
                     eius asperiores? Tempore itaque quaerat ipsum beatae, dolores quisquam illo nihil tempora, corrupti a, cumque nam commodi? Recusandae molestiae minima, ipsum et qui sequi? Delectus, voluptate?
                     Quod, explicabo eveniet. Porro alias neceici,ius asperiores? Tempore itaque quaerat ipsum beatae, dolores quisquam illo nihil tempora, corrupti a, cumque nam commodi? Recusandae molestiae minima, ipsum et qui sequi? Delectus, voluptate?
                     Quod, explicabo eveniet. Porro alias necessitatibus perspiciatis
                     eius asperiores? Tempore itaque quaerat ipsum beatae, dolores quisquam illo nihil tempora, corrupti a, cumque nam commodi? Recusandae molestiae minima, ipsum et qui sequi? Delectus, voluptate?
                     Quod, explicabo eveniet. Porro alias necessitatibus perspici, et a et amet vel ducimus dolorem aperiam recusandae vero ea molestias minus architecto laboriosam provident consequatur distinctio voluptate incidunt non doloremque suscipit sunt tempore!
                  </p>
                  <button>Lire Plus</button>
               </div>
               <div class="column2">
                  <div class="col1">
                     <div><img src="https://img.icons8.com/ios/50/000000/documents.png"/></div>
                     <div class="col_content"><span>Document</span> 
                        <p>1503</p></div>
                  </div>
                  <div class="col2">
                   <div>  <img src="https://img.icons8.com/ios/50/000000/images-folder.png"/></div>
                     <div class="col_content">
                        <span>Image</span> <p>151313</p>
                     </div> 
                  </div>
                  <div class="col3">
                   <div>  <img src="https://img.icons8.com/ios/50/000000/favorite-database.png"/></div>
                     <div class="col_content">
                     <span>Base de Données </span> <p>151616</p>
                     </div>
                  </div>
               </div>
               <div class="column3">
                     <img src="images/reading-librarie.jpg" >
               </div>
          </div>

          <div class="footer">
                  <div>
                     @2021 Tous les droits réservés
                  </div>
               <div>
                  Home / Projets / Partenaire / A Propos
               </div>
          </div>
     </div>





          

     <!--      
     <script>
      /* When the user clicks on the button, 
      toggle between hiding and showing the dropdown content */
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }
      
      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
      </script>
    
 -->

</body>

</html>