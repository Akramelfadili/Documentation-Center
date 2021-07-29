
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    
        <div class="py-12" >
          <h1 >Ajouter un Editeur de Document</h1>
            <button class="border rounded-lg text-white ml-32  p-2 bg-blue-500 "><a href="{{ route("admin.add") }}">Ajouter Editeur</a></button>
            <table >
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </thead>
                <tbody>
    
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{-- <a href="/admin/{{ $user->id }}/edit">Editer</a>  --}}
                                <a href="/delete/{{$user->id}}">Supprimer</a></td>
                        </tr>
                        @endforeach
    
                   
                </tbody>
            </table> 
        </div>
    </x-app-layout>
    
