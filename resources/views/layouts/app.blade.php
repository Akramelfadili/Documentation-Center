<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
            </header>
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>


    



    <script >
        $('document').ready(function(){
                 $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                 });

             
                //Add modele on click button
                $("#btn").click(function(){
                    var tab=[];
                    $("#boxes input:checked").each(function(){
                        if(tab.includes($(this).attr("name")) == false){
                            tab.push($(this).attr("name"));
                        }
                    });
                    var modelname=$("#nomModele").val(); 

                    if( modelname.length ==0 &&  $(":checkbox:checked").length == 0){
                        $("#bothinputs_empty").show("slow").delay(3000).hide("slow");
                    }else if(modelname.length ==0){
                        $("#modelname_missing").show("slow").delay(3000).hide("slow");
                    }else if( $(":checkbox:checked").length == 0 ) {
                        $("#checkboxed_empty").show("slow").delay(3000).hide("slow")
                    }else {
                         var data={name:modelname,tableau:tab};
                         $.ajax({
                            type: "POST",
                            url: "/admin/modele",
                            data: data,
                            success: function(response)
                                {
                                    if(response.success == true){
                                        $("#modele_added").show("slow").delay(3000).hide("slow");
                                   }
                                }
                        }); 
                    }
                });
                    //uncheck all boxes(admin-modele)
                $("#unckeck_all").click(function(){
                    $(':checkbox').each(function() {
                        this.checked = false;
                    }); 
                });


                          //ajouter document jquery
                //$("select").val(0);
                $('.form_add_doc').hide();
                // show form corresponding to option selected (Modele)
                $("#select").on("change",function(){
                    var value= $('#select option:selected').text();
                    $('.form_add_doc').hide();
                    $('#' + value).show();  
                });


                //get and send document data
                $(".button_add_doc").click(function(e){
                    var modele=$('#select :selected').text();  //modele selected
                    var classe=$('#class_doc :selected').text();  //class selected

                    var ids =[] ,values= [];
                    var form = new FormData();
                    $("#"+modele+" input").each(function(){
                            var input=$(this);
                            if(input.attr("type")!="hidden" && input.attr("type")!="file"){
                                var name=input.attr("name");
                                ids.push(name);
                                form.append("ids[]",name);             // get all ids
                                var value=input.val();
                                values.push(value);
                                form.append("values[]",value);          //get alls input values
                            }
                    }); 
                     //get files
                     var files = $('.'+modele)[0].files;
                    for (let index = 0; index < files.length; index++) {
                        form.append( "files[]" , files[index] );
                    }
                    //add data for object send by ajax
                    form.append("modeleName",modele);
                    form.append("classeName",classe);
                    // verificaiton
                    if(files.length == 0){
                            alert("No files selected");
                    }else if(classe == "---Choisissez classe---"){
                        alert("Selectionnez une classe de document");
                    }else if(values){
                        var verify = new Boolean("true");
                        for (let index = 0; index < values.length; index++) {
                          if(values[index] == ""){
                              verify = false;
                          }
                       }
                       if(!verify){
                           alert("Remplisser tous les champs de metadonnees");
                       }
                    }else {
                           alert("all good");
                    }
                   
                  /*       */
                    
                });



                    // show doc based on search input
                $("#search").on("keyup",function(){
                    var array=new Array();
                    value=$(this).val();
                    //console.log(value);
                    $.ajax({
                       type: "POST",
                       url: "/editeur/Documents/Search",
                       data: {"search":value},
                       dataType: "json",
                       success:function(data){ 
                            // get id selected for db without duplicate
                            for (let index = 0; index < data.length; index++) {
                                if(array.includes(data[index].document_id) == false ){
                                    array.push(data[index].document_id);
                                }
                            }
                            if(value ==""){
                                $(".doc_divs").show();
                                $(".response_search").hide();
                                $(".pagination_documents").show();
                            }else if(value!="" && array.length != 0) {
                                $(".doc_divs").hide();
                                $(".response_search").hide();
                                $(".pagination_documents").hide();
                                for (let index = 0; index < array.length; index++) {
                                    $("#"+array[index]).show();
                                }
                            }else if(value!="" && array.length == 0){
                               $(".doc_divs").hide();
                              $(".response_search").show();
                              $(".pagination_documents").hide();
                            }
                            
                       }   
                   });
                });

                $("#submit_data").click(function(){
                    var form = new FormData();
                    $("#edit_form input").each(function(){
                       
                        var input=$(this);
                        if(input.attr("type")!="hidden" ){
                            var classe = $(".class_select").find(":selected").text();
                            form.append("classe",classe);
                            var name=input.attr("name");
                            // console.log(name);
                            form.append("ids[]",name);
                            //console.log(typeof name);
                            var value=input.val();
                            form.append("values[]",value);
                            // console.log(value);
                        }
                    });
                    var id=$(this).closest("form").attr("class");
                    form.append("id_doc",id);
                     $.ajax({
                      type: "POST",
                      url: "/editeur/save",
                      processData:false,
                      contentType: false,
                      data:form,
                      success: function (response) {    
                      }  
                    });   
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

                    //modifier

                    $(".modifier_classe_btn").on("click",function(){
                            var current = $(this).closest("tr");
                            var class_id= current.find("td:eq(0)").attr("id");
                            $(".selected_classe").val(class_id);                            
                    });


                    $(".save_modified_classe").on("click",function(){
                        var form = new FormData();
                       var value = $(this).closest("div").find("input:eq(0)").val();
                        form.append("value",value);
                        $$.ajax({
                            type: "post",
                            url: "/admin/classDocument/modify",
                            data: "form",
                            dataType: "dataType",
                            success: function (response) {
                                
                            }
                        });
                        
                    })

                    $(".close_btn").click(function(){
                        $(".alert_message").hide();
                    });


                    
     });
       
    </script>
</html>
