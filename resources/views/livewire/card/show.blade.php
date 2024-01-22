<div class="container mt-5 mb-5">
    @if ($card)
        <div class="page">
            <div class="wrapper" id="wrapper">
                <div class="front">
                    <h2>Hepi Bestday!</h2>
                    <h2>{{ $card->fullname }}</h2>
                </div>
                <div class="back">
                    <p>{{ $card->message }}</p>
                </div>
            </div>
            <div class="wrapper hidden" id="second-wrapper">
                <div class="front">
                    <img class="my-image" src="{{$card->image}}" alt="{{$card->fullname}}">
                </div>
            </div>
        </div>
    @else
        <h1>Card not found</h1>
        <div class="alert alert-danger">
            The card you are looking for does not exist.
        </div>
    @endif
    @push('AdditionalCSS')
        <style>
            .front,h1,h2 {
                font-family: 'Karantina', sans-serif;
                font-size: 5rem;
            }
            .page {
                height: 400px;
                width: 100%;
                perspective: 800px;
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 20px;
            }

            .wrapper {
                position: relative;
                height: 400px;
                width: 300px;
                transform-style: preserve-3d;
                transition: transform 1s;
            }

            .wrapper.hidden {
                visibility: hidden;
                opacity: 0;
                /* left: -100%; */
                transform: translateX(-100%);
                transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
            }

            .wrapper.rotated+.wrapper {
                visibility: visible;
                opacity: 1;
                /* left: 0; */
                transform: translateX(0);
            }

            .wrapper.rotated {
                transform: rotateY(180deg);
            }

            .front,
            .back {
                position: absolute;
                height: 100%;
                width: 100%;
                flex-direction: column;
                display: flex;
                justify-content: center;
                align-items: center;
                backface-visibility: hidden;
                cursor: pointer;
            }

            .front {
                background-color: rgb(255, 249, 230);
            }

            .back {
                transform: rotateY(180deg);
                background-color: rgb(216, 151, 60);
            }
            .my-image {
                width: 100%;
                height: 100%;
                object-fit: contain;
            }
        </style>
    @endpush
    @push('AdditionalJS')
        <script>
            // javascripts use for on click rotating
            document.getElementById('wrapper').addEventListener('click', function() {
                this.classList.toggle('rotated');
                console.log('clicked');
            });

            // change the content element in class rotating-div::before with data from $card->message
        </script>
    @endpush
</div>
