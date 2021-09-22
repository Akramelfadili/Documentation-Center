

    <!DOCTYPE html>
    <html lang="en">
    <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <title>Docuemnts</title>
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
         <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
         <meta name="csrf-token" content="{{ csrf_token() }}" />
         <link href="https://cdn.jsdelivr.net/npm/@tailwindcss/custom-forms@0.2.1/dist/custom-forms.css" rel="stylesheet">
         <link rel="stylesheet"  href="{{ url('/css/test.css') }}" />
    </head>
    <body>
         
{{--      <p><a href="{{ route("user.search_doc_user") }}">Return to Search view</a></p> --}}

     <div id="search_resultst">
               <h1>Resultats de la Recherche</h1>
          <div>
               @for($i = 0; $i <count($document_ids); $i++)
                    <div class="div_doc">
                    @foreach ($documents as $doc)
                     
                         @if($doc->id == $document_ids[$i])
                              <div>
                                   <div class="model_name">
                                        <label class="model_label" >Model</label> : {{ $doc->model->model_name }} 
                                   </div>
                                        {{-- Metadonnees --}}
                                   <div class="meta_div">
                                        @foreach ( $doc->metadonneesData as $d)
                                        <div class="metadonnees">
                                             <label class="meta_label" >{{$d->name  }} :</label>  
                                             @for($j = 0; $j < count($values); $j++)
                                                  @if ($values[$j]->document_id == $doc->id && $values[$j]->metadonnees_id == $d->id)
                                                      <span>{{ $values[$j]->value}}</span> 
                                                   @endif
                                             @endfor   
                                        </div>
                                   @endforeach

                                   </div>
                                  

                                        {{-- Files --}}
                                   <div class="files">
                                        <label>Files : </label>
                                             @for($k = 0; $k < count($files); $k++)
                                                  @if($doc->id == $files[$k]->document_id )
                                                            <a download="{{ $files[$i]->name }}" href="{{ Storage::url('uploads/'.$files[$i]->name) }}" >
                                                                 @if( substr(strrchr($files[$i]->name,'.'),1)  == "docx")
                                                                      <img src="{{ asset("images/word.svg") }}" style="width: 20px; height:20px;" alt="">
                                                            @elseif( substr(strrchr($files[$i]->name,'.'),1)  == "pptx")
                                                                      <img src="{{ asset("images/ppt.svg") }}" style="width: 20px; height:20px;" alt="">
                                                                 @elseif( substr(strrchr($files[$i]->name,'.'),1)  == "accdb")
                                                                      <img src="{{ asset("images/access.svg") }}" style="width: 20px; height:20px;" alt="">
                                                                 @elseif( substr(strrchr($files[$i]->name,'.'),1)  == "pdf")
                                                                      <img src="{{ asset("images/pdf.svg") }}" style="width: 20px; height:20px;" alt="">
                                                                 @elseif( substr(strrchr($files[$i]->name,'.'),1)  == "xlsx  ")
                                                                      <img src="{{ asset("images/excel.svg") }}" style="width: 20px; height:20px;" alt="">
                                                                 @elseif( substr(strrchr($files[$i]->name,'.'),1)  == "jpg"  || substr(strrchr($files[$i]->name,'.'),1)  == "png")
                                                                      <img src="{{ asset("images/jpg.png") }}" style="width: 20px; height:20px;" alt="">
                                                                 @else
                                                                 {{ $files[$i]->name }}
                                                                 @endif 
                                                            
                                                       </a> &emsp;
                                                       {{--  <a download="{{ $files[$k]->name }}" href="{{ Storage::url('uploads/'.$files[$k]->name) }}" >
                                                            
                                                  {{ $files[$k]->name }}   --}}
                                                       </a>
                                                  @endif 
                                              @endfor
                                   </div>
                                 
                                         <button class="btn_send_mail" name="{{ $doc->id }}">Send Document Files By Email</button>
                              </div>
                         @endif
                    @endforeach
                     </div>  
               @endfor
               
          </div>
    </body>


     <script>
           $('document').ready(function(){
                 $.ajaxSetup({
                    headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                 });


               $(".btn_send_mail").click(function(){
                         var value = $(this).attr("name");
                         var form = new FormData();
                         form.append("value",value);
                          $.ajax({
                              type: "POST",
                              url : "/search/documents/send",
                              processData:false,
                              contentType: false,
                              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                              data: form,
                              success: function (response) {

                              }
                         }); 
               });
           });
     </script>
    </html>

