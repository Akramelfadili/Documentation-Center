
    
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    

        <div class="flex flex-row justify-around bg-white rounded-lg m-16 max-w-6xl mx-auto  ">

            {{-- @if(session()->has('message'))
                    <div class="alert alert-success flex flex-col">
                        <div class="bg-green-100 border text-right max-w-5xl border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert"  >
                            <span class="block sm:inline pr-16">Modele ajouté avec Succes.</span>
                        </div>
                    </div>
             @endif   --}}

            <div class="m-10 w-1/2 ">
                <div class="mb-6 ml-16 font-bold ">
                    <h1 class="text-lg font-semibold text-gray-700  dark:text-white ml-16">Classes de Documents </h1>
                </div>
                <table class="min-w-max w-full table-auto" id="classes_table">
                        <thead> 
                            {{-- <th>ID</th> --}}
                            <tr class="bg-gray-200 text-gray-600  text-sm leading-normal">
                                <th class="py-3 px-6 text-center">Nom de la classe</th>
                                <th class="py-3 px-6 text-center">Actions</th>
                          </tr>
                        </thead>
                        <tbody id="classes_doc"  class="text-gray-600 text-sm font-light">
                            @foreach($classes as $classe)
                                <tr class="border-b border-gray-200 hover:bg-gray-100" >
                                    <td hidden  id="{{ $classe->classe_name }}"></td>
                                    <td class="py-3 px-6 text-center whitespace-nowrap">{{ $classe->classe_name }}</td>
                                    <td class="py-3 px-6 text-center whitespace-nowrap">
                                       {{--  <button class="border rounded-lg text-white p-2 bg-blue-700 modifier_classe_btn" >Modifier</button> --}}
                                        <button class="border rounded-lg text-white p-2 bg-blue-700"><a href="/admin/classDocument/delete/{{ $classe->id }}">Supprimer</a></button>
                                    </td>
                                </tr>
                            @endforeach 
                        </tbody>    
                    </table>
                    <div>
                        <div class="pt-10">
                            {!! $classes->links() !!}
                        </div>
                    </div>
            </div>
        
           
          
          <div class="flex flex-col mt-10 ml-16 w-1/3 ">
                  
                <div>
                    <form action="{{ route("admin.classDocument") }}" method="POST"}>
                        @csrf
                        <div>
                            <h1 id="title" class="text-lg font-semibold text-gray-700  dark:text-white ml-2 pb-5">Ajouter Classe de Document</h1>                           
                            <input type="text" name="classe_name" placeholder="Entrer le nom de la classe" class="block w-2/3  px-4 py-2 m-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 ">
                            
                            <button class="border rounded-lg text-white ml-20  p-2 bg-blue-700"  id="btn">Ajouter </a></button>
                        </div>
                    </form>    
                    
                   {{--  <form >
                        <div>
                            <h1 id="title" class="text-lg font-semibold text-gray-700 mt-10 dark:text-white ml-2 pb-5">Modifier Classe de document</h1>                           
                            <input type="text" name="classe_name"  placeholder="Classe a Modifier" class="block w-2/3  px-4 py-2 m-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600  selected_classe">
                            <button class="border rounded-lg text-white ml-20  p-2 bg-blue-700 mb-6 save_modified_classe" >Modifier</button>
                        </div>
                    </form>   --}}  
                </div>           
            </div> 


        </div> 
    </x-app-layout>
    
    

