<div
    class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-slate-200">
    <div class="px-5 py-5">
        <header class="flex justify-between items-start mb-2">
            <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="icon1-b">
                        <stop stop-color="#A5B4FC" offset="0%" />
                        <stop stop-color="#818CF8" offset="100%" />
                    </linearGradient>
                    <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="icon1-c">
                        <stop stop-color="#4338CA" offset="0%" />
                        <stop stop-color="#6366F1" stop-opacity="0" offset="100%" />
                    </linearGradient>
                    <path id="icon1-a" d="M16 0l16 32-16-5-16 5z" />
                </defs>
                <g transform="rotate(90 16 16)" fill="none" fill-rule="evenodd">
                    <mask id="icon1-d" fill="#fff">
                        <use xlink:href="#icon1-a" />
                    </mask>
                    <use fill="url(#icon1-b)" xlink:href="#icon1-a" />
                    <path fill="url(#icon1-c)" mask="url(#icon1-d)" d="M16-6h20v38H16z" />
                </g>
            </svg>
        </header>
        <h2 class="text-lg font-semibold text-slate-800 mb-2">Teaching</h2>
        <div class="flex items-start">
            <div class="text-3xl font-bold text-slate-800 mr-2">{{ $teaching_staffs_count }}</div>
        </div>
    </div>
</div>

<div
    class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-slate-200">
    <div class="px-5 py-5">
        <header class="flex justify-between items-start mb-2">
            <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="icon1-b">
                        <stop stop-color="#A5B4FC" offset="0%" />
                        <stop stop-color="#818CF8" offset="100%" />
                    </linearGradient>
                    <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="icon1-c">
                        <stop stop-color="#4338CA" offset="0%" />
                        <stop stop-color="#6366F1" stop-opacity="0" offset="100%" />
                    </linearGradient>
                    <path id="icon1-a" d="M16 0l16 32-16-5-16 5z" />
                </defs>
                <g transform="rotate(90 16 16)" fill="none" fill-rule="evenodd">
                    <mask id="icon1-d" fill="#fff">
                        <use xlink:href="#icon1-a" />
                    </mask>
                    <use fill="url(#icon1-b)" xlink:href="#icon1-a" />
                    <path fill="url(#icon1-c)" mask="url(#icon1-d)" d="M16-6h20v38H16z" />
                </g>
            </svg>
        </header>
        <h2 class="text-lg font-semibold text-slate-800 mb-2">Non-teaching staff</h2>
        <div class="flex items-start">
            <div class="text-3xl font-bold text-slate-800 mr-2">{{ $non_teaching_staffs_count }}</div>
        </div>
    </div>
</div>

<div
    class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white shadow-lg rounded-sm border border-slate-200">
    <div class="px-5 py-5">
        <header class="flex justify-between items-start mb-2">
            <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="icon1-b">
                        <stop stop-color="#A5B4FC" offset="0%" />
                        <stop stop-color="#818CF8" offset="100%" />
                    </linearGradient>
                    <linearGradient x1="50%" y1="24.537%" x2="50%" y2="100%" id="icon1-c">
                        <stop stop-color="#4338CA" offset="0%" />
                        <stop stop-color="#6366F1" stop-opacity="0" offset="100%" />
                    </linearGradient>
                    <path id="icon1-a" d="M16 0l16 32-16-5-16 5z" />
                </defs>
                <g transform="rotate(90 16 16)" fill="none" fill-rule="evenodd">
                    <mask id="icon1-d" fill="#fff">
                        <use xlink:href="#icon1-a" />
                    </mask>
                    <use fill="url(#icon1-b)" xlink:href="#icon1-a" />
                    <path fill="url(#icon1-c)" mask="url(#icon1-d)" d="M16-6h20v38H16z" />
                </g>
            </svg>
        </header>
        <h2 class="text-lg font-semibold text-slate-800 mb-2">Students</h2>
        <div class="flex items-start">
            <div class="text-3xl font-bold text-slate-800 mr-2">{{ $students_count }}</div>
        </div>
    </div>
</div>
