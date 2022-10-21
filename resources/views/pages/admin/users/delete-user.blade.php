<div x-data="{open:false}" class="inline">
    <button x-on:click="open = true"
        class="px-4 py-2 font-medium text-xs inline-flex items-center justify-center border border-transparent rounded leading-5 shadow-sm transition duration-150 ease-in-out bg-red-500 hover:bg-red-600 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        <span class="xs:block text-xs ml-2">Delete this user</span>
    </button>
    <div x-show="open" x-cloak x-on:click="open = false"
        class="bg-black/40 z-[500] fixed top-0 bottom-0 right-0 left-0">
    </div>
    {{-- delete modal --}}
    <div x-show="open" x-cloak>
        <div class="absolute top-2/4 left-2/4" style="z-index: 501; transform: translate(-50%, -50%)">
            <div class="p-4 text-left bg-white shadow-lg rounded-lg" style="width: 28rem">
                <header class="text-sm text-gray-800 font-bold mb-2">
                    Are you sure?
                </header>
                <p class="text-xs">
                    This action will permanently remove <span class="font-bold capitalize">{{
                        $user->user_patient_first_name
                        }}</span>.
                    This cannot be undone.
                </p>
                {{-- delete medicine --}}
                <div class="flex justify-end gap-2 mt-4">
                    <div x-on:click="open = false"
                        class="text-xs py-1 px-4 cursor-pointer text-gray-600 border border-gray-400 bg-gray-50 hover:border-gray-600 rounded-md">
                        Cancel
                    </div>
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}">
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
