<div x-data="{deleteEquipmentOpen:false}" class="inline">
    <button x-on:click="deleteEquipmentOpen = true"
        class="inline-flex items-center gap-1 bg-red-500 hover:bg-red-600 text-white p-1 px-5 rounded">
        <svg class="h-4 w-4 " viewBox="0 0 16 16" fill="#f5f5f5">
            <path
                d="M5 7h2v6H5V7zm4 0h2v6H9V7zm3-6v2h4v2h-1v10c0 .6-.4 1-1 1H2c-.6 0-1-.4-1-1V5H0V3h4V1c0-.6.4-1 1-1h6c.6 0 1 .4 1 1zM6 2v1h4V2H6zm7 3H3v9h10V5z">
            </path>
        </svg>
        Delete
    </button>
    <div x-show="deleteEquipmentOpen" x-cloak x-on:click="deleteEquipmentOpen = false"
        class="bg-black/40 z-[500] fixed top-0 bottom-0 right-0 left-0">
    </div>
    {{-- delete modal --}}
    <div x-show="deleteEquipmentOpen" x-cloak>
        <div class="absolute top-2/4 left-2/4" style="z-index: 501; transform: translate(-50%, -50%)">
            <div class="p-4 text-left bg-white shadow-lg rounded-lg" style="width: 28rem">
                <header class="text-sm text-gray-800 font-bold mb-2">
                    Are you sure?
                </header>
                <p class="text-xs">
                    This action will permanently delete <span class="font-bold">{{ $equipment->equipment_name
                        }}</span>.
                    This cannot be undone.
                </p>
                {{-- delete equipment --}}
                <div class="flex justify-end gap-2 mt-4">
                    <div x-on:click="deleteEquipmentOpen = false"
                        class="text-xs py-1 px-4 cursor-pointer text-gray-600 border border-gray-400 bg-gray-50 hover:border-gray-600 rounded-md">
                        Cancel
                    </div>
                    <form method="POST" action="/equipment/{{ $equipment->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-xs cursor-pointer py-1 px-4 bg-red-500 hover:bg-red-600 text-white rounded-md">
                            Yes, Delete it
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
