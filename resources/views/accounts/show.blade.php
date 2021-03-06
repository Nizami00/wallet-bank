<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Transactions History: Account Number ') }} {{ __($account->number) }} {{__(strtoupper($account->currency))}}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    From User
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    To User
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Description
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Amount
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date
                                                </th>

                                            </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse($transactions as $transaction)
                                                <?php $toUser = \App\Models\User::where('id', $transaction->to_user)->first();?>
                                                <?php $fromUser = \App\Models\User::where('id', $transaction->from_user)->first();?>
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="text-sm  text-gray-900">
                                                    <div class="text-left">{{$fromUser->name}}</div>
                                                    {{$transaction->from_account}}
                                                </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            <div class="text-left">{{$toUser->name}}</div>
                                                            {{$transaction->to_account}}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{$transaction->description}}
                                                        </div>
                                                    </td>
                                                    <td class="px-6  py-4 whitespace-nowrap">
                                                        <div class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $toUser->id == \Auth::user()->id ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                            {{ $toUser->id == \Auth::user()->id ? '+' : '-' }}
                                                            @if ($toUser->id == \Auth::user()->id)
                                                                @convertMoney($transaction->amount_to)
                                                            @else
                                                                @convertMoney($transaction->amount_from)
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">
                                                            {{$transaction->created_at}}
                                                        </div>
                                                    </td>

                                                </tr>

                                                </tr>
                                            @empty
                                            @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>

