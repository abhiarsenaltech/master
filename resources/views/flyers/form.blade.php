
<div class="form-group">
    <label for="street">Street:</label>
    <input type="text" id="street" class="form-control" name="street" value=""  style='width: 50%;' required>
</div>


<div>
    <label for="street">City:</label>
    <input type="text" id="city" class="form-control" name="city" value=""  style='width: 50%;' required>
</div>

<div>
    <label for="street">Zip/Postal Code:</label>
    <input type="text" id="zip" class="form-control" name="zip" value=""  style='width: 50%;' required>
</div>
<div>
    <label for="street">Country:</label>
    <select id="country" class="form-control" name="country"  style='width: 50%;' required>
        <option>Select Country</option>
        @foreach($countries::all() as $country => $code)
            <option value="{{ $code }}">{{ $country }}</option>
        @endforeach

    </select>
</div>
<div>
    <label for="street">State:</label>
    <input type="text" id="state" class="form-control" name="state" value=""  style='width: 50%;' required>
</div>
<div>
    <label for="street">Sale Price:</label>
    <input type="text" id="price" class="form-control" name="price" value=""  style='width: 50%;'>
</div>
<div>
    <label for="street">Home Description:</label>
    <textarea id="description" class="form-control" name="description" value=""  style='width: 50%;' required></textarea>
</div>
<div>
    <label for="street">Photos:</label>
    <input type="file" class="form-control" name="photos" value=""  id="photos" style='width: 50%;' required></textarea>
</div>

<div>
    <button type="submit"  class="btn btn-default">Create Flyer</button>
</div>