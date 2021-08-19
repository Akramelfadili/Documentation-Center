

<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div>
        <form action="#"  id="edit_form" class="{{ $document_id }}"> 
            @for($i = 0; $i < count($array); $i++)
            <label >{{ $array[$i] }}</label> <input type="text"  value="{{ $values[$i]->value }}" name="{{ $IDS[$i] }}"><br>
            @endfor
            <a href="#" id="submit_data">Save</a>
        </form>
    </div>
   
</x-app-layout>