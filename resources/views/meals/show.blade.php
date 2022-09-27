<x-app-layout>
    <div class="container lg:w-3/4 md:w-4/5 w-11/12 mx-auto my-8 px-8 py-4 bg-white shadow-md">
        <article class="mb-2">
            <h2 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-1 text-3xl md:text-4xl">{{ $meal->title }}
            </h2>
            <h3>{{ $meal->user->name }}</h3>
            <p class="text-sm mb-2 md:text-base font-normal text-gray-600">
                <span class="text-red-400 font-bold">現在時刻: </span>
                <font color="red">{{ \Carbon\Carbon::now() }}</font>
                <br>
                <span class="text-red-400 font-bold">記事作成日:
                    {{ date('Y-m-d H:i:s', strtotime('-1 day')) < $meal->created_at ? 'NEW' : '' }}</span>
                {{ $meal->created_at }}
            </p>
            <img src="{{ Storage::url('images/meals/' . $meal->image) }}" alt="" class="mb-4">
            <p class="text-gray-700 text-base">{!! nl2br(e($meal->body)) !!}</p>
        </article>
        <div class="flex flex-row text-center my-4">
            <a href="{{ route('meals.edit', $meal) }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">編集</a>
            <form action="{{ route('meals.destroy', $meal) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){return false};"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
            </form>
        </div>
    </div>
</x-app-layout>
