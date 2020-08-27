{{-- regular object attribute --}}
@php
	$value = data_get($entry, $column['name']);
    $value = is_array($value) ? json_encode($value) : $value;

    $column['escaped'] = $column['escaped'] ?? true;
    $column['limit'] = $column['limit'] ?? 40;
    $column['text'] = Str::limit($value, $column['limit'], '[...]');
    $color="#888";
    $text="hors ligne";
    if (Cache::has('user-is-online-'.$column['text'])) {
        $color="#002687";
        $text="en ligne";
    }

@endphp


<span>
    @includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_start')
        @if($column['escaped'])
        
           <span class="" style="color: {{$color}}">{{$text}}</span>
            
        @else
            {!! $column['text'] !!}
        @endif
    @includeWhen(!empty($column['wrapper']), 'crud::columns.inc.wrapper_end')
</span>
