
    
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
        
        <div class="flex flex-row justify-around bg-white rounded-lg m-16 max-w-6xl mx-auto  ">
            <div class="m-10 w-1/2 ">
                <div class="mb-6 ml-16 font-bold ">
                    <h1 class="text-lg font-semibold text-gray-700  dark:text-white ml-16">Classes de Documents </h1>
                </div>
                <table class="min-w-max w-full table-auto" id="classes_table">
                        <thead>
                            {{-- <th>ID</th> --}}
                            <tr class="bg-gray-200 text-gray-600  text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Nom de la classe</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                          </tr>
                        </thead>
                        <tbody id="classes_doc"  class="text-gray-600 text-sm font-light">
                            @foreach($classes as $classe)
                                <tr class="border-b border-gray-200 hover:bg-gray-100" >
                                   {{--  <td>{{ $classe->id}}</td> --}}
                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $classe->classe_name }}</td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap"><button class="border rounded-lg text-white   p-2 bg-blue-700"><a href="/admin/classDocument/delete/{{ $classe->id }}">Supprimer</a></button></td>
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
                <div class="font-bold ml-6 mb-6">
                    <h1 id="title" class="text-lg font-semibold text-gray-700  dark:text-white pb-5">Ajouter une classe de Document</h1>
                </div>   
                <div>
                    <form action="{{ route("admin.classDocument") }}" method="POST"}>
                        @csrf
                        <div>
                            <label class="text-gray-700 dark:text-gray-200 ml-24" for="username">Nom classe: </label>
                            <input type="text" name="classe_name" placeholder="Entrer le nom de la classe" class="block w-2/3 ml-6 px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 ">
                            <br>
                            <button class="border rounded-lg text-white ml-20  p-2 bg-blue-700"  id="btn">Ajouter Classe</a></button>
                        </div>
                    </form>    
                </div>           
            </div> 


        </div> 
    </x-app-layout>
    
    

