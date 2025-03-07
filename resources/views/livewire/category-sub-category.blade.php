<div>
    {{-- The best athlete wants his opponent at his best. --}}

    <p>Our category sub category Livewire componenet </p>

    <select class="form-control" wire:model.live="selectedCategory">
        	<option value=" ">Select a category </option>
        	@foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
    </select>
    <select class="form-control">
        <option value=" ">Select Sub category </option>
        @foreach ($subcategories as $subcategory)
            <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
        @endforeach
</select>



</div>
