<div class="relative">
    @if ('textarea' != $type)
        @if ($formRef)
            <button type="button" class="flex absolute right-0 top-0 h-full items-center pr-2"
                @click="$refs['input-{{ $name }}'].value = ''; $refs['{{ $formRef }}'].submit();">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4 text-slate-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
        <input x-ref="input-{{ $name }}" type="{{ $type }}" name="{{ $name }}"
            placeholder="{{ $placeholder }}" value="{{ $value }}" id="{{ $name }}"
            @class([
                'w-full rounded-md border-0 py-1.5 px-2.5 ring-1 placeholder:text-slate-400 fucus:ring-1',
                'pr-8' => $formRef,
                'ring-slate-300' => !$errors->has($name),
                'ring-red-300' => $errors->has($name),
            ]) />
    @else
        <textarea id="{{ $name }}" name="{{ $name }}" @class([
            'w-full rounded-md border-0 py-1.5 px-2.5 ring-1 placeholder:text-slate-400 fucus:ring-1',
            'pr-8' => $formRef,
            'ring-slate-300' => !$errors->has($name),
            'ring-red-300' => $errors->has($name),
        ])>{{ old($name, $value) }}</textarea>
    @endif
    @error($name)
        <div class="mt-1 test-sm text-red-500">
            {{ $message }}
        </div>
    @enderror
</div>
