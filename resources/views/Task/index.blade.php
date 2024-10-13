<div>
    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">My Task</h2>
    <p class="text-gray-600 dark:text-gray-300">A list of all Task</p>
</div>
<div class="overflow-hidden mt-6">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                    Title
                </th>
                <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                    Description
                </th>
                <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider dark:text-gray-300">
                    Status
                </th>
                <th class="px-6 py-3"></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700 tbody">
            @if ($userTask->count() > 0)
                @foreach ($userTask as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                            {{ $item->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            {{ $item->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                            <form action="{{ route('user.taskStatus', $item->id) }}" method="POST">
                                @csrf
                                <select name="status"
                                    class="text-sm text-gray-500 dark:text-gray-100 rounded-md bg-gray-100 dark:bg-gray-800"
                                    onchange="this.form.submit()">
                                    <option value="{{ \App\Constants\Status::PENDING }}"
                                        {{ $item->status == \App\Constants\Status::PENDING ? 'selected' : '' }}>
                                        {{ \App\Constants\Status::PENDING }}
                                    </option>
                                    <option value="{{ \App\Constants\Status::INPROGRESS }}"
                                        {{ $item->status == \App\Constants\Status::INPROGRESS ? 'selected' : '' }}>
                                        {{ \App\Constants\Status::INPROGRESS }}
                                    </option>
                                    <option value="{{ \App\Constants\Status::COMPLETE }}"
                                        {{ $item->status == \App\Constants\Status::COMPLETE ? 'selected' : '' }}>
                                        {{ \App\Constants\Status::COMPLETE }}
                                    </option>

                                </select>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#"
                                class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-300">Edit</a>
                        </td>
                    </tr>
                @endforeach
            @endif

        </tbody>
    </table>
</div>
