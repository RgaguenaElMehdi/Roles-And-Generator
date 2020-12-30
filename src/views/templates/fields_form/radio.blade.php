<div class="form-group">
    <label class="col-form-label" for="{{$name}}">{{$name}}</label>
    @foreach($choices as $choice)
        <div class="form-check">
            <input class="form-check-input" type="radio" id="{{$choice}}" name="{{$name}}" value="{{$choice}}" {{ '{{' }} isset($item) && $item->{{$name}} == '{{$choice}}' ? 'checked' : ''}}  >
            <label for="{{$name}}" class="form-check-label">{{$choice}}</label>
        </div>
    @endforeach

</div>
