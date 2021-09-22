

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