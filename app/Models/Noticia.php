<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Noticia extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'url',
    ];

    public function scopeFilter(Builder $query, array $filters){
        if($title = $filters['title'] ?? false){
            $query->query('titulo', 'like', '%' .$title. '%');
        }

        if($descricao = $filters['descricao'] ?? false){
            $query->query('descricao', 'like', '%' .$descricao. '%');
        }
    }

    public function storeArquivo(UploadedFile $arquivo) {
        if($arquivo){
            $path = $arquivo->store('arquivos', 'public');
            $this->url = Storage::url($path);
            $this->save();
        }
    }
}
