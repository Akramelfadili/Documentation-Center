<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div >
 {{--        {{dd($files) }} --}}
        @foreach($documents as $doc)
            <div class="bg-white rounded-lg m-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
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
            </div> 
        @endforeach
    </div>
  

</x-app-layout>