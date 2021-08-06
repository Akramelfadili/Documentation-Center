<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
        
        <div class="h-screen  flex flex-row justify-around mx-16 my-16 pt-32">
            <div>
                <div class="mb-6 ml-16 font-bold ">
                    <h1>Classes de Documents </h1>
                </div>
                <table class="min-w-max w-full table-auto" id="classes_table">
                        <thead>
                            {{-- <th>ID</th> --}}
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Classe Document Name</th>
                                <th class="py-3 px-6 text-left">Actions</th>
                          </tr>
                        </thead>
                        <tbody id="classes_doc"  class="text-gray-600 text-sm font-light">
                            @foreach($classes as $classe)
                                <tr class="border-b border-gray-200 hover:bg-gray-100" >
                                   {{--  <td>{{ $classe->id}}</td> --}}
                                    <td class="py-3 px-6 text-left whitespace-nowrap">{{ $classe->classe_name }}</td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap"><button><a href="/admin/classDocument/delete/{{ $classe->id }}">Delete</a></button></td>
                                </tr>
                            @endforeach 
                        </tbody>    
                    </table>
            </div>
        
    
          
          <div class="flex flex-col">
                <div class="font-bold ml-6 mb-6">
                    <h1 id="title">Ajouter une Classe de Document</h1>
                </div>   
                <div>
                    <form action="{{ route("admin.classDocument") }}" method="POST"}>
                        @csrf
                        <div>
                            <label class="text-gray-700 dark:text-gray-200" for="username">Classe Name : </label>
                            <input type="text" name="classe_name" placeholder="Enter Classe Name" class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring">
                            <br>
                            <button class="border rounded-lg text-white ml-16  p-2 bg-blue-500"  id="btn">Ajouter Editeur</a></button>
                        </div>
                    </form>    
                </div>           
                
        </div> 
          
    
            
       
    </x-app-layout>
    
    

</body>
</html>