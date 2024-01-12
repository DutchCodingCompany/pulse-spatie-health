<x-pulse::card id="pulse-spatie-health" :cols="$cols" :rows="$rows" :class="$class" wire:poll.5s="">
    <x-pulse::card-header
            name="Spatie Health Checks"
            details="Check results from: {{ $latestResults?->finishedAt->diffForHumans() ?? '-' }}"
    >
        <x-slot:icon>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 stroke-gray-300 dark:stroke-gray-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
        </x-slot:icon>
    </x-pulse::card-header>

    <x-pulse::scroll :expand="$expand">
        @if (is_null($latestResults))
            <x-pulse::no-results />
        @else
            <x-pulse::table>
                <colgroup>
                    <col width="0%" />
                    <col width="20%" />
                    <col width="90%" />
                </colgroup>
                <x-pulse::thead>
                    <tr>
                        <x-pulse::th>Result</x-pulse::th>
                        <x-pulse::th>Check</x-pulse::th>
                        <x-pulse::th class="text-right">Message</x-pulse::th>
                    </tr>
                </x-pulse::thead>
                <tbody>
                @foreach($latestResults->storedCheckResults as $result)
                    <tr class="h-2 first:h-0"></tr>
                    <tr wire:key="{{ $result->name }}">
                        <x-pulse::td>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 {{ $this->getIconColor($result->status) }}">
                                @if($this->getIcon($result->status) === 'check-circle')
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                @elseif($this->getIcon($result->status) === 'exclamation-circle')
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                @elseif($this->getIcon($result->status) === 'arrow-circle-right')
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                @elseif($this->getIcon($result->status) === 'x-circle')
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                @else
                                    <!-- Question mark icon -->
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                @endif
                            </svg>
                        </x-pulse::td>
                        <x-pulse::td>
                            {{ $result->label }}
                        </x-pulse::td>
                        <x-pulse::td numeric class="text-gray-700 dark:text-gray-300 font-bold">
                            @if (!empty($result->notificationMessage))
                                {{ $result->notificationMessage }}
                            @else
                                {{ $result->shortSummary }}
                            @endif
                        </x-pulse::td>
                    </tr>
                @endforeach
                </tbody>
            </x-pulse::table>
        @endif
    </x-pulse::scroll>
</x-pulse::card>
