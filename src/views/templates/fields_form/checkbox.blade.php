<div class="form-group">
        <div class="form-check">
                <input class="form-check-input" type="checkbox" id="{{ $name}}" name="{{ $name}}" {{ '{{' }} isset($item) && $item->{{$name}} ? 'checked' : ''}} >
                <label for="{{ $name}}" class="form-check-label">{{ $name}}</label>
        </div>
</div>
