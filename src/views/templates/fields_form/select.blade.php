<div class="form-group">
    <label>{{$name}}</label>
    <select class="form-control" id="{{$name}}" name="{{$name}}">
    @foreach($choices as $choice)
        <option value="{{$choice}}"  {{ '{{' }} isset($item) && $item->{{$name}} == '{{$choice}}' ? 'selected' : ''}}>{{$choice}}</option>
    @endforeach
</select>
</div>
