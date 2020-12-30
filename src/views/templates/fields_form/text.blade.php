
<div class="form-group">
    <label for="{{$name}}" >{{ $name}}</label>
    <input type="{{$field}}" step="{{isset($step)? '$step' : ''}}" class="form-control" name="{{$name}}" id="{{$name}}" value="{{ '{{' }} old('{{$name}}',optional($item)->{{$name}}) }}">
</div>
