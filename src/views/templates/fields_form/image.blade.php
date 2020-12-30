<div class="form-group">
    <label for="{{ $name}}">{{ $name}}</label>
    <div class="input-group">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="{{ $name}}" name="{{ $name}}">
        <label class="custom-file-label" for="{{ $name}}">Choose file</label>
    </div>
        @@isset($item)
        <div class="input-group-append">
            <a href="{{ '{{' }} URL::asset(  'storage/'.$item->{{ $name}} ) }}" target="_blank" class="input-group-text"><img src="{{ '{{' }} URL::asset(  'storage/'.$item->{{ $name}}  )}}" height="20" alt="N/A"/></a>
        </div>
        @@endisset
    </div>
</div>
