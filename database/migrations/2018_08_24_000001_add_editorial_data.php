<?php

use App\Data\Models\Editorial;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEditorialData extends Migration
{
    public function up()
    {
        Editorial::truncate();

        Editorial::create([
            'text' => trim(
                '
**Jornalista responsável:** Celia Abend

**Editor:** André Coelho

**Coordenação:** Daniela Matta e Jorge Ramos
Equipe: Buanna Rosa, Camilla Pontes, Gherson Murillo, Gustavo Natario, Hélio Lopes, Isabela Cabral, Leon Lucius, Márcia Manga, Octacílio Barbosa (foto), Tainah Vieira, Thiago Lontra (foto), Symone Munay, Vanessa Schumacker e Wagner da Silva

**Edição de Arte:** Daniel Tiriba

**Editor de Fotografia:** Rafael Wallace

**Secretária da Redação:** Regina Torres

**Estagiários:** Audryn Karolyne, David Barbosa, Julia Passos (foto) e Luan Damasceno
'
            )
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('editorial');
    }
}
