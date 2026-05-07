<div {{ $attributes->merge(['class' => 'card shadow-sm']) }}>
    @if(isset($header))
        <div class="card-header bg-white font-weight-bold">
            {{ $header }}
        </div>
    @endif
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
