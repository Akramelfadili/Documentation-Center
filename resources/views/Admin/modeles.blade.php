
    
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard for Admin') }}
            </h2>
        </x-slot>
    
        <div class="h-screen   rounded-lg  w-1/2 flex flex-col mt-16 items-center ml-64">
            <div id="response"></div>
            <h1>Creer un nouveau modele de metadonnees</h1><br>
            <div>
               <form id="form" action="#">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <label class="mr-4">Nom du Modele : </label>
                    <input type="text"  placeholder="Name" id="nomModele">
            </form>
            </div>

            <div class="mt-16 text-center">
                <div class="overflow-y-scroll h-3/6 w-full  ">
                    @foreach($meta as $m)
                    <div id=boxes>
                        {{ $m->name }}
                        <input type="checkbox" class="checkitem" id="box" name={{ $m->id }}><br>
                    </div>
                    @endforeach
                </div>

                <button class="bg-blue-500  my-8 mx-16 rounded p-2" id="btn">Ajouter Modele</button>
                <button class="bg-blue-500   rounded p-2" id="btn1">Uncheck All</button>
     
            </div>

           
        </div>
        
    </x-app-layout>


