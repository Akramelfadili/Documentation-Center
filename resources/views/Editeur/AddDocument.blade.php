<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white flex flex-col justify-center  rounded-lg h-auto max-w-6xl mx-auto mt-16">
        <div id="succesMessage">
         
        </div>
        
        <label for="">Choissisez un modele de Document a a ajouter</label>
        <div id="select">
            <select >
                <option selected disabled>---Choisissez modele---</option>
                @foreach($modele as $m)
                       <option >{{ $m->model_name }}</option> 
                @endforeach
            </select>
        </div>

        <label for="">Classe de documents associe au Document</label>
        <div id="class_doc">
            <select>
                <option selected disabled>---Choisissez classe---</option>
                @foreach($classes as $classe)
                
                    <option  >{{ $classe->classe_name }}</option>
                @endforeach
            </select>
        </div>

        <div id="show_form">
            @foreach($modele as $m)
                    <form class="form_add_doc" id="{{ $m->model_name }}" method="POST" action="#" >
                        @csrf
                        @method('PUT')
                        @foreach($m->metadonnees as $z)
                            <label >{{ $z->name }} : </label><input  type="text" name="{{ $z->id }}"><br>
                        @endforeach 
                        <input type="file" class="{{$m->model_name}}"  accept=".accdb,.tiff,.pdf,.docx,.csv,.png,.jpg,.pptx,.xlsx,.txt" multiple > 
                        <a href="#" class="button_add_doc">Ajouter Document</a>
                    </form>
            @endforeach
        </div>

    </div>
</x-app-layout>