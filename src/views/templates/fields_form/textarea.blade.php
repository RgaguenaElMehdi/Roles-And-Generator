
 <div class="form-group">
    <label for="{{$name}}">{{ $name}}</label>
    <textarea   class="form-control"name="{{$name}}" id="{{$name}}">{{ '{{' }} old('{{$name}}',optional($item)->{{$name}}) }} </textarea>
</div>
