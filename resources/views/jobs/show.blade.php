<x-layout>
    <section class="px-6 py-8">
        <x-apply-Form/>
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{$job->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                @if($job->author->role =="Jobseeker")
                                    <a href="/people/{{$job->author->username}}">{{$job->author->name}}</a>
                                @elseif($job->author->role =="Employer")
                                    <a href="/employer/background/{{$job->author->username}}">{{$job->author->name}}</a>
                                @endif
                            </h5>
                        </div>
                    </div>

                    <div class="flex flex-row flex-wrap justify-start mt-2 border-dotted rounded-xl border-4 border-indigo-200 py-2 gap-y-2">
                        @foreach($job->listtags as $job->listtag)
                            @foreach($tags as $tag)
                                @if($job->listtag->tag_id == $tag->id)
                                    <div class="space-x-2 mr-1 ml-1">
                                        <x-tag-button :tag="$tag"/>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/jobs"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Jobs
                        </a>

{{--                        <div class="space-x-2">--}}
{{--                            <x-category-button :category="$job->category"/>--}}
{{--                        </div>--}}
                    </div>


                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$job->name}}
                    </h1>

                    <div class="my-4 flex justify-center">
                        <button type="button"
                                id="Job{{$job->id}}"
                                onclick="$.fn.formCheck(this.id);"
                                class="bg-blue-400 text-white font-semibold py-2 px-10 rounded-2xl hover:bg-blue-500"
                        >
                            Apply
                        </button>
                    </div>

                    <div class="space-y-4">
                        <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                            <h2 class="font-semibold border-b-2">
                                Job Excerpt:
                            </h2>
                            {!! nl2br($job->excerpt) !!}
                        </div>

                        <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                            <h2 class="font-semibold border-b-2">
                                Job Description:
                            </h2>
                            {!! nl2br($job->description) !!}
                        </div>


                        <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                            <h2 class="font-semibold border-b-2">
                                Skills Needed:
                            </h2>
                            {!! nl2br($job->skillNeeded) !!}
                        </div>


                        <div class="space-y-4 lg:text-lg leading-loose border-solid border-2 border-black-100">
                            <h2 class="font-semibold border-b-2">
                                Job Scope:
                            </h2>
                            {!! nl2br($job->jobScope) !!}
                        </div>

                    </div>
                </div>

            </article>
        </main>
    </section>
    <x-apply-form-logic/>
</x-layout>
