
    
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
       

        <div class="flex flex-col mt-16 items-center bg-white rounded-lg m-5 max-w-5xl mx-auto    ">

            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4" role="alert" id="modelname_missing" style="display:none">
                <span class="block sm:inline pr-16">Entrer le nom du modele.</span>
            </div>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4" role="alert" id="checkboxed_empty" style="display:none">
                <span class="block sm:inline pr-16">No checkboxes checked.</span>
            </div>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative m-4" role="alert" id="bothinputs_empty" style="display:none">
                <span class="block sm:inline pr-16">Enter le Nom du Modele et Cocher un minimun d'une checkbox.</span>
            </div>
            <div class="bg-green-100 border text-right border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert" id="modele_added" style="display:none">
                <span class="block sm:inline pr-16">Modele ajouté avec Succes.</span>
            </div>

            <div class="mt-6">
                <div id="response">

                </div>
                    <h1 class="text-lg font-semibold mb-4 text-gray-700  dark:text-white ">Creer un nouveau Modèle de Métadonnees</h1><br>
                <div>
                <form id="form" action="#" class="block">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label class="">Nom du Modele : </label>
                        <input type="text" class="ml-6 px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 " required placeholder="Nom du Modele" id="nomModele" >
                </form>
                
                </div>

                <div class="mt-16 text-center ">
                    <div class="overflow-y-scroll h-64 w-full border ">
                        @foreach($meta as $m)
                            <div id=boxes class="m-1">
                                   {{ $m->name }}
                                     <input type="checkbox" class="checkitem " id="box" name={{ $m->id }}>
                            </div>
                        @endforeach 
                    </div>
                    <button class="border rounded-lg text-white p-2 bg-blue-600 my-8 mx-16  " id="btn">Ajouter Modele</button>
                    <button class="border rounded-lg text-white p-2 bg-blue-600" id="unckeck_all">Uncheck All</button>
                </div>
             </div>
           
        </div>
        
    </x-app-layout>


