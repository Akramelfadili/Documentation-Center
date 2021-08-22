
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    
        <div class="flex flex-col items-center p-16 mt-10 bg-white rounded-lg m-5 max-w-5xl mx-auto">
           {{--  @if ($message = Session::get('succes'))
                <div class="bg-red-100 borderw-1/2 border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline pr-32">Editeur ajoute</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                         <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
            @endif
 --}}
            {{-- <div class="0 p-4">
                    <h1 class="text-lg font-semibold text-gray-700  dark:text-white">Liste des Editeurs</h1>
             </div> --}}

             <div class=" p-6 flex-start" >
                <a href="{{ route("admin.add") }}" class="text-blue-700  inline-flex  font-semibold tracking-wide">
                    <span class="hover:underline">
                        Ajouter Editeur
                    </span>
                    <span class="text-xl ml-2">&#8594;</span>
                </a>
             </div>


            <div >
                <table class="overflow-x-auto">
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
                                   <button class="border rounded-lg text-white p-2 bg-blue-700" ><a href="/delete/{{$user->id}}">Supprimer</a></button> </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table> 
            <div>

                <div class="pt-10">
                    {!! $users->links() !!}
                </div>
                
        </div>
    </x-app-layout>
    
