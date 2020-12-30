namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{{ $name }};
use File;

@foreach($imports as $import)
use App\Models\{{$import}};
@endforeach



class {{ $name }}Controller extends Controller
{

    public function index()
    {
        $items = {{ $name }}::all();
        return view('{{ $LCPName }}.index',compact('items'));
    }

    public function create()
    {
        @if(!empty($foreigns))
          @php $compactVars = "" @endphp
          @foreach($foreigns as $foreign)
             @if(isset($foreign->field) && $foreign->type == "belongsTo")
             ${{$foreign->field}}s = {{$foreign->fkClass}}::all('id','{{ $foreign->displayField}} as text');
             @php $compactVars = $compactVars."'".$foreign->field."s'," @endphp
             @endif
          @endforeach

          @if( $compactVars != "")
            return view('{{ $LCPName }}.create',compact({!! $compactVars !!}  ));
          @else
            return view('{{ $LCPName }}.create');
          @endif
        @else

          return view('{{ $LCPName }}.create');

        @endif
    }

    public function store(Request $request)
    {
        $request->validate([
            @foreach($validations as $validation)
                {!! $validation !!}
            @endforeach
        ]);

        $requestData = $request->all();

        @foreach($fields as $index=>$field)
            @if( $field->type == 'boolean')
                @include("templates.fields_form.checkbox_validation", ['name' => "$field->name"])
            @endif

            @if(isset($field->file))
                if($request->hasFile('{{$field->name}}')){
                    $path = $request->{{$field->name}}->store('uploads','public');
                    $requestData['{{$field->name}}'] = $path;
                }
            @endif
        @endforeach

        {{ $name }}::create($requestData);

        return redirect()->route('{{ $LCPName }}.index')->with('success','created successfully');
    }

    public function edit($id)
    {

        $item = {{ $name }}::findOrFail($id);

        @if(!empty($foreigns))
          @php $compactVars = "" @endphp
          @foreach($foreigns as $foreign)
              @if(isset($foreign->field) && $foreign->type == "belongsTo")
             ${{$foreign->field}}s = {{$foreign->fkClass}}::all('id','{{$foreign->displayField}} as text');
             @php $compactVars = $compactVars."'".$foreign->field."s'," @endphp
             @endif
          @endforeach
          @if( $compactVars != "")
          return view('{{ $LCPName }}.edit',compact('item',{!! $compactVars !!}));
          @else
          return view('{{ $LCPName }}.edit',compact('item'));
          @endif
        @else

        return view('{{ $LCPName }}.edit',compact('item'));

        @endif



    }



    public function show($id)
    {
        return view('{{ strtolower($name) }}s.show');
    }


    public function update(Request $request, $id)
    {

        $item = {{ $name }}::findOrFail($id);

        $request->validate([
            @foreach($validations as $validation)
                {!! $validation !!}
            @endforeach
        ]);

        $requestData = $request->all();

        @foreach($fields as $index=>$field)
            @if( $field->type == 'boolean')
                @include("templates.fields_form.checkbox_validation", ['name' => "$field->name"])
            @endif

            @if(isset($field->file))
                if($request->hasFile('{{$field->name}}')){
                    $oldFilePath=public_path()."/storage/".$item->{{$field->name}};
                    File::delete($oldFilePath);
                    $path = $request->{{$field->name}}->store('uploads','public');
                    $requestData['{{$field->name}}'] = $path;
                }
            @endif

        @endforeach

        $item->update($requestData);

        return redirect()->route('{{ $LCPName }}.index')->with('success','updated successfully');
    }

    public function destroy($id)
    {
        $item={{ $name }}::findOrFail($id);
        @foreach($fields as $index=>$field)
            @if(isset($field->file))
                $item->delete{{$field->name}}();
            @endif
        @endforeach
        $item->delete();
        return redirect()->route('{{ $LCPName }}.index')->with('success','deleted successfully');
    }
}
