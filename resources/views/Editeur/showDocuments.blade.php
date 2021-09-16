<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div>    
      
        
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
           <div id="{{ $doc->id }}" class="doc_divs bg-white rounded-lg m-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" }}>
                   <div>
                         <label > Modele :</label> {{ $doc->model->model_name }}
                    </div> 
                   <div>
                         <label > Classe :</label> {{ $doc->class->classe_name }}
                   </div>

                    <hr>

                    @foreach($doc->metadonneesData as $d)
                        {{ $d->name}}:  
                         @for ($i = 0; $i < count($values); $i++)
                                @if ($values[$i]->document_id == $doc->id && $values[$i]->metadonnees_id == $d->id)
                                        {{ $values[$i]->value}}
                                @endif
                        @endfor                       
                    <br>
                    @endforeach

                    <hr>

                    @for($i = 0; $i < count($files); $i++)
                       @if($doc->id == $files[$i]->document_id )
                            <a download="{{ $files[$i]->name }}" href="{{ Storage::url('uploads/'.$files[$i]->name) }}" >
                             {{--    @if( substr(strrchr($files[$i]->name,'.'),1)  == "docx")
                                         <img src="{{ asset("images/word.jpg") }}" style="width: 20px; height:20px;" alt="">
                                @elseif( substr(strrchr($files[$i]->name,'.'),1)  == "pptx")
                                        <img src="{{ asset("images/ppt.png") }}" style="width: 20px; height:20px;" alt="">
                                @elseif( substr(strrchr($files[$i]->name,'.'),1)  == "accdb")
                                        <img src="{{ asset("images/access.jpg") }}" style="width: 20px; height:20px;" alt="">
                                @elseif( substr(strrchr($files[$i]->name,'.'),1)  == "pdf")
                                        <img src="{{ asset("images/pdf.png") }}" style="width: 20px; height:20px;" alt="">
                                @elseif( substr(strrchr($files[$i]->name,'.'),1)  == "xlsx  ")
                                        <img src="{{ asset("images/excel.png") }}" style="width: 20px; height:20px;" alt="">
                                @elseif( substr(strrchr($files[$i]->name,'.'),1)  == "jpg"  || substr(strrchr($files[$i]->name,'.'),1)  == "png")
                                        <img src="{{ asset("images/images.png") }}" style="width: 20px; height:20px;" alt="">
                                @else
                                    {{ $files[$i]->name }}
                                @endif
                                 --}}
                                 {{ $files[$i]->name }}
                           </a>
                       @endif 
                    @endfor
                    <a href=""></a>
                    <hr>
                    <button><a href="/editeur/{{$doc->id}}/edit">Edit</a></button>
            </div>  
        @endforeach
        </div>
        {{-- <div class="pagination_documents">
            {!! $documents->links() !!}
        </div> --}}
       
    </div>
  

</x-app-layout>