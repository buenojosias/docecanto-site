<?php

namespace App\Http\Livewire\Song;

use App\Models\Song;
use Livewire\Component;
use WireUi\Traits\Actions;

class SongForm extends Component
{
    use Actions;

    public $song;
    public $categories;
    public $songId, $number, $title, $resume, $lyrics, $fulltext, $detached;
    public $action;

    public function mount($number = null)
    {
        if ($number) {
            $this->song = Song::query()->where('number', $number)->firstOrFail();
            $this->parseLoadLyrics();
            $this->songId = $this->song->id;
            $this->number = $this->song->number;
            $this->title = $this->song->title;
            $this->resume = $this->song->resume;
            // $this->lyrics = $this->song->lyrics;
            $this->fulltext = $this->song->fulltext;
            $this->detached = $this->song->detached;
            $this->action = 'edit';
        } else {
            $this->action = 'create';
        }
    }

    public function submit()
    {
        $this->parseSaveLyrics();
        $this->generateFullText();
        if ($this->action === 'create') {
            $data = $this->validate([
                'number' => 'required|integer|unique:songs,number',
                'title' => 'required|string',
                'resume' => 'required|string|max:255',
                'lyrics' => 'required',
                'fulltext' => 'required|string',
            ]);
            try {
                $this->song = Song::query()->create($data);
                $this->songId = $this->song->id;
                $this->action = 'edit';
                $this->notification()->success($description = 'Música cadastrada com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao cadastrar música');
                dd($th);
            }
        } else {
            $data = $this->validate([
                'number' => 'required|integer|unique:songs,number,'.$this->songId,
                'title' => 'required|string',
                'resume' => 'required|string|max:255',
                'lyrics' => 'required',
                'fulltext' => 'required|string',
            ]);
            try {
                Song::query()->findOrFail($this->songId)->update($data);
                $this->notification()->success($description = 'Alterações salvas com sucesso.');
            } catch (\Throwable $th) {
                $this->notification()->error($description = 'Erro ao salvar alterações');
                dd($th);
            }
        }
    }

    public function parseLoadLyrics()
    {
        $removeDoubleP = str_replace("</p><p>", '</p><p></p><p>', $this->song->lyrics);
        $convertBr2P = str_replace("<br>", '</p><p>', $removeDoubleP);
        $this->lyrics = $convertBr2P;
    }

    public function parseSaveLyrics()
    {
        $removeClass = str_replace(array(' class="LetrasCxSpFirst"', ' class="LetrasCxSpMiddle"', ' class="LetrasCxSpLast"'), '', $this->lyrics);
        $removeN = str_replace("</p>\n<p>", '<br>', $removeClass);
        $removeDoubleBr = str_replace("<br>&nbsp;<br>", '</p><p></p><p>', $removeN);
        $convertP2Br = str_replace("</p><p>", '<br>', $removeDoubleBr);
        $convertDoubleBrToP = str_replace("<br><br>", '</p><p>', $convertP2Br);
        $this->lyrics = $convertDoubleBrToP;
    }

    public function generateFullText()
    {
        $removeTags = preg_replace('#<[^>]+>#', ' ', $this->lyrics);
        $removeWhiteSpaces = preg_replace('#\s+#', ' ', $removeTags);
        $removeSpecialCharacters = preg_replace(array("/(&aacute;|&agrave;|&atilde;|&acirc;|&auml;|&Aacute;|&Agrave;|&Atilde;|&Acirc;|&Auml;)/","/(&eacute;|&egrave;|&ecirc;|&euml;|&Eacute;|&Egrave;|&Ecirc;|&Euml;)/","/(&iacute;|&igrave;|&icirc;|&iuml;|&Iacute;|&Igrave;|&Icirc;|&Iuml;)/","/(&oacute;|&ograve;|&otilde;|&ocirc;|&ouml;|&Oacute;|&Ograve;|&Otilde;|&Ocirc;|&Ouml;)/","/(&uacute;|&ugrave;|&ucirc;|&uuml;|&Uacute;|&Ugrave;|&Ucirc;|&Uuml;)/","/(ç|Ç)/","/(&ntilde;|&Ntilde;)/","/(1. |2. |3. |4. |5. |6. |(2x)|(bis))/"),explode(" ","a e i o u c n "), $removeWhiteSpaces);
        $trim = trim($removeSpecialCharacters);
        $this->fulltext = \Str::slug($trim, ' ');
    }

    public function render()
    {
        $this->correctFullText();
        return view('livewire.song.song-form');
    }

    public function correctFullText()
    {
        foreach(Song::all() as $song) {
            $removeTags = preg_replace('#<[^>]+>#', ' ', $song->lyrics);
            $removeWhiteSpaces = preg_replace('#\s+#', ' ', $removeTags);
            $removeSpecialCharacters = preg_replace(array("/(&aacute;|&agrave;|&atilde;|&acirc;|&auml;|&Aacute;|&Agrave;|&Atilde;|&Acirc;|&Auml;)/","/(&eacute;|&egrave;|&ecirc;|&euml;|&Eacute;|&Egrave;|&Ecirc;|&Euml;)/","/(&iacute;|&igrave;|&icirc;|&iuml;|&Iacute;|&Igrave;|&Icirc;|&Iuml;)/","/(&oacute;|&ograve;|&otilde;|&ocirc;|&ouml;|&Oacute;|&Ograve;|&Otilde;|&Ocirc;|&Ouml;)/","/(&uacute;|&ugrave;|&ucirc;|&uuml;|&Uacute;|&Ugrave;|&Ucirc;|&Uuml;)/","/(ç|Ç)/","/(&ntilde;|&Ntilde;)/","/(1. |2. |3. |4. |5. |6. |(2x)|(bis))/"),explode(" ","a e i o u c n "), $removeWhiteSpaces);
            $trim = trim($removeSpecialCharacters);
            $fulltext = \Str::slug($trim, ' ');
            $song->update(['fulltext' => $fulltext]);
        }
    }
}
