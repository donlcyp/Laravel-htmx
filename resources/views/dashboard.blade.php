<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center mb-4">
            {{ __('Tweet Life') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border rounded-lg p-5 bg-light">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="tweetText" class="font-weight-bold d-block text-center">What's on your mind?</label>
                            
                            <!-- HTMX Form Submission -->
                            <form 
                                hx-post="{{ route('tweets.store') }}" 
                                hx-target="#post-list"
                                hx-swap="beforebegin"
                                hx-on::after-request="this.reset()"
                                method="POST"
                                class="mb-4">
                                @csrf
                                <textarea id="tweetText" name="text" class="form-control" rows="3" placeholder="Write something..." style="border-radius: 10px; width: 100%; height: 150px; resize: none;"></textarea>
                                <button type="submit" class="btn btn-primary btn-block mt-3 shadow">Post Tweet</button>
                            </form>
                        </div>

                        <hr class="my-4">
                        
                        <h3 class="text-center text-primary mb-3">Your Posts:</h3>
                        <ul id="post-list" class="list-group mt-4">
                            @foreach ($posts as $post)
                                @include('partials.tweet', ['post' => $post])
                            @endforeach
                        </ul>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://unpkg.com/htmx.org@1.9.6"></script>
