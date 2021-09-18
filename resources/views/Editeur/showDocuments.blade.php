<x-app-layout>
    <x-slot name="header">
    </x-slot>

 

      
        
        <div class=" max-w-md mx-auto rounded-full flex items-center mt-6 ">
            <div class="w-full">
                <input type="search" class="px-4 py-1 w-full rounded-full focus:outline-none" placeholder="Search For Document ..."
                   id="search">
            </div>
            <div>
                <button type="submit" class="w-12 h-12 rounded-full flex justify-center items-center text-white"
                    :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-600 cursor-not-allowed'"
                    :disabled="search.length == 0">
                    <img src="https://img.icons8.com/ios-filled/50/000000/search--v2.png"/ class="w-5 h-5">
                </button>
            </div>
        </div>
        
  

        <div class="response_search flex justify-center mt-16 " style="display: none;">  
            <p > No Documents Found ....</p>    
        </div>



        <div id="main">
            @foreach($documents as $doc)

           <div id="{{ $doc->id }}" class="doc_divs bg-white rounded-lg m-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" >

                   <div class="flex flex-row justify-left mb-5 ">
                        <div class="mr-32 ml-32 mt-3">
                                <label class="font-bold"> Modele :</label> {{ $doc->model->model_name }}
                        </div> 
                        <div class="mt-3        ">
                                <label class="font-bold"> Classe Document :</label> {{ $doc->class->classe_name }}
                        </div>
                   </div>

                   

                   <div class="mt-3">
                        @foreach($doc->metadonneesData as $d)
                            <label  class="pb-5 mr-2 font-bold">{{ $d->name}} :  </label>
                            @for ($i = 0; $i < count($values); $i++)
                                    @if ($values[$i]->document_id == $doc->id && $values[$i]->metadonnees_id == $d->id)
                                            {{ $values[$i]->value}}
                                    @endif
                            @endfor                       
                        <br>
                        @endforeach
                    </div>

                   
                    <div class="flex flex-row mt-5 ">
                        <label class="mr-6 font-bold ">Files : </label>
                            @for($i = 0; $i < count($files); $i++)
                                
                                    @if($doc->id == $files[$i]->document_id )
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
                                    @endif 
                               
                            @endfor
                    </div>

                    <div>
                         
                            <button class="text-blue-700  inline-flex  font-semibold tracking-wide">
                                <a href="/editeur/{{$doc->id}}/edit">Edit</a>
                            </button>
                            
                    </div>
                  
            </div>  
        @endforeach

        </div>
        {{-- <div class="pagination_documents">
            {!! $documents->links() !!}
        </div> --}}
       
  
  

</x-app-layout>