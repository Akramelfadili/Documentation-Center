
    
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    

        <div class="flex flex-col justify-around bg-white rounded-lg m-16 max-w-6xl mx-auto  ">
            
            @if ($message = Session::get('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 max-w-xl ml-64 mt-6 rounded relative alert_message" role="alert" >
                <span class="block sm:inline mr-6">{{ $message }}</span>
                <span class="absolute top-0 ml-16 bottom-0 right-0 px-4 py-3 close_btn" >
                  <svg class="fill-current h-6 w-6 ml-16 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                </span>
              </div>
            @endif


                <div class="flex flex-row">
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
                                    <td hidden  id="{{ $classe->id }}" >{{ $classe->classe_name }}</td>
                                    <td class="py-3 px-6 text-center whitespace-nowrap">{{ $classe->classe_name }}</td>
                                    <td class="py-3 px-6 text-center whitespace-nowrap">
                                        <button class="border rounded-lg text-white p-2 bg-blue-700 modifier_classe_btn" >Modifier</button>
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
                </div>  
                <div>
                    <form action ="{{ route("admin.class.update") }}">
                        <div>
                            <h1 id="title" class="text-lg font-semibold text-gray-700 mt-10 dark:text-white ml-2 pb-5">Modifier Classe de document</h1>                           
                            <input type="text" name="classe_name"  placeholder="Classe a Modifier" class="block w-2/3  px-4 py-2 m-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600  selected_classe_value">
                            <input type="text" hidden class="selected_classe_id" name="classe_id">
                            <button class="border rounded-lg text-white ml-20  p-2 bg-blue-700 mb-6 save_classe_modified" >Modifier</button>
                        </div>
                    </form>    
                </div>        
            </div> 

        </div>    
        </div> 
    </x-app-layout>
    
    

