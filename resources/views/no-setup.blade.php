@extends('statamic::layout')

@section('content')

    <h1 class="mb-3">Analytics</h1>

    <div class="card">
        <h3 class="text-xl font-bold mb-2">Uh-oh!</h3>
        <p class="text-grey-70 mb-2 leading-loose">
            Looks like we have bumped into a problem getting your data.
            If you can double check the following to make sure everything is set up correctly.</p>
        <ul class="text-grey-70 mb-2 pl-3 list-decimal">
            <li class="mb-1">Have you set up your <a href="https://plausible.io/settings">API key</a>?</li>
            <li class="mb-1">Have you set up your site in Plausible?</li>
            <li class="mb-1" >Have you added <pre class="inline">PLAUSIBLE_KEY</pre> to your `.env` file?</li>
            <li class="mb-1">Have you added <pre class="inline">PLAUSIBLE_SITE</pre> to your `.env` file?</li>
        </ul>
        <p class="text-grey-70 leading-loose">If that hasn't helped, please open up an issue on <a class="underline" href="https://github.com/jackabox/statamic-plausible-analytics">GitHub</a> and I will take a look!</p>
    </div>

@endsection
