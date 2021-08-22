

<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <form action="#"  id="edit_form" class="{{ $document_id }}"> 
            <label for="">Classe Document</label>
            <select style="display: block;">
                @for($i = 0; $i <count($classes); $i++)
                    @if( $classes[$i]->id == $classe_doc)
                        <option selected value=" {{ $classes[$i]->classe_name }}" >{{ $classes[$i]->classe_name }}</option>
                    @else
                        <option value="{{ $classes[$i]->classe_name }}" >{{ $classes[$i]->classe_name }}</option>
                    @endif
                @endfor
            </select><br>

            @for($i = 0; $i < count($array); $i++)
            <label >{{ $array[$i] }}</label> <input type="text"  value="{{ $values[$i]->value }}" name="{{ $IDS[$i] }}"><br>
            @endfor
            <a href="#" id="submit_data">Save</a>
        </form>
    </div>
   
</x-app-layout>