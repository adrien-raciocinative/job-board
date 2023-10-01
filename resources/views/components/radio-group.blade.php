<div {{ $attributes}}>
    <label for="{{ $name }}" class="mb-1 space-x-2 flex items-center text-sm font-medium text-slate-500">
        <input type="radio" name="{{ $name }}" value="" @checked(!request($name)) />
        <span>All</span>
    </label>
    @foreach ($options as $option)
        <label for="{{ $name }}" class="mb-1 space-x-2 flex items-center text-sm font-medium text-slate-500">
            <input type="radio" name="{{ $name }}" value="{{ $option }}" @checked(request($name) == $option) />
            <span>{{ Str::ucfirst($option) }}</span>
        </label>
    @endforeach

</div>
