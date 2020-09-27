<div class="form-group mt-2">
        <label for="{{$field}}">{{$field}}</label>
        <textarea class="form-control"  id="{{$field}}" name="{{$field}}" rows="3">
        @isset ($value) {{old($field) ? old($field) : $value}}
        @else {{old($field)}} @endisset
        </textarea>
        
        
        @error($field)
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>