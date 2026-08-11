@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full rounded-lg border-gray-300 px-4 py-2 focus:border-brand-500 focus:ring-brand-500 shadow-sm']) }}>
