
    
    <x-app-layout>
        <x-slot name="header">
        </x-slot>
    
        <div class="bg-white rounded-lg m-4 max-w-7xl mx-auto px-4 py-6 my-32 sm:px-6 lg:px-8">
                <div>
                   <div>
                       <h1>Que cherchez vous dans notre centre documentaire ?</h1>
                    <select name="" id="method_search_select">
                        <option selected disabled>----Choisir mode de recherche----</option>
                        <option value="Recherche Libre">Recherche Libre</option>
                        <option value="Recherche selon Metadonnees">Recherche selon Metadonnees</option>
                    </select>
                   </div>

                   <div id="based_select" style="display:none">
                        <label for="">Auteur</label> <input type="checkbox"  name="Auteur">
                        <label for="">Titre </label> <input type="checkbox" name="Titre">
                   </div>
                   <br>
                   <div id="input_recherche_libre">
                    <input type="text" class="recheche_input_text"  > <br><button id="btn_recherche_doc"> Rechercher</button>
                   </div>
                </div>
        </div>
    </x-app-layout>
