<div class="text-center mt-20 ">
    <h1 class="font-bold text-4xl">Comments</h1>


    <div class="flex justify-center">
        <form wire:submit.prevent="addComment">
            @error('newComment') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            <input type="text" class="border dark py-2 px-10 mt-3 text-grey-darkest mx-2"
                wire:model.debounce.500ms="newComment">

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 mt-3 rounded">ADD</button>
        </form>
    </div>
    @foreach($comments as $comment)
    <div class="">
        <p class="font-bold text-lg">{{ $comment->creator->name}}</p>
        <p class="font-bold text-lg">{{ $comment->created_at->diffForHumans() }}</p>
        <textarea class="border-2 mt-3 py-8 px-20">{{ $comment->body}}</textarea>

    </div>
    <button wire:click="remove({{ $comment->id }})"
        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 mt-3 rounded">DELETE</button>
    @endforeach
</div>