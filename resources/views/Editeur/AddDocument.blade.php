<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="bg-white flex flex-col  items-center rounded-lg max-w-6xl mx-auto mt-16">
        
             {{-- MEssages --}}
             <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4" role="alert" id="classe_missing" style="display:none">
                <span class="block sm:inline pr-16">Choissisez une Classe</span>
            </div>

            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4" role="alert" id="fields_missing" style="display:none">
                <span class="block sm:inline pr-16"> Remplissez tout les inputs</span>
            </div>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4" role="alert" id="files_missing" style="display:none">
                <span class="block sm:inline pr-16">Uploader au minimum un fichier</span>
            </div>
            <div class="bg-green-100 border text-right border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert" id="document_ajouter_success" style="display:none">
                <span class="block sm:inline pr-16">Document ajouté avec succes.</span>
            </div>

        
        <div class="flex flex-row mt-6 mb-6">
            <div class="mr-64">
                <label for="">Choissisez un modele a ajouter</label>
                <div id="select">
                    <select class="border border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring-2 ring-blue-100"  >
                        <option selected disabled>---Choisissez modele--- &emsp;</option>
                        @foreach($modele as $m)
                            <option >{{ $m->model_name }}</option> 
                        @endforeach
                    </select>
                </div>
           </div>
            
            <div>
                  <label for="">Choissisez la Classe du Modele</label>
            <div id="class_doc">
                <select class="border border-gray-300 p-2 my-2 rounded-md focus:outline-none focus:ring-2 ring-blue-200" >
                    <option selected disabled>---Choisissez classe--- &emsp;</option>
                    @foreach($classes as $classe)
                    
                        <option  >{{ $classe->classe_name }}</option>
                    @endforeach
                </select>
            </div>
            </div>
        </div>

        <div id="show_form">
            @foreach($modele as $m)
                <form class="form_add_doc" id="{{ $m->model_name }}" class="mb-6" method="POST" action="#" >
                    @csrf
                    @method('PUT')

                    <table>
                            <tbody>
                                @foreach($m->metadonnees as $z)
                                        <tr>
                                            <td>  <label class="mr-6" >{{ $z->name }} : </label><br></td>
                                            <td><input class="border border-gray-300 p-2 mt-1 rounded-md focus:outline-none focus:ring-2 ring-blue-200"  type="text" name="{{ $z->id }}"></td>
                                        </tr>
                                @endforeach 
                            </tbody>
                    </table>
                  
                    <input type="file" class="{{$m->model_name}} mt-6 mb-6"  accept=".accdb,.tiff,.pdf,.docx,.csv,.png,.jpg,.pptx,.xlsx,.txt" multiple > 
                    <a href="#" class="button_add_doc border rounded-lg text-white p-2 bg-blue-700" >Ajouter Document</a>



                </form>
                
         @endforeach
         
        </div>

       
    </div>
</x-app-layout>