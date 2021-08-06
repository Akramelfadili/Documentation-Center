
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    
        <div class="h-screen flex flex-col items-center pt-16 ">
            <div class="0 p-4">
                    <h1 class="font-bold" >Ajouter un Editeur de Document</h1>
             </div>

             <div class=" p-6 flex-start" >
                <a href="{{ route("admin.add") }}" class="text-blue-700  inline-flex  font-semibold tracking-wide">
                    <span class="hover:underline">
                        Ajouter Editeur
                    </span>
                    <span class="text-xl ml-2">&#8594;</span>
                </a>
             </div>


             <div class="w-1/2">
                <table class="min-w-max w-full table-auto">
                    <thead>
                        <tr  class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-left">Name</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">Actions</th>
                         </tr>
                         </thead>
                    <tbody class="text-gray-600 text-sm font-light">
        
                            @foreach($users as $user)
                            <tr class="border-b border-gray-200 hover:bg-gray-100" >
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $user->name }}</td>
                                <td class="py-3 px-6 text-left whitespace-nowrap">{{ $user->email }}</td>
                                <td class="py-3 px-6 text-left whitespace-nowrap ">{{-- <a href="/admin/{{ $user->id }}/edit">Editer</a> <br> --}}
                                   <button class="border rounded-lg text-white   p-2 bg-blue-500" ><a href="/delete/{{$user->id}}">Supprimer</a></button> </td>
                            </tr>
                            @endforeach
        
                    
                    </tbody>
                </table> 
            <div>
        </div>
    </x-app-layout>
    
