<label class="mb-2 block text-x font-medium text-slate-900" for="{{ $for }}">
    {{ $slot }} @if ($required)
        <span class="text-red-500">*</span>
    @endif
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
</label>
