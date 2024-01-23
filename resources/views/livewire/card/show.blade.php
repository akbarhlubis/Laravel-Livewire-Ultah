<div class="container mt-5 mb-5">
    @if ($card)
        <div class="page">
            <div class="wrapper" id="wrapper">
                <div class="front">
                    <h1>Hepi Bestday</h1>
                    <span>ke {{$card->age}}</span>
                    <h1>{{$card->fullname}}</h1>
                    <span class="flipper">Click to Flip</span>
                </div>
                <div class="back">
                    <p>{{$card->message}}</p>
                </div>
            </div>
            <div class="second-wrapper hidden" id="second-wrapper">
                <img class="front"
                    src="{{$card->image}}"
                    alt="" srcset="">
            </div>
        </div>
        <img id="illustration" src="{{asset('background-complete.svg')}}" alt="" srcset="">
    @else
        <h1>Card not found</h1>
        <div class="alert alert-danger">
            The card you are looking for does not exist.
        </div>
    @endif
    @push('AdditionalCSS')
        <style>
            /* Path: style.css */
            * {
                margin: 0;
                padding: 0;
            }

            body {
                background-color: #fff5d9;
                /* overflow: hidden; */
            }

            h1,
            p {
                font-family: "Karantina", cursive;
                font-weight: normal;
                padding: 20px;
            }
            #illustration{
                bottom: 0px;
                position: fixed;
                visibility: visible
                transform: translatey(-100%);
                width: 100%;
                height: 100%;
                /* object-fit: cover; */
                z-index: -1;
                transition: all 0.7s;
            }

            .back p{
                font-size: 1.5rem;
            }
            #illustration.hidden{
                visibility: hidden;
                opacity: 0;
                transform: translatey(200%);
            }
            h1 {
                font-size: 3rem;
            }

            .page {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                gap: 20px;
                padding: 20px;
            }

            .wrapper {
                position: relative;
                height: 380px;
                width: 260px;
                transform-style: preserve-3d;
                transition: all 0.7s;
                box-shadow: 1px 4px 20px rgba(99, 99, 99, 0.5);
            }

            .wrapper.rotated {
                transform: rotateY(180deg);
            }

            .flipper {
                background-color: white;
                padding: 6px;
                border-radius: 6px;
                font-size: 10px;
                font-weight: 900;
                position: absolute;
                right: 10px;
                bottom: 10px;
                font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
                transition: transform 1.5s;
                transform-style: preserve-3d;
            }

            .flipper:hover {
                color: rosybrown;
            }

            .front,
            .back {
                border-radius: 6px;
                position: absolute;
                height: 100%;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                text-align: center;
                flex-direction: column;
                backface-visibility: hidden;
                cursor: pointer;
            }

            .front {
                background-color: rgb(216, 151, 60);
            }

            .back {
                transform: rotateY(180deg);
                background-color: white;
            }

            .second-wrapper {
                position: relative;
                height: 380px;
                width: 260px;
                opacity: 100;
                transition: all 0.5s ease-in-out;
                transform: translatex(0) box-shadow: 1px 4px 20px rgba(99, 99, 99, 0.5);
            }

            .second-wrapper img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            #second-wrapper.hidden {
                position: absolute;
                visibility: hidden;
                opacity: 0;
                width: 0px;
                z-index: -1;
                /*   height: 0px; */
                transform: translatex(-100%)
                    /* display: none; */
            }

            @media screen and (max-width: 360px) {
                .page {
                    flex-direction: column-reverse;
                }

                .wrapper,
                img,
                .second-wrapper {
                    width: 100%;
                    height: 30%;
                    object-fit: cover;
                }
            }
        </style>
    @endpush
    @push('AdditionalJS')
        <script>
            // javascripts use for on click rotating
            $(document).ready(function() {
                $('#wrapper').click(function() {
                    $(this).toggleClass('rotated');
                    $('#second-wrapper').toggleClass('hidden');
                    $('#illustration').toggleClass('hidden');
                });
            });
            // change the content element in class rotating-div::before with data from $card->message
        </script>
    @endpush
</div>
