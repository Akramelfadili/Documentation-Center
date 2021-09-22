<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet"  href="{{ url('/css/style_interface.css') }}" />
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">
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
                              <li><a href="#">Home</a></li>
                              <li><a href="#">Projets</a></li>
                              <li><a href="#">Partenaire</a></li>
                              <li><a href="#">A Propos</a></li>
                             
                         </ul>
                      
                    </nav>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    {{-- <a href="{{ route('logout') }}"><img src="images/logout.png" style="width: 25px; height:25px; margin-left:20px;" alt=""></a> --}}
                    <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                             <input type="image" src="images/logout.png" style="width: 25px; height:25px; margin-left:20px;" alt="">
                        </x-responsive-nav-link>
                    </form>
          </div>

          <div class="main">
               <div class="left_side" >
                         <img src="../images/recherche_image.jpg" >
               </div>
               <div class="right_side">
                    <div class="recherche">
                         <div>
                             <h1 style="color: green;">Que cherchez vous dans notre centre documentaire ?</h1><hr>
                             <p class="ModeTitle">Mode de recherche</p>
                             <select name="" id="method_search_select">
                                 <option selected disabled>----Choisir mode de recherche----</option>
                                 <option value="Recherche Libre">Recherche Libre</option>
                                 <option value="Recherche selon Metadonnees">Recherche selon Metadonnees</option>
                             </select>
                         </div>
     
                         <div id="based_select"  style="display:none">
                                 <label for="">Auteur</label> <input type="checkbox"  name="Auteur">
                                 <label for="">Titre </label> <input type="checkbox" name="Titre">
                         </div>
                         <br>
                         <div id="input_recherche_libre">
                             <input type="text" class="recheche_input_text" placeholder="Mot Cles" > <button id="btn_recherche_doc"> Rechercher</button>
                         </div>
                        </div>
                        <hr>
                    <div id="search_resultst">
                    </div>
                    
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



    
    
</body>
<script>
          

     $('document').ready(function(){
               $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
               });

               // show checkboxes on search metadonnnees
               $("#method_search_select").change(function(){
                    var val=$(this).children("option:selected").val();
                    if( val == "Recherche selon Metadonnees"){
                         $("#based_select").show();
                    }else {
                        $("#based_select").hide();
                    }
                });



                 // on click recherche button
             $("#btn_recherche_doc").on("click",function(){
                    var form = new FormData();
                    var selected_value=$("#method_search_select option:selected").val();
                    var input_value=$(".recheche_input_text").val();

                    if(selected_value == "Recherche selon Metadonnees" || selected_value == "Recherche Libre"){
                          if(selected_value == "Recherche selon Metadonnees"){
                                 var tab=[];
                                 var number =$('input:checkbox:checked').length;
                                 $("#based_select input:checked").each(function(){
                                     tab.push($(this).attr("name"));
                                     form.append("checkboxes[]",$(this).attr("name"));
                                 })

                                 if(tab.length==0){  
                                     alert("cochez minimum une checkbox");
                                 }else if(input_value== ""){
                                     alert("Le champ de recherche est vide");
                                 }
                                 else {
                                     form.append("checked",1)
                                     form.append("value",input_value);
                                      $.ajax({
                                         type: "post",
                                         url: "/search/documets",
                                         processData:false,
                                         contentType: false,
                                         data:form,
                                         success:function(data) { 
                                                 $('#search_resultst').html(data.html);
                                          }
                                     }); 
                                 }    
                          }else if(selected_value == "Recherche Libre"){ 
                             if(input_value == ""){
                                 alert("Le champ de recherche est vide");
                             }else {
                                 form.append("checked",0)
                                 form.append("value",input_value);
                                 $.ajax({
                                       type: "post",
                                         url: "/search/documets",
                                         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                         processData:false,
                                         contentType: false,
                                         data:form,
                                          success:function(data) { 

                                                 $('#search_resultst').html(data.html);
                                          }
                                 }); 
                             }
                         }
                          }else {
                        alert(" Veuillez selectioner un mode de recherche");
                         }
               });

                 $("#btn_send_mail").click(function(){
                     alert("Akram");
                 });
});
</script>

</html>