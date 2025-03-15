<div>
    {{-- The best athlete wants his opponent at his best. --}}



    <label for="category_id" class="fw-bold mb-2">Select a category for your Product</label>
    <select class="form-control mb-2" name="category_id" wire:model.live="selectedCategory">
        	<option value=" ">Select a category </option>
        	@foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
    </select>

    <label for="subcategory_id" class="fw-bold mb-2">Select a sub category for your Product</label>

    <select class="form-control mb-2" name="subcategory_id">
        <option value=" ">Select Sub category </option>
        @foreach ($subcategories as $subcategory)
            <option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
        @endforeach
</select>



</div>
