<x-app-layout>
    <div class="card">
        <form action="{{ route('media.store') }}" enctype="multipart/form-data" method="post">
            @csrf
        <div class="card-body display">
            <x-input type="file" name="image" id="image" label="Arquivo" />
        </div>
        <div class="card-footer">
            <x-button type="submit" primary label="Enviar" />
        </div>
    </form>
    </div>
</x-app-layout>
