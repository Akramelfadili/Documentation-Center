<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div>    
      
        <div id="response_search">   </div>
        <div >
            <label >Search </label><input type="text" id="search">
        </div>
        {{-- <div class= " message_error bg-red-200 relative text-red-500 py-3 px-3 rounded-lg">
            A simple danger alert—check it out!
        </div> --}}
        <div id="main">
            @foreach($documents as $doc)
           <div id="{{ $doc->id }}" class="doc_divs bg-white rounded-lg m-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" }}>
                    <label > Modele :</label> {{ $doc->model->model_name }} <br>
                    <label > Classe :</label> {{ $doc->class->classe_name }}
                    <br><hr>
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
                              {{ $files[$i]->name }}  {{-- <img src="{{ asset("images/word.jpg") }}" alt="" width="25" height="25">     --}}
                             {{--  <a href="{{ asset("images/word.jpg") }}" class="images_pop">The home page will open in another tab.</a> --}}
                           {{--   <iframe src='https://view.officeapps.live.com/op/embed.aspx?src={{  Storage::url('uploads/'.$files[$i]->name)  }}' width='1366px' height='623px' frameborder='0' target="_blank">This is an embedded <a target='_blank' href='http://office.com'>Microsoft Office</a> document, powered by <a target='_blank' href='http://office.com/webapps'>Office Online</a>.</iframe> --}}
                    
                           </a><br>
                       @endif 
                    @endfor
                    <a href=""></a>
                    <hr>
                    <button><a href="/editeur/{{$doc->id}}/edit">Edit</a></button>
            </div>  
        @endforeach
        </div>
    </div>
  

</x-app-layout>