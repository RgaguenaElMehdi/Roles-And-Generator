namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use File;

@foreach($imports as $import)
use App\Models\{{$import}};
@endforeach

class {{ $name }} extends Model
{
    use HasFactory;

    @if( $useTimestamp == true)
        public $timestamps = true;
    @else
        public $timestamps = false;
    @endif
    protected $fillable = [ @foreach( $fields as $field) '{{ $field}}', @endforeach];

    @foreach($foreigns as $foreign)

        @if(isset($foreign->fkField) && $foreign->type == "belongsTo")
        public function {{ $foreign->name}}(){
            @if(isset($foreign->fkField))
            return $this->belongsTo({{$foreign->fkClass}}::class,'{{$foreign->fkField}}');
            @else
            return $this->belongsTo({{$foreign->fkClass}}::class);
            @endif
        }
        @endif


        @if(isset($foreign->fkField) && $foreign->type == "hasMany")
        public function {{ $foreign->name}}(){
            @if(isset($foreign->fkField))
            return $this->hasMany({{$foreign->fkClass}}::class,'{{$foreign->fkField}}');
            @else
            return $this->hasMany({{$foreign->fkClass}}::class);
            @endif
        }
        @endif


    @endforeach

    @foreach($files as $file)

        public function delete{{$file}}(){
            $oldFilePath=public_path()."/storage/".$this->{{$file}};
            File::delete($oldFilePath);

        }


    @endforeach
}
