<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Noticia extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'titulo',
        'descricao',
        'url',
    ];

    public function scopeFilter(Builder $query, array $filters)
    {
        //Filtrar pelo titulo
        if(!empty($filters['title'])){
            $query->where('titulo', 'like', '%' .$filters['title']. '%');
        }

        //Filtrar pela descrição
        if(!empty($filters['description'])){
            $query->where('descricao', 'like', '%' .$filters['description']. '%');
        }
    }

    public function storeArquivo(UploadedFile $arquivo) {
        if($arquivo){
            $path = $arquivo->store('arquivos', 'public');
            $this->url = Storage::url($path);
            $this->save(); 
        }
    }

   public function toSearchableArray()
   {
    return [
        'id'=>$this->id,
        'titulo'=>$this->titulo,
        'descricao'=>$this->descricao
    ];
   }
}
