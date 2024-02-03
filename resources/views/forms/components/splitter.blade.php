@php
    $label = $getLabel();
@endphp
<div class="relative flex items-center">
    <div class="flex-grow border-t border-gray-400 dark:border-gray-600"></div>
    @if(filled($label))
        <span class="flex-shrink px-2 text-gray-400 dark:text-gray-600">{{ $label }}</span>
        <div class="flex-grow border-t border-gray-400 dark:border-gray-600"></div>
    @endif
</div>