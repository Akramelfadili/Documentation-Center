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
                var tab=[];
                $("#btn").click(function(){
                    $("#boxes input:checked").each(function(){
                        tab.push($(this).attr("name"));
                    });
                    var modelname=$("#nomModele").val(); 
                    console.log(modelname)
                    console.log(tab)

                   var data={name:modelname,tableau:tab}

                    $.ajax({
                        type: "POST",
                        url: "/admin/modele",
                        data: data,
                        success: function(response)
                            {
                                $('#response').html(response);
                            }
                    });
                });


                $("select").val(0);
                $('.form').hide();
                // show form corresponding to option selected (Modele)
                $("#select").on("change",function(){
                    var value= $('#select option:selected').text();
                    $('.form').hide();
                    $('#' + value).show();  
                });

                //get and send document data
                $(".button15").click(function(e){
                    var modele=$('#select :selected').text();  //modele selected
                    var classe=$('#class_doc :selected').text();  //modele selected
                    var MetaIdArray=new Array();
                    var MetaValuesArray=new Array();
                    $("#"+modele+" input").each(function(){
                            var input=$(this);
                            if(input.attr("type")!="hidden" && input.attr("type")!="file"){
                                var name=input.attr("name");
                                MetaIdArray.push(name);
                                var value=input.val();
                                MetaValuesArray.push(value);
                            }
                    });
                  
                    var files = $('.'+modele)[0].files;
                    var form = new FormData();
                   // console.log(files.length);
                      for (let index = 0; index < files.length; index++) {
                        form.append( "files[]" , files[index] );
                       // console.log(files[index]);
                    }  
                    form.append("modele",modele);
                    $.ajax({
                      type: "POST",
                      url: "/editeur/sendDocument",
                      processData:false,
                      contentType: false,
                      data:form,
                      success: function (response) {
                            $('#succesMessage').html(response);
                      }  
                    });   
                    


                   /*  var fileArray=[];
                     var files = $("."+modele).get(0).files; 
                    for (var index = 0; index < files.length; index++) {
                        var file=files[index];
                        fileArray.push(file.name);
                    }  
                    console.log(fileArray);
                
                    var data={modeleName:modele,classeName:classe,idArray:MetaIdArray,valuesArray:MetaValuesArray,files:fileArray}
                      $.ajax({
                      type: "POST",
                      url: "/editeur/sendDocument",
                      data: data,
                      dataType:"json",
                      success: function (response) {
                            $('#succesMessage').html(response);
                      }  
                    });     */
                     
                });
        });
       
    </script>
</html>
