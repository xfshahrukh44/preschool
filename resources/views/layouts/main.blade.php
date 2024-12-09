<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin">
    <meta name="author" content="Admin">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset(!empty($favicon->img_path) ? $favicon->img_path : '') }}">


    <title>{{ config('app.name') }}</title>
    <!-- ============================================================== -->
    <!-- All CSS LINKS IN BELOW FILE -->
    <!-- ============================================================== -->
    @include('layouts.front.css')
    @yield('css')
    <style>
        li.nav-item.active {
            background-color: #b8bab7;
            border-radius: 10px;
        }

        .myaccount-tab-menu.nav a {
            display: block;
            padding: 20px;
            font-size: 16px;
            align-items: center;
            width: 100%;
            font-weight: bold;
            color: black;
        }

        .myaccount-tab-menu.nav a i {
            padding-right: 10px;
            /* background-color: #5798fc; */
        }

        .myaccount-tab-menu.nav {
            border: 1px solid;
        }

        .myaccount-tab-menu.nav .active,
        .myaccount-tab-menu.nav a:hover {
            background-color: #5798fc;
            color: white;
        }

        .account-details-form label.required {
            width: 100%;
            font-weight: 500;
            font-size: 18px;
        }

        .account-details-form input {
            border-width: 1px;
            border-color: white;
            border-style: solid;
            padding-left: 15px;
            color: black;
            width: 100%;
            border-radius: 3px;
            background-color: rgb(255, 255, 255);
            height: 52px;
            padding-left: 15px;
            margin-bottom: 30px;
            color: #000000;
            font-size: 15px;
        }

        .account-details-form legend {
            font-family: CottonCandies;
            font-size: 50px;
        }

        .editable {
            position: relative;
        }

        .editable-wrapper {
            position: absolute;
            right: 0px;
            top: -50px;
        }

        .editable-wrapper a {
            background-color: #17a2b8;
            border-radius: 50px;
            width: 35px;
            height: 35px;
            display: inline-block;
            text-align: center;
            line-height: 35px;
            color: white;
            margin-left: 10px;
            font-size: 16px;
        }

        .editable-wrapper a.edit {
            background-color: #007bff;
        }

        .ui-autocomplete-category {
            font-weight: bold;
            padding: .2em .4em;
            margin: .8em 0 .2em;
            line-height: 2.5;
        }
    </style>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css">
</head>

<body class="responsive">


    @include('layouts/front.header')




    @yield('content')

    <div class="modal fade" id="providerAlert" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="providerAlertLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="providerAlertLabel">Account required</h5>
                    {{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <p>
                        <b>Before you claim center, please sign up or log in to the website.</b>
                    </p>
                    <hr>

                    <span><a href="{{ route('become-a-provider') }}" class="text-center">Signup</a> as a
                        provider.</span>
                    <hr>
                    <span>Already have a provider account? <a href="{{ route('signin') }}"
                            class="text-center">Login</a>.</span>
                </div>
                {{--                    <div class="modal-footer"> --}}
                {{--                        <button type="button" class="btn btn-primary">Understood</button> --}}
                {{--                    </div> --}}
            </div>
        </div>
    </div>


    @include('layouts/front.footer')
    <!-- ============================================================== -->
    <!-- All SCRIPTS ANS JS LINKS IN BELOW FILE -->





    <!-- ============================================================== -->
    @include('layouts/front.scripts')

    {{--        <script> --}}
    {{--            $('#providerAlert').modal('show'); --}}
    {{--        </script> --}}

    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
        $( function() {
            $.widget( "custom.catcomplete", $.ui.autocomplete, {
                _create: function() {
                    this._super();
                    this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
                },
                _renderMenu: function( ul, items ) {
                    var that = this,
                        currentCategory = "";
                    $.each( items, function( index, item ) {
                        var li;
                        if ( item.category != currentCategory ) {
                            ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
                            currentCategory = item.category;
                        }
                        li = that._renderItemData( ul, item );
                        if ( item.category ) {
                            li.attr( "aria-label", item.category + " : " + item.label );
                            li.attr( "data-type", item.category );
                            li.attr( "data-id", item.id );
                        }
                    });
                }
            });
        } );
    </script>

<script>
    function capitalizeFirstLetter(text) {
        return text.toLowerCase().replace(/\b\w/g, char => char.toUpperCase());
    }

    document.addEventListener('DOMContentLoaded', function () {
        const stateInput = document.getElementById('state-input');
        const stateResults = document.getElementById('state-results');
        const cityInput = document.getElementById('city-input');
        const cityResults = document.getElementById('city-results');

        let selectedStateId = null;
        let stateQuery = '';
        let cityQuery = '';
        let statePage = 0;
        let cityPage = 0;

        // Fetch states dynamically
        stateInput.addEventListener('input', function () {
            stateQuery = this.value;
            statePage = 0; // Reset page on new query
            fetchStates();  
        });

        function fetchStates() {
            fetch(`{{ route('search.states') }}?query=${stateQuery}&page=${statePage}`)
                .then(response => response.json())
                .then(states => {
                    if (statePage === 0) {
                        stateResults.innerHTML = ''; // Clear results for a new search
                    }
                    states.forEach(state => {
                        const item = document.createElement('div');
                        item.classList.add('dropdown-item');
                        item.textContent = state.name;
                        item.dataset.id = state.id;
                        stateResults.appendChild(item);
                    });

                    if (states.length > 0) {
                        stateResults.classList.add('show');
                    }

                    if (states.length === 10) {
                        const loadMore = document.createElement('div');
                        loadMore.classList.add('dropdown-item', 'load-more');
                        loadMore.textContent = 'Load more...';
                        stateResults.appendChild(loadMore);
                    }
                });
        }

        // Handle scrolling for state results
        stateResults.addEventListener('scroll', function () {
            if (
                this.scrollTop + this.clientHeight >= this.scrollHeight &&
                stateResults.querySelector('.load-more')
            ) {
                stateResults.querySelector('.load-more').remove();
                statePage++;
                fetchStates();
            }
        });

        // Select a state
        stateResults.addEventListener('click', function (e) {
            if (e.target.classList.contains('dropdown-item') && !e.target.classList.contains('load-more')) {
                const selectedState = e.target.textContent;
                selectedStateId = e.target.getAttribute('data-id');
                stateInput.value = selectedState;
                stateResults.classList.remove('show');

                // Enable and reset city input
                cityInput.disabled = false;
                cityInput.value = '';
                cityResults.innerHTML = '';
                cityPage = 0; // Reset city pagination
                fetchCities(); // Fetch first 10 cities automatically
            }
        });

        // Fetch cities dynamically
        cityInput.addEventListener('input', function () {
            cityQuery = this.value;
            cityPage = 0; // Reset page on new query
            fetchCities();
        });

        function fetchCities() {
            const url = cityQuery
                ? `{{ route('search.cities') }}?state_id=${selectedStateId}&query=${cityQuery}&page=${cityPage}`
                : `{{ route('search.cities') }}?state_id=${selectedStateId}&page=${cityPage}`;

            fetch(url)
                .then(response => response.json())
                .then(cities => {
                    if (cityPage === 0) {
                        cityResults.innerHTML = ''; // Clear results for a new search
                    }
                    cities.forEach(city => {
                        const item = document.createElement('div');
                        item.classList.add('dropdown-item');
                        item.textContent = capitalizeFirstLetter(city.name);
                        item.dataset.id = city.id;
                        cityResults.appendChild(item);
                    });

                    if (cities.length > 0) {
                        cityResults.classList.add('show');
                    }

                    if (cities.length === 10) {
                        const loadMore = document.createElement('div');
                        loadMore.classList.add('dropdown-item', 'load-more');
                        loadMore.textContent = 'Load more...';
                        cityResults.appendChild(loadMore);
                    }
                });
        }

        // Handle scrolling for city results
        cityResults.addEventListener('scroll', function () {
            if (
                this.scrollTop + this.clientHeight >= this.scrollHeight &&
                cityResults.querySelector('.load-more')
            ) {
                cityResults.querySelector('.load-more').remove();
                cityPage++;
                fetchCities();
            }
        });

        // Select a city
        cityResults.addEventListener('click', function (e) {
            if (e.target.classList.contains('dropdown-item') && !e.target.classList.contains('load-more')) {
                const selectedCity = e.target.textContent;
                cityInput.value = selectedCity;
                cityResults.classList.remove('show');
            }
        });
    });
</script>

    <script>
        // var typingTimer;                // Timer identifier
        // var doneTypingInterval = 100;   // Time in ms, 0.5 second for example

        // let allData = []; // Store all data here
        // let displayedData = []; // Store the currently displayed data
        // let batchSize = 10; // Number of items to load per batch
        // let currentIndex = 0; // Index to track the current position in allData

        // // On keyup, start the countdown
        // $('#search-bar').on('input', function () {
        //     clearTimeout(typingTimer);
        //     typingTimer = setTimeout(doneTyping, doneTypingInterval);
        // });

        // // On keydown, clear the countdown
        // $('#search-bar').on('keydown', function () {
        //     clearTimeout(typingTimer);
        // });

        // // User is "finished typing," do something
        // function doneTyping () {
        //     let states = [];
        //     let cities = [];

        //     allData = []; // Reset allData

        //     // Add states and cities to allData
        //     for (const state of states) {
        //         allData.push({
        //             label: state,
        //             category: 'States'
        //         });
        //     }
        //     for (const city of cities) {
        //         allData.push({
        //             label: city,
        //             category: 'Cities'
        //         });
        //     }

        //     // Remove duplicates
        //     allData = Array.from(
        //         new Map(allData.map(item => [item.label, item])).values()
        //     );

        //     // Load the initial batch
        //     loadMoreData();

        //     // Initialize autocomplete
        //     $("#search-bar").catcomplete({
        //         delay: 0,
        //         source: function (request, response) {
        //             let filteredData = displayedData.filter(item =>
        //                 item.label.toLowerCase().includes(request.term.toLowerCase())
        //             );
        //             response(filteredData);
        //         },
        //         search: (e, item) => {
        //             console.log(item);
        //         },
        //         open: () => {
        //             // Load more data on scroll
        //             $('body').on("scroll", ".ui-autocomplete", function () {
        //                 let scrollTop = $(this).scrollTop();
        //                 let scrollHeight = $(this)[0].scrollHeight;
        //                 let containerHeight = $(this).innerHeight();

        //                 if (scrollTop + containerHeight >= scrollHeight) {
        //                     loadMoreData();
        //                 }
        //             });
        //         }
        //     });
        // }

        // function loadMoreData() {
        //     if (currentIndex < allData.length) {
        //         displayedData = displayedData.concat(
        //             allData.slice(currentIndex, currentIndex + batchSize)
        //         );
        //         currentIndex += batchSize;
        //     }
        // }

        {{--$('body').on('click', '.ui-menu-item', function () {--}}
        {{--    if ($(this).data('type') == 'Brands') {--}}
        {{--        let redirect_url = "{{route('redirect-to-livewire', ['page' => 'temp'])}}";--}}
        {{--        redirect_url = redirect_url.replaceAll('temp', 'brands_detail-'+$(this).data('id'));--}}
        {{--        window.location.href = redirect_url;--}}
        {{--    } else if ($(this).data('type') == 'Clients') {--}}
        {{--        let redirect_url = "{{route('redirect-to-livewire', ['page' => 'temp'])}}";--}}
        {{--        redirect_url = redirect_url.replaceAll('temp', 'clients_detail-'+$(this).data('id'));--}}
        {{--        window.location.href = redirect_url;--}}
        {{--    }--}}
        {{--});--}}
    </script>



</body>

</html>
