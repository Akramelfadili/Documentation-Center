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
        
        <div class="py-12 flex flex-row justify-around" >
            <div>
                <table class="ml-32" id="classes_table">
                        <thead>
                            <th>ID</th>
                            <th>Classe Document Name</th>
                            <th>Actions</th>
                        </thead>
                        <tbody id="classes_doc">
                            @foreach($classes as $classe)
                                <tr>
                                    <td>{{ $classe->id}}</td>
                                    <td>{{ $classe->classe_name }}</td>
                                    <td><button><a href="/admin/classDocument/delete/{{ $classe->id }}">Delete</a></button></td>
                                </tr>
                            @endforeach 
                        </tbody>    
                    </table>
            </div>
        
    
          <br><br><br><br>
          <div>
                <h1 id="title">Ajouter une Classe de Document</h1>
                <form action="{{ route("admin.classDocument") }}" method="POST"}>
                @csrf
                <div>
                    <label >Classe Name</label>
                    <input type="text" name="classe_name" placeholder="Enter Classe Name">
                    <br>
                    <button class="border rounded-lg text-white ml-32  p-2 bg-blue-500"  id="btn">Ajouter Editeur</a></button>
                </div>
                </form>
        </div> 
          
    
            
       
    </x-app-layout>
    
    

</body>
</html>