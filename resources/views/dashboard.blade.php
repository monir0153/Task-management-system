<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-4 sm:px-6 lg:px-8 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- admin section --}}
                @if (auth()->user()->isAdmin())
                    @include('Admin.index');
                @else
                    @include('Task.index')
                @endif
                {{-- user section --}}

            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // const addTask = document.querySelector('#addTask');
    // addTask.addEventListener('click', () => {
    //     const form = `<tr>
    //                     <form action="">
    //                     <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
    //                         <x-text-input class="block mt-1 w-full" type="text" name="title" required autocomplete="title" />
    //                         <x-input-error :messages="$errors->get('title')" class="mt-2" />
    //                     </td>
    //                     <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
    //                         <x-text-input class="block mt-1 w-full" type="text" name="description" required autocomplete="description" />
    //                         <x-input-error :messages="$errors->get('description')" class="mt-2" />
    //                     </td>
    //                     <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
    //                         <x-text-input class="block mt-1 w-full" type="text" name="description" required autocomplete="description" />
    //                         <x-input-error :messages="$errors->get('description')" class="mt-2" />
    //                     </td>
    //                     <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
    //                         Member
    //                     </td>
    //                     <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
    //                         <x-primary-button class="ms-4">
    //                             {{ __('Submit') }}
    //                         </x-primary-button>
    //                         <x-primary-button class="ms-4 cancel" onclick='removeForm(this)'>
    //                             {{ __('Cancel') }}
    //                         </x-primary-button>
    //                     </td>
    //                 </tr> `;

    //     // Append the new form row to the tbody
    //     document.querySelector('.tbody').insertAdjacentHTML('beforeend', form);

    // });

    // function removeForm(btn) {
    //     btn.closest('tr').remove();
    // }
</script>
