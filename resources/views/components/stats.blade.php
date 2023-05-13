<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm rounded-lg p-4">
   
    <h2 class="text-gray-800 dark:text-gray-200 text-2xl">
        Statistics
    </h2>

    <div class="flex flex-col sm:flex-row justify-between mt-6 sm:mt-4 gap-4 sm:gap-0 test-sm">
        <p class="text-gray-800 dark:text-slate-100">
            <span class="font-semibold">
                Views: 
            </span>
            {{ $views }}
        </p>

        <p class="text-gray-800 dark:text-slate-100" title="Links impressions">
            <span class="font-semibold">
                Impressions: 
            </span>
            {{ $linksImpressions }}
        </p>

        <p class="text-gray-800 dark:text-slate-100 ">
            <span class="font-semibold">
                Clicks:
            </span>
            {{ $clicks }}
        </p>
        
        <p class="text-gray-800 dark:text-slate-100 ">
            <span class="font-semibold">
                CTR: 
            </span>
            {{ $ctr }}%
        </p>

    </div>
</div>