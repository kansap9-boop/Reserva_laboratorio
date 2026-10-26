<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-5 py-3 text-xs font-semibold uppercase tracking-wider text-slate-700 shadow-sm transition hover:bg-slate-50 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-50']) }}>
    {{ $slot }}
</button>
