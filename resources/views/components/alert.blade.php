@if(session($type ?? 'success'))
    <div {{ $attributes->merge(['class' => 'alert alert-' . ($type ?? 'success')]) }} role="alert">
        {{ session($type ?? 'success') }}
    </div>
@endif
