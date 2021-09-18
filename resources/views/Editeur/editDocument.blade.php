

<x-app-layout>
    <x-slot name="header">
    </x-slot>

        
    <div class="flex flex-col items-center p-16 mt-10 bg-white rounded-lg m-5 max-w-5xl mx-auto">

        <div class="bg-green-100 border text-right border-green-400 text-green-700 px-4 py-3 rounded relative m-4" role="alert" id="document_updated" style="display:none">
            <span class="block sm:inline pr-16">Document modifié avec succes.</span>
        </div>


        <div class=" p-6 mb-6 ml-96" >
            <a href="{{ route("editeur.doc") }}" class="text-blue-700  inline-flex  font-semibold tracking-wide">
                <span class="hover:underline">
                        Retour
                </span>
                <span class="text-xl ml-2">&#8594;</span>
            </a>
        </div>

        <form action="#"  id="edit_form" class="{{ $document_id }}" > 

            <div class="flex flex-row">
                <div class="mt-3 mr-6 font-bold"> <label >Class Document :</label></div>
               
             <div>
                <select style="display: block;" class="class_select border border-gray-300 p-2 mt-1 rounded-md focus:outline-none focus:ring-2 ring-blue-200" ">
                    @for($i = 0; $i <count($classes); $i++)
                        @if( $classes[$i]->id == $classe_doc)
                            <option selected value=" {{ $classes[$i]->classe_name }}" class="" >{{ $classes[$i]->classe_name }}</option>
                        @else
                            <option value="{{ $classes[$i]->classe_name }}" >{{ $classes[$i]->classe_name }}</option>
                        @endif
                    @endfor
                </select>
            </div>
            </div>
   
           
            <div class="mt-6">
                <table>
                    <tbody>
                        @for($i = 0; $i < count($array); $i++)
                        <tr>
                            <td>  <label class="mr-6">{{ $array[$i] }} :</label></td>
                            <td> <input type="text"  value="{{ $values[$i]->value }}" name="{{ $IDS[$i] }}" class="border border-gray-300 p-2 mt-1 rounded-md focus:outline-none focus:ring-2 ring-blue-200" "><br></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
                
                    
            </div>

               <div class="mt-6 ml-32 w-32">
                <a href="#" id="submit_data" class="border rounded-lg text-white h-12 px-6    p-2 bg-blue-700 mb-32">Save</a>
               </div>
            
        </form>

    </div>

</x-app-layout>