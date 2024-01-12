module.exports = {
    darkMode: "class",
    important: "#pulse-spatie-health",
    content: ["./resources/views/livewire/health-check.blade.php"],
    corePlugins: {
        preflight: false,
    },
    safelist: [
        'text-emerald-500',
        'text-yellow-500',
        'text-blue-500',
        'text-red-500',
        'text-gray-500',
    ],
};
