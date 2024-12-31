@extends('_layouts.master')

@section('body')
    <section class="container max-w-6xl mx-auto px-6 py-10 md:py-12">
        <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
            <div class="mt-8">


                <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

                <h2 id="intro-powered-by-jigsaw" class="font-light mt-4">{{ $page->siteDescription }}</h2>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-2/3">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <tbody>
                        <tr class="bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">Date Of Birth</th>
                            <td class="px-6 py-4 text-gray-600">1 Jun 1987</td>
                        </tr>
                        <tr class="bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">Birth Location</th>
                            <td class="px-6 py-4 text-gray-600">Georgia, Tbilisi</td>
                        </tr>
                        <tr class="bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">E-mail</th>
                            <td class="px-6 py-4 text-gray-600"><a class="text-gray-600" href="mailto:uchm4n@gmail.com">uchm4n@gmail.com</a></td>
                        </tr>
                        <tr class="bg-gray-50 border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900">Github</th>
                            <td class="px-6 py-4 text-gray-500"><a class="text-gray-600" href="https://github.com/uchm4n" target="_blank" >github.com/uchm4n</a></td>
                        </tr>

                        </tbody>
                    </table>
                </div>



                <p class="text-lg">
                    Full stack web developer with <strong>10+</strong> years of experience specialising in high quality application development.
                    Working in a high-end companies, give me valuable skills, both technical and analytical skills.
                    I will help you transform your personal or business concept into a successful web/mobile/desktop app.
                    <br>
                    What sets me apart is my ability to communicate effectively and simplify complex tasks.
                    Whether it’s breaking down intricate problems for teammates or explaining technical solutions to non-technical stakeholders,
                    I ensure everyone is on the same page, paving the way for success.
                </p>

                <div class="flex my-10">
                    <a href="{{ $page->baseUrl }}/pages/education" title="Details" class="bg-gray-600 hover:bg-blue-800 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">
                        Details
                    </a>
                    <a href="https://drive.usercontent.google.com/download?id=18DmwQ5mhngV-lAFk29F3nuPE3offWNWd&export=download" title="Details" target="_blank" class="bg-blue-600 hover:bg-blue-800 font-normal text-white hover:text-white rounded mr-4 py-2 px-6">
                        Download
                    </a>
                </div>
            </div>

            <img src="{{ $page->baseUrl }}/assets/img/logo-large.svg" alt="{{ $page->siteName }} large logo" class="mx-auto mb-6 lg:mb-0 ">
        </div>

        <hr class="block my-8 border lg:hidden">

        <div class="md:flex -mx-2 -mx-4">
            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <a href="{{ $page->baseUrl }}/pages/education">
                    <img src="{{ $page->baseUrl }}/assets/img/icon-window.svg" class="h-12 w-12" alt="window icon">

                    <h3 id="intro-laravel" class="text-2xl text-blue-900 mb-0">Education</h3>
                </a>


            </div>

            <div class="mb-8 mx-3 px-2 md:w-1/3">
                <a href="{{ $page->baseUrl }}/pages/skills">
                <img src="{{ $page->baseUrl }}/assets/img/icon-terminal.svg" class="h-12 w-12" alt="terminal icon">

                <h3 id="intro-markdown" class="text-2xl text-blue-900 mb-0">Skills</h3>
                </a>

            </div>

            <div class="mx-3 px-2 md:w-1/3">
                <a href="{{ $page->baseUrl }}/pages/experience">
                <img src="{{ $page->baseUrl }}/assets/img/icon-stack.svg" class="h-12 w-12" alt="stack icon">

                <h3 id="intro-mix" class="text-2xl text-blue-900 mb-0">Experience</h3>
                </a>

            </div>
        </div>
    </section>
@endsection
