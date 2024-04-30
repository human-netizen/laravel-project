@extends('layout')

@section('content')
    @include('partial._search', [
        'bg' => 'bg-gray-800',
        'textColor' => 'text-white',
        'hoverBg' => 'hover:bg-gray-700',
    ])
    <a href="index.html" class="inline-block text-gray-200 ml-4 mb-4 hover:text-gray-50">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-auto" style="width:95%">
        <div class="bg-darkGrey border border-gray-700 p-10 rounded-lg shadow-lg">
            <div class="flex flex-col items-center justify-center text-center">
                <img class="w-48 mr-6 mb-6"
                    src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('images/no-image.png') }}"
                    alt="Company logo" />

                <h3 class="text-2xl mb-2 text-white">{{ $listing->title }}</h3>
                <div class="text-xl font-bold mb-4 text-gray-300">{{ $listing->company }}</div>
                <x-tags-card :tagsCsv="$listing->tags" />
            </div>

            <div class="border-t border-gray-700 w-full my-6"></div>

            <div class="text-lg space-y-6">
                <div class="text-gray-200 ck-content" style="text-align: left; align-self: start; width: 100%;">
                    {!! $listing->description !!}
                </div>


                <a href="mailto:test@test.com"
                    class="block bg-gray-900 text-white mt-6 py-2 px-4 rounded-xl hover:bg-gray-700 transition duration-300">
                    <i class="fa-solid fa-envelope"></i> Contact Employer
                </a>

                <a href="https://test.com" target="_blank"
                    class="block bg-gray-900 text-white py-2 px-4 rounded-xl hover:bg-gray-700 transition duration-300">
                    <i class="fa-solid fa-globe"></i> Visit Website
                </a>
            </div>
        </div>
    </div>

    <x-card class="mt-4 p-2 flex space-x-6 bg-gray-800 text-white">
        <a href="/listings/{{ $listing->id }}/edit" class="hover:text-gray-200">
            <i class="fa-solid fa-pencil"></i> Edit
        </a>

        <form method="POST" action="/listings/{{ $listing->id }}">
            @csrf
            @method('DELETE')
            <button class="text-red-500 hover:text-red-700">
                <i class="fa-solid fa-trash"></i> Delete
            </button>
        </form>
    </x-card>
    <section class="comment-module">
        <ul>
            <li>
                <div class="comment">
                    <div class="comment-img">
                        <img src="https://rvs-comment-module.vercel.app/Assets/User Avatar.png" alt="">
                    </div>
                    <div class="comment-content">
                        <div class="comment-details">
                            <h4 class="comment-name">Adamsdavid</h4>
                            <span class="comment-log">20 hours ago</span>
                        </div>
                        <div class="comment-desc">
                            <p>I genuinely think that Codewell's community is AMAZING. It's just starting out but the templates on there amazing.</p>
                        </div>
                        <div class="comment-data">
                            <div class="comment-likes">
                                <div class="comment-likes-up">
                                    <img src="https://rvs-comment-module.vercel.app/Assets/Up.svg" alt="">
                                    <span>2</span>
                                </div>
                                <div class="comment-likes-down">
                                    <img src="https://rvs-comment-module.vercel.app/Assets/Down.svg" alt="">
                                    <span></span>
                                </div>
                            </div>
                            <div class="comment-reply">
                                <a href="#!">Reply</a>
                            </div>
                            <div class="comment-report">
                                <a href="#!">Report</a>
                            </div>
                        </div>
                    </div>
                </div>
                <ul>
                    <li>
                        <div class="comment">
                            <div class="comment-img">
                                <img src="https://rvs-comment-module.vercel.app/Assets/User Avatar-1.png" alt="">
                            </div>
                            <div class="comment-content">
                                <div class="comment-details">
                                    <h4 class="comment-name">saramay</h4>
                                    <span class="comment-log">16 hours ago</span>
                                </div>
                                <div class="comment-desc">
                                    <p>I agree. I've been coding really well (pun intended) ever since I started practicing on their templates hehe.</p>
                                </div>
                                <div class="comment-data">
                                    <div class="comment-likes">
                                        <div class="comment-likes-up">
                                            <img src="https://rvs-comment-module.vercel.app/Assets/Up.svg" alt="">
                                            <span>5</span>
                                        </div>
                                        <div class="comment-likes-down">
                                            <img src="https://rvs-comment-module.vercel.app/Assets/Down.svg" alt="">
                                            <span></span>
                                        </div>
                                    </div>
                                    <div class="comment-reply">
                                        <a href="#!">Reply</a>
                                    </div>
                                    <div class="comment-report">
                                        <a href="#!">Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul>
                            <li>
                                <div class="comment">
                                    <div class="comment-img">
                                        <img src="https://rvs-comment-module.vercel.app/Assets/User Avatar-2.png" alt="">
                                    </div>
                                    <div class="comment-content">
                                        <div class="comment-details">
                                            <h4 class="comment-name">Jessica21</h4>
                                            <span class="comment-log">14 hours ago</span>
                                        </div>
                                        <div class="comment-desc">
                                            <p>Okay, this comment wins.</p>
                                        </div>
                                        <div class="comment-data">
                                            <div class="comment-likes">
                                                <div class="comment-likes-up">
                                                    <img src="https://rvs-comment-module.vercel.app/Assets/Up.svg" alt="">
                                                    <span>5</span>
                                                </div>
                                                <div class="comment-likes-down">
                                                    <img src="https://rvs-comment-module.vercel.app/Assets/Down.svg" alt="">
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="comment-reply">
                                                <a href="#!">Reply</a>
                                            </div>
                                            <div class="comment-report">
                                                <a href="#!">Report</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li>
                <div class="comment">
                    <div class="comment-img">
                        <img src="https://rvs-comment-module.vercel.app/Assets/User Avatar-3.png" alt="">
                    </div>
                    <div class="comment-content">
                        <div class="comment-details">
                            <h4 class="comment-name">andrew231</h4>
                            <span class="comment-log">20 hours ago</span>
                        </div>
                        <div class="comment-desc">
                            <p>Thanks for making this, super helpful</p>
                        </div>
                        <div class="comment-data">
                            <div class="comment-likes">
                                <div class="comment-likes-up">
                                    <img src="https://rvs-comment-module.vercel.app/Assets/Up.svg" alt="">
                                    <span>2</span>
                                </div>
                                <div class="comment-likes-down">
                                    <img src="https://rvs-comment-module.vercel.app/Assets/Down.svg" alt="">
                                    <span></span>
                                </div>
                            </div>
                            <div class="comment-reply">
                                <a href="#!">Reply</a>
                            </div>
                            <div class="comment-report">
                                <a href="#!">Report</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>
@endsection
