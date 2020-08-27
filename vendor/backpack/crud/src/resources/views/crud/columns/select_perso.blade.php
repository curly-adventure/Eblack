{{-- single relationships (1-1, 1-n) --}}
@php
    $column['escaped'] = $column['escaped'] ?? true;
    $column['limit'] = $column['limit'] ?? 40;
    $column['attribute'] = $column['attribute'] ?? (new $column['model'])->identifiableAttribute();

    $attributes = $crud->getRelatedEntriesAttributes($entry, $column['entity'], $column['attribute']);
    foreach ($attributes as $key => $text) {
        $text = Str::limit($text, $column['limit'], '[...]');
    }
    switch ($text) {
        case 'Attente':$back="rgb(58, 230, 59)" ;
            break;
        case 'Traitement':$back="orange" ;
            break;
        case 'Livrer':$back="blue";
            break;
        case 'Annuler':$back="red";
            break;
        default:
            $back="black";
            break;
    }
@endphp

<span style="background: {{$back}};color:white" class="p-1">
    @if(count($attributes))
        @foreach($attributes as $key => $text)
            @php
                $related_key = $key;
                
            @endphp
            
            <span class="d-inline-flex" >
                @includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start')
                    
                    @if($column['escaped'])
                        <p>{{ $text }}</p>
                    @else
                        {!! $text !!}
                    @endif
                @includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end')

                @if(!$loop->last), @endif
            </span>
        @endforeach
    @else
        -
    @endif
</span>
