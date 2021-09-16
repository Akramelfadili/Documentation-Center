

<x-app-layout>
    <x-slot name="header">
    </x-slot>

        <div>
           
        </div>
    <div class=" bg-white rounded-lg m-4 max-w-7xl mx-auto px-4 ">
        <form action="#"  id="edit_form" class="{{ $document_id }}"> 

            <div>
                <label for="">Classe Document</label>
                <select style="display: block;" class="class_select">
                    @for($i = 0; $i <count($classes); $i++)
                        @if( $classes[$i]->id == $classe_doc)
                            <option selected value=" {{ $classes[$i]->classe_name }}" >{{ $classes[$i]->classe_name }}</option>
                        @else
                            <option value="{{ $classes[$i]->classe_name }}" >{{ $classes[$i]->classe_name }}</option>
                        @endif
                    @endfor
                </select><br>
            </div>

            @for($i = 0; $i < count($array); $i++)
                <div>
                    <label >{{ $array[$i] }}</label> <input type="text"  value="{{ $values[$i]->value }}" name="{{ $IDS[$i] }}"><br>
                </div>
            @endfor
            <a href="#" id="submit_data" class="border rounded-lg text-white   p-2 bg-blue-700">Save</a>
        </form>
    </div>

</x-app-layout>